<?php
    class account extends Controllers{
        public function default(){
            $this->view("error_page","","",[]);
        }
        public function create_seller(){
            
            $save = $this->model('admin');
            echo $save->createSeller();
        }

    }
?>