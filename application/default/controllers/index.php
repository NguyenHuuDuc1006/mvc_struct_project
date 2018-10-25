<?php

class Default_Controllers_Index extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function index() {
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'product'
        $product = new Default_Models_Product($db);
        $this->view->proData = $product->getAllProduct();
        $this->view->newData = $product->getNewProduct();
        
        $advertise = new Default_Models_Advertise($db);
        
        $this->view->slide = $advertise->getAllSlide();


        $this->view->render('index/index');
    }

    public function detail() {
        $database = new Libs_Model;
        $db = $database->getConnection();
        $product = new Default_Models_Product($db);
        $product->productID = isset($_GET['id']) ? $_GET['id'] : "";
        $this->view->detailProduct = $product->getDetailProductByID();
        
         $this->view->newData = $product->getNewProduct();
        $this->view->render('index/detail');
    }

}

?>
