<?php

class Admin_Controllers_Index extends Libs_Controller {

    public function __contruct() {
        parent::__contruct();
    }

    public function index() {
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'product'
        $product = new Default_Models_Product($db);
        $this->view->proData = $product->getAllProduct();

        
                //Khởi tạo model 'Employee'
        $emp = new Admin_Models_Employee($db);
        $this->view->empData = $emp->getEmployeeByInfo();        


        $this->view->render('index/index');
    }
    
    public function detail(){
        $database = new Libs_Model();
        $db = $database->getConnection();
        
        //Khởi tạo model product
        $product = new Default_Models_Product($db);
        //Lấy giá trị id trên URL
        $product->productID = isset($_GET['id'])?$_GET['id']:"";
        $this->view->proDetail = $product->getDetailProductByID();
        
        $dataID = $product->getDetailProductByID();
        
        
        $category = new Default_Models_Category($db);
        $category->categoryID=$dataID['categoryID'];
        $this->view->catDetail = $category->getCategoryByID();
        
        $this->view->render('product/detail');
    }

    public function add() {
        $databasse = new Libs_Model();
        $db = $databasse->getConnection();
        
//        Khởi tạo model Product
        $product = new Admin_Models_Product($db);
        $this->view->proData = $product->addProduct();

//        Khởi tạo model Category
        $category = new Admin_Models_Category($db);
        $this->view->CatData = $category->addCategory();
        
        $this->view->render("product/add");
    }

}

?>