PHP Full REST API with Authorization is an example project demonstrating a complete RESTful API built in native PHP with header-based authorization. It includes both a server API and a client that consumes the API. The server serves secured REST endpoints, and the client makes authorized requests to those endpoints and parses JSON responses.

#
How to start this app

1. Start the environment
Make sure PHP and a web server are available on your machine. If you are using Docker, start the containers for the project first.

2. Place the project in the web root
Make sure the application is available from your web server root, for example:
- /var/www/html/rest

3. Configure the database
- The application uses MySQL. Update the database settings in config.php if needed.

4. Import the database schema
- Import the SQL file from rest.sql.

5. Start the server
Open the server entry point in your browser, if you want to get a new licence key:
- http://localhost/rest/server/index.php

6. Start the client
After the server is available, open the client entry point:
- http://localhost/rest/client/exec.php

You can send a request to the server:

    // Return all data:
    $result = $api->get("get"); // Parametar get is from get method on the Server.php file

    // Return data with specific ID:
    $result = $api->get("get", ['id' => 2]);

    // Return with limit:
    $result = $api->get("get", ['limit' => 5]);


