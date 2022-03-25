<?php
class api_admin extends Controllers{
    public function getSeller($data = []){
        $this->CheckLoginAdmin();
        if (sizeof($data) != 2){
            $this->view("error_page","","",[]);
            exit();
        }
        $page = $data[1];
        if (!is_numeric($page)){
            $this->view("error_page","","",[]);
            exit();
        }
        $typeSeller = "0";
        if (strcmp($data[0], "ok") == 0){
            $typeSeller = "2";
        }else if (strcmp($data[0], "wait") == 0){
            $typeSeller = "0";
        }else{
            $this->view("error_page","","",[]);
            exit();
        }
        $seller = $this->model('admin');
        // print_r($seller->getSeller());
        echo ($seller->getSeller($page, $typeSeller));
    }
    public function updateSeller($data = []){
        $this->CheckLoginAdmin();
        if (sizeof($data) != 1){
            $this->view("error_page","","",[]);
            exit();
        }
        if (strcmp($data[0], "delete") == 0){
            $typeSeller = "0";
        }else if (strcmp($data[0], "accept") == 0){
            $typeSeller = "2";
        }else if (strcmp($data[0], "block") == 0){
            $typeSeller = "-1";
        }else if (strcmp($data[0], "unblock") == 0){
            $typeSeller = "2";
        }else{
            $this->view("error_page","","",[]);
            exit();
        }
        if(isset($_POST['id'])==false){
            $this->view("error_page","","",[]);
            exit();
        }
        $id = $_POST["id"];
        $seller = $this->model('admin');
        // print_r($seller->getSeller());
        echo ($seller->updateSeller($id,$typeSeller));
    }
}