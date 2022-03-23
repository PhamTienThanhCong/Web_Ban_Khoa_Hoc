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
        protected function CheckWasLogin(){
            if (isset($_SESSION['lever'])){
                header('Location: /');
            }
        }
    }
?>