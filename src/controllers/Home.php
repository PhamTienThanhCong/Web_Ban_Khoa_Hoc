<?php
    class Home extends Controllers{
        public function default(){
            $this->view("home","form",[]);
        }
        public function sayHi(){
            $name = $this->model("SinhVien");
            $this->view("home","sayHi",$name->getName());
        }
        public function check(){
            $data = $_POST['demo'];
            echo $data;
        }
    }
?>