<?php
    class News extends Controllers{
        public function default(){
            echo "hello new";
        }
        public function Newsfeed($title){
            echo "$title[0]";
        }
    }
?>