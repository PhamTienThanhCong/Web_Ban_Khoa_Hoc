<?php
    class seller extends Controllers{
        public function default(){
            $this->login();
        }
        public function login($title = []){
            $this->CheckWasLogin();
            $this->view("login_admin","","",[]);
        }
        public function overview(){
            $this->CheckLoginSeller();
            $this->view("seller","Tổng Quan","overViewSeller",[]);
        }
        public function create_course(){
            $this->CheckLoginSeller();
            $this->view("seller","Tạo Khóa học mới","createCourse",[]);
        }
        public function my_course(){
            $this->CheckLoginSeller();
            $this->view("seller","Khóa học của tôi","myCourse",[]);
        }
        public function edit_course($page){
            $this->CheckLoginSeller();
            $this->view("seller","Chỉnh sửa khóa học","edit_course",[]);
        }
        public function manage_account(){
            $this->CheckLoginSeller();
            $this->view("seller","Quản lý tài khoản","managerAccount",[]);
        }
        
    }
?>