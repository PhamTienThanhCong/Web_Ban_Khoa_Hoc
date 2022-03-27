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
        public function overview(){
            $this->CheckLoginAdmin();
            $this->view("admin","Tổng quan","overView",[]);
        }
        public function manage_courses(){
            $this->CheckLoginAdmin();
            $this->view("admin","Quản lý khóa học","managerCourse",[]);
        }
        public function manage_seller(){
            $this->CheckLoginAdmin();
            $this->view("admin","Quản lý seller","managerSeller",[]);
        }
        public function manage_user(){
            $this->CheckLoginAdmin();
            $this->view("admin","Quản lý người dùng","managerUser",[]);
        }
        public function manage_account(){
            $this->CheckLoginAdmin();
            $id = $_SESSION['id_admin'];
            $myAccount = $this->model('admin_fix');
            $myAccount = $myAccount->getMyAccount($id);
            $email = $myAccount['email_admin'];
            $description = $myAccount['description_admin'];

            $this->view("admin","Quản lý tài khoản","managerAccount",["email"=>$email,"description"=>$description]);
        }
    }
?>