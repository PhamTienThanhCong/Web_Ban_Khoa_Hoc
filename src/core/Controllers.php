<?php
    class Controllers{
        protected function model($model){
            require_once "./src/models/". $model .".php";
            return new $model;
        }
        protected function view($template,$view,$data=[]){
            require_once "./src/views/template/". $template .".php";
        }
    }
?>