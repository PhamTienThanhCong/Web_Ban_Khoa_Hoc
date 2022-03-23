<?php
    class admin extends ConnectDB{
        function default(){
            $this->view("error_page","","",[]);
        }
        function createSeller(){
            $sql = "INSERT INTO ";
            return $sql;
        }
    }
?>