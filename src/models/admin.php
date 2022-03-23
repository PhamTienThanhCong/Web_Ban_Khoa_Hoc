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
                $sql = "INSERT INTO `admin`(
                    `name_admin`,
                    `email_admin`,
                    `description_admin`,
                    `password`,
                    `lever`
                )
                VALUES(
                    '$name',
                    '$email',
                    '$description',
                    '$secure_pass',
                    '0'
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
    }
?>