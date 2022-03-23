<?php
    class ConnectDB{
        private $connection;
        private $hostname = 'localhost';
        private $user = 'root';
        private $password = '';
        private $nameDB = 'trouvaille';
        
        function __construct(){
            $this->connection = mysqli_connect("$this->hostname","$this->user","$this->password","$this->nameDB");
            if (!$this->connection){
                die ('Failed to connect with server');
            }  
            mysqli_set_charset($this->connection,'utf8');
        }
        protected function getValues($sql){
            $data = mysqli_connect($this->connection,$sql);
            return $data;
        }
        protected function pushValue($sql){
            mysqli_connect($this->connection,$sql);
        }
    }
?>