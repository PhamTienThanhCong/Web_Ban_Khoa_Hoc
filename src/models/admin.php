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
    }
?>