<?php
// Lỗi ngu do đặt tên class
    class admin_fix extends ConnectDB{
        function getMyAccount($id){
            $sql = "SELECT * FROM `admin` WHERE `id_admin` = '$id'";
            $account = mysqli_query($this->connection, $sql);
            $account = mysqli_fetch_array($account);
            return $account;
        }
    }