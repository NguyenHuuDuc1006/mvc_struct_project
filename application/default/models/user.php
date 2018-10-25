<?php

class Default_Models_User {

    public $user;
    public $password;
    public $fullname;
   
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function checkAcount() {
        $query = "SELECT FROM products";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }
    public function  getAcount(){
        
    }

 

}
?>

