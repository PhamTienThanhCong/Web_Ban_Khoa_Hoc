<?php
    class Controllers{
        protected function model($model){
            require_once "./src/models/". $model .".php";
            return new $model;
        }
        protected function view($template,$name_page,$view,$data=[]){
            $link_sever = "http://$_SERVER[HTTP_HOST]";
            require_once "./src/views/template/". $template .".php";
        }
        protected function notFound(){
            $actual_link = "http://$_SERVER[HTTP_HOST]";
            header ("Location: ".$actual_link."/admin/login");
            exit();
        }
        protected function CheckLoginSeller(){
            if (isset($_SESSION['lever']) == false) {
                $this->notFound();
            }
            if ($_SESSION['lever'] != "2"){
                $this->notFound();
            }
        }
        protected function CheckLoginAdmin(){
            if (isset($_SESSION['lever']) == false) {
                $this->notFound();
            }
            if ($_SESSION['lever'] != "1"){
                $this->notFound();
            }
        }
        protected function CheckWasLogin(){
            $actual_link = "http://$_SERVER[HTTP_HOST]";
            if (isset($_SESSION['lever'])) {
                if ($_SESSION['lever'] == "2"){
                    header ("Location: ".$actual_link."/seller/overview");
                }else{
                    header ("Location: ".$actual_link."/admin/overview");
                }
            }
        }
    }
?>