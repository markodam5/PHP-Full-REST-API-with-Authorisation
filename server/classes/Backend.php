<?php
require_once BASE_PATH .'/server/config/config.php';
require_once BASE_PATH .'/helper.php';

class Backend{
    protected $db;
    protected $product;

    public function __construct(){
        $this->db = new Database();
        $this->product = new Products();
    }


    protected function _licence_auth($client_licence){
        try {
            return $this->product->checkLicence($client_licence);

        }catch (Exception $e){
            parse_json(array(
                'status' => 0,
                'message' => $e->getMessage()
            ), 403);
        }

    } // End of _licence_auth


} // End of class Backend
