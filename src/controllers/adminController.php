<?php
    class admin extends Controllers{
        public function default(){
            $this->login([]);
        }
        public function login($title = []){
            $this->CheckWasLogin();
            $this->view("login_admin","","",[]);
        }
        public function register($title = []){
            $this->CheckWasLogin();
            $this->view("register_admin","","",[]);
        }
    }
?>