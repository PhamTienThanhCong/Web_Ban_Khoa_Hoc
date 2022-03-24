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
}