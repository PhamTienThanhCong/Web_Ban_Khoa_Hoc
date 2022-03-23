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
        function checkLogin($email, $password){
            $sql = "SELECT * FROM `admin` WHERE `email_admin` = '$email'";
            $account = mysqli_query($this->connection, $sql);
            $account = mysqli_fetch_array($account);
            die($sql);
        }
    }
?>