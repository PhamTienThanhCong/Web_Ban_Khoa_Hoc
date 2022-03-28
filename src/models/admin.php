<?php
    class admin extends ConnectDB{
        function default(){
            $this->view("error_page","","",[]);
        }
        function createSeller($name, $email, $description, $secure_pass){
            $sql = "SELECT
                        COUNT(*) as checkMail
                    FROM
                        `admin`
                    WHERE
                        `email_admin` = '$email'";
            $checkMail = mysqli_query($this->connection, $sql);

            $checkMail = mysqli_fetch_array($checkMail);

            if ($checkMail['checkMail'] == 0){
                $bytes = random_bytes(20);
                $token = bin2hex($bytes);
                $sql = "INSERT INTO `admin`(
                    `name_admin`,
                    `email_admin`,
                    `description_admin`,
                    `password`,
                    `lever`,
                    `token_admin`
                )
                VALUES(
                    '$name',
                    '$email',
                    '$description',
                    '$secure_pass',
                    '0',
                    '$token'
                )";
                mysqli_query($this->connection, $sql);
                if (mysqli_error($this->connection) == ""){
                    return 1;
                }else{
                    return 2;
                }
            }else{
                return 0;
            }
        }
        function checkLogin($email, $password, $remember){
            $sql = "SELECT * FROM `admin` WHERE `email_admin` = '$email'";
            $account = mysqli_query($this->connection, $sql);
            $account = mysqli_fetch_array($account);
            if (isset($account['password'])){
                $verify = password_verify($password, $account['password']);
                if($account['lever'] != '0'){
                    if ($verify){
                        $_SESSION['id_admin'] = $account['id_admin'];
                        $_SESSION['name_admin'] = $account['name_admin'];
                        $_SESSION['lever'] = $account['lever'];
                        $_SESSION['image_admin'] = $account['image_admin'];
                        if ($remember == 1){
                            setcookie("token", $account['token_admin'], time() + (86400 * 30), "/");
                        }
                        if($account['lever'] == '1'){
                            die("1");
                        }else if($account['lever'] == '2'){
                            die("2");
                        }
                    }
                }else if($account['lever'] == '0'){
                    die("3");
                }
            }
            die("0");
        }
        function getSeller($page, $type){
            $sql = "SELECT * FROM `admin` WHERE `lever` = '$type' LIMIT 5 OFFSET $page";
            $account = mysqli_query($this->connection, $sql);
            $data = [];
            foreach($account as $seller){
                $data[] = [
                    "id"=>$seller["id_admin"],
                    "name"=>$seller["name_admin"],
                    "email"=>$seller["email_admin"],
                    "image"=>$seller["image_admin"],
                    "description"=>$seller["description_admin"]
                ];
            }
            return json_encode($data);
        }
        function getMyAccount($id){
            $sql = "SELECT * FROM `admin` WHERE `id_admin` = '$id'";
            $account = mysqli_query($this->connection, $sql);
            $account = mysqli_fetch_array($account);
            return $account;
        }
        function updateSeller($id,$type){
            $sql = "SELECT * FROM `admin` WHERE `id_admin` = '$id'";
            $account = mysqli_query($this->connection, $sql);
            $account = mysqli_fetch_array($account);
            $sql = "UPDATE
                        `admin`
                    SET
                        `lever` = '$type'
                    WHERE
                        `id_admin` = '$id'
                    ";
            $sqlDelete = "DELETE FROM `admin` WHERE `id_admin` = '$id'";
            if (isset($account['lever'])){
                if (($account['lever'] == "0") && ($type == "0")){
                    mysqli_query($this->connection, $sqlDelete);
                }else if (($account['lever'] == "0") && ($type == "2")){
                    mysqli_query($this->connection, $sql);
                }else if (($account['lever'] == "2") && ($type == "-1")){
                    mysqli_query($this->connection, $sql);
                }else if (($account['lever'] == "-1") && ($type == "2")){
                    mysqli_query($this->connection, $sql);
                }
                return "1";
            }
        }
        public function updatePassWord($id, $secure_pass, $old_password){
            $sql = "SELECT * FROM `admin` WHERE `id_admin` = '$id'";
            $account = mysqli_query($this->connection, $sql);
            $account = mysqli_fetch_array($account);
            if (isset($account['password'])){
                $verify = password_verify($old_password, $account['password']);
                if($verify){
                    $sql = "UPDATE
                                `admin`
                            SET
                                `password` = '$secure_pass'
                            WHERE
                                `id_admin` = '$id'";
                    mysqli_query($this->connection, $sql);
                    if (mysqli_error($this->connection) == ""){
                        return 1;
                        exit();
                    }
                }
            }
            return 0;
        }
}