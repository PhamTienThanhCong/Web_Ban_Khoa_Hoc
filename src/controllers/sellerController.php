<?php
    class seller extends Controllers{
        public function default(){
            echo "hello seller";
        }
        public function overview(){
            $this->view("seller","Tổng Quan","overViewSeller",[]);
        }
        public function create_course(){
            $this->view("seller","Tạo Khóa học mới","createCourse",[]);
        }
        public function my_course(){
            $this->view("seller","Khóa học của tôi","myCourse",[]);
        }
        public function edit_course($page){
            $this->view("seller","Chỉnh sửa khóa học","edit_course",[]);
        }
        public function manage_account(){
            $this->view("seller","Quản lý tài khoản","managerAccount",[]);
        }
        
    }
?>