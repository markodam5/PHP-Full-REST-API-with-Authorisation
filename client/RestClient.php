<?php

/**
 * PHP REST Client (PHP 8.2 compatible)
 */


if(!isset($SERVER_URL))
    $SERVER_URL = "http://".$_SERVER['HTTP_HOST']."/rest/server/classes/Server.php";


class RestClientException extends Exception {}

class RestClient implements Iterator, ArrayAccess
{
    public array $options;
    public $handle;

    public string $url = '';

    public mixed $response = null;
    public ?object $headers = null;
    public ?object $info = null;
    public ?string $error = null;

    public mixed $decoded_response = null;
    private int $iterator_position = 0;

    public function __construct(array $options = [])
    {
        $default_options = [
            'headers' => [],
            'parameters' => [],
            'curl_options' => [],
            'user_agent' => 'PHP RestClient/0.1.2',
            'base_url' => null,
            'format' => null,
            'format_regex' => '/(\w+)\/(\w+)(;[.+])?/',
            'decoders' => [
                'json' => 'json_decode',
                'php' => 'unserialize'
            ],
            'username' => null,
            'password' => null
        ];

        $this->options = array_replace_recursive($default_options, $options);
    }

    /* ================= ITERATOR ================= */

    public function rewind(): void
    {
        $this->decode_response();
        reset($this->decoded_response);
    }

    public function current(): mixed
    {
        return current($this->decoded_response);
    }

    public function key(): mixed
    {
        return key($this->decoded_response);
    }

    public function next(): void
    {
        next($this->decoded_response);
    }

    public function valid(): bool
    {
        return is_array($this->decoded_response)
            && key($this->decoded_response) !== null;
    }

    /* ================= ARRAY ACCESS ================= */

    public function offsetExists(mixed $offset): bool
    {
        $this->decode_response();
        return is_array($this->decoded_response)
            ? isset($this->decoded_response[$offset])
            : isset($this->decoded_response->{$offset});
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->offsetExists($offset)
            ? (is_array($this->decoded_response)
                ? $this->decoded_response[$offset]
                : $this->decoded_response->{$offset})
            : null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new RestClientException('Decoded response data is immutable.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new RestClientException('Decoded response data is immutable.');
    }

    /* ================= REQUEST METHODS ================= */

    public function get(string $url, array $parameters = [], array $headers = []): self
    {
        return $this->execute($url, 'GET', $parameters, $headers);
    }

    public function post(string $url, array $parameters = [], array $headers = []): self
    {
        return $this->execute($url, 'POST', $parameters, $headers);
    }

    public function put(string $url, array $parameters = [], array $headers = []): self
    {
        return $this->execute($url, 'PUT', $parameters, $headers);
    }

    public function delete(string $url, array $parameters = [], array $headers = []): self
    {
        return $this->execute($url, 'DELETE', $parameters, $headers);
    }

    public function execute(
        string $url,
        string $method = 'GET',
        array $parameters = [],
        array $headers = []
    ): self {
        $client = clone $this;
        $client->handle = curl_init();
        $client->url = $url;

        $curlopt = [
            CURLOPT_HEADER => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => $client->options['user_agent']
        ];

        if ($client->options['username'] && $client->options['password']) {
            $curlopt[CURLOPT_USERPWD] =
                "{$client->options['username']}:{$client->options['password']}";
        }

        if ($client->options['headers'] || $headers) {
            $curlopt[CURLOPT_HTTPHEADER] = [];
            foreach (array_merge($client->options['headers'], $headers) as $k => $v) {
                $curlopt[CURLOPT_HTTPHEADER][] = "{$k}: {$v}";
            }
        }

        if ($client->options['format']) {
            $client->url .= '.' . $client->options['format'];
        }

        $parameters = array_merge($client->options['parameters'], $parameters);

        if ($method === 'GET' && $parameters) {
            $client->url .= (str_contains($client->url, '?') ? '&' : '?')
                . http_build_query($parameters);
        } elseif ($parameters) {
            $curlopt[CURLOPT_CUSTOMREQUEST] = $method;
            $curlopt[CURLOPT_POSTFIELDS] = http_build_query($parameters);
        }

        if ($client->options['base_url']) {
            $client->url = rtrim($client->options['base_url'], '/')
                . '/' . ltrim($client->url, '/');
        }

        $curlopt[CURLOPT_URL] = $client->url;

        foreach ($client->options['curl_options'] as $k => $v) {
            $curlopt[$k] = $v;
        }

        curl_setopt_array($client->handle, $curlopt);

        $client->parse_response(curl_exec($client->handle));
        $client->info = (object) curl_getinfo($client->handle);
        $client->error = curl_error($client->handle);

        curl_close($client->handle);

        return $client;
    }

    /* ================= RESPONSE ================= */

    private function parse_response(string|false $response): void
    {
        if ($response === false) {
            throw new RestClientException('Empty response');
        }

        [$raw_headers, $body] = explode("\r\n\r\n", $response, 2);
        $headers = [];

        foreach (explode("\n", $raw_headers) as $line) {
            if (!str_contains($line, ':')) continue;
            [$k, $v] = explode(':', $line, 2);
            $headers[strtolower(trim($k))] = trim($v);
        }

        $this->headers = (object) $headers;
        $this->response = $body;
    }

    private function decode_response(): mixed
    {
        if ($this->decoded_response !== null) {
            return $this->decoded_response;
        }

        if (!$this->headers || !isset($this->headers->{'content-type'})) {
            return $this->decoded_response = $this->response;
        }

        if (preg_match($this->options['format_regex'], $this->headers->{'content-type'}, $m)) {
            $format = $m[2];
            if (isset($this->options['decoders'][$format])) {
                return $this->decoded_response =
                    call_user_func($this->options['decoders'][$format], $this->response, true);
            }
        }

        return $this->decoded_response = $this->response;
    }
}



