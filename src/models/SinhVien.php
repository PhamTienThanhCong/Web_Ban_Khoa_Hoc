<?php
    class SinhVien extends ConnectDB{
        function getName(){
            $sql = "SELECT * FROM `user` WHERE id_user";
            $name = mysqli_query($this->connection,$sql);
            return $name ;
        }
    }
?>