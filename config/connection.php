<?php 
    require_once 'db.php';

    class Connection{
        private $host;
        private $user;
        private $passw;
        private $dbname;

        public function __construct()
        {
            $this->host = HOST;
            $this->user = USER;
            $this->passw = PASSWORD;
            $this->dbname = DBNAME;
        }

        public function connect(){
            try {
                $conecction = 'mysql:host='.$this->host.';dbname='.$this->dbname;
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                $PDO = new PDO($conecction,$this->user,$this->passw,$options);
                return $PDO;
            } catch (PDOException $e) {
                die('ERROR: '.$e->getMessage());
            }   
        }
    }
?>