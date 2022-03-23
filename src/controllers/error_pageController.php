<?php
    class error_page extends Controllers{
        function default(){
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $this->view("error_page","","",[$actual_link]);
        }
    }
?>