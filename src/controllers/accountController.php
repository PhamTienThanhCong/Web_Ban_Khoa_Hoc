<?php
    class account extends Controllers{
        public function default(){
            $this->view("error_page","","",[]);
        }
        public function create_seller(){
            $this->CheckWasLogin();

            if (!isset($_POST['email']) || !isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['password'])){
                echo 2;
                exit();
            }
            
            $name = addslashes($_POST["name"]);
            $email = addslashes($_POST["email"]);
            $description = addslashes($_POST["description"]);
            $password = addslashes($_POST["password"]);
            
            if ($name == "" || $email == "" || $description == "" || $password == ""){
                echo 2;
                exit();
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 0;
                exit();
            }

            $secure_pass = password_hash($password, PASSWORD_BCRYPT);
            $save = $this->model('admin');

            echo $save->createSeller($name, $email, $description, $secure_pass);
        }
        public function login_admin(){
            $this->CheckWasLogin();
            if (!isset($_POST['email']) || !isset($_POST['password'])){
                die("0");
            }

            $email = addslashes($_POST["email"]);
            $password = addslashes($_POST["password"]);
            $remember = "0";
            if (isset($_POST["remember"])){
                $remember = 1;
            }
            if ($email == "" || $password == ""){
                die("0");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die("0");
            }
            $login_account = $this->model('admin');
            $login_account->checkLogin($email, $password, $remember);
        }
        public function logout(){
            $actual_link = "http://$_SERVER[HTTP_HOST]";
            if (isset($_SESSION['lever'])) {
                if ($_SESSION['lever'] == "2"){
                    $actual_link = $actual_link."/seller/login";
                }else if ($_SESSION['lever'] == "1"){
                    $actual_link = $actual_link."/seller/admin";
                }else{
                    $actual_link = $actual_link."/home";
                }
            }
            session_destroy();
            if (isset($_COOKIE['token'])) {
                unset($_COOKIE['token']); 
                setcookie('token', null, -1, '/'); 
            }
            if (isset($_COOKIE['token_user'])) {
                unset($_COOKIE['token_user']); 
                setcookie('token_user', null, -1, '/'); 
            }
            header ("Location: $actual_link");
        }
        public function update_account_password(){
            if (isset($_POST['new_password'])== false || isset($_POST['password']) == false) {
                echo "0";
                exit();
            }
            $id = $_SESSION['id_admin'];
            $password = addslashes($_POST["new_password"]);
            $old_password = addslashes($_POST["password"]);
            $secure_pass = password_hash($password, PASSWORD_BCRYPT);
            $change_Password = $this->model('admin');
            echo $change_Password->updatePassWord($id, $secure_pass, $old_password);
        }

    }
?>