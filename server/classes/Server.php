<?php

// Backend class performs the validation
class Server extends Backend{

    // Get data and return back to the user:
    public function get($id = NULL, $limit = NULL){

        // Check the authorization:
        $headers = getallheaders();
        if(isset($headers['Authorization'])){
             list($client_licence) = explode(":", base64_decode(str_ireplace("Basic", "", $headers['Authorization'])));
             // Call the method _licence_auth from Backend.php file:
             $this->_licence_auth($client_licence);
             
        // End of check the autorization

            // Show one movie:
            if(isset($_GET['id']) && $_GET['id'] !== NULL){

                $movie_id = $_GET['id'];
                $data = array();

                $getMovies = $this->product->getSingleProduct($movie_id);
                {
                    while ($movies = $getMovies->fetch_object())
                    {
                        $data['movies'][] = $movies;
                    }

                     parse_json($data); // Show data in Json
                }
            // End of show one movie

            }else if(isset($_GET['limit']) && $_GET['limit'] !== NULL){

                $limit = $_GET['limit'];
                $data = array();

                $getMovies = $this->product->getLimitProduct($limit);
                {
                    while ($movies = $getMovies->fetch_object())
                    {
                        $data['movies'][] = $movies;
                    }

                    parse_json($data);
                }

            }else{

                $getMovies = $this->product->getMovies();
                $data = array();

                while ($movies = $getMovies->fetch_object()){
                    $data['movies'][] = $movies;
                }

                parse_json($data);
            }



      } // End of if Authorization

    } // End of get method


} // End of class Server


$server = new Server();
$server->get();
