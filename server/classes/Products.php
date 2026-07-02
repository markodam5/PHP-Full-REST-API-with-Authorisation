<?php

require_once BASE_PATH .'/server/config/config.php';


class Products{
    
    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function getSingleProduct($movie_id){
        $query = "SELECT * FROM movies WHERE movie_id = '$movie_id'";
        $single = $this->db->select($query);
        return $single;
    }

    public function getLimitProduct($limit){
        $query = "SELECT * FROM movies LIMIT {$limit}";
        $limitMovies = $this->db->select($query);
        return $limitMovies;
    }


   public function getMovies(){
       $query = "SELECT * FROM movies ";
       $movies = $this->db->select($query);
       return $movies;
   }


    public function checkLicence($client_licence){

        $query = "SELECT licence_key FROM users WHERE licence_key = '$client_licence' ";

        $licenceCheck = $this->db->select($query);
        if($licenceCheck == FALSE){
            throw new Exception("Forbiden! Not valid licence key");
        }

        if($licenceCheck->num_rows > 1 ){
            throw new Exception("Forbiden! Not valid licence key");
        }else{
            return TRUE;
        }

    } // End of checkLicence method


} // End of class Products
