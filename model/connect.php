<?php
    class clsKetNoi{
        public function moketnoi(){
            return mysqli_connect('localhost','root', '', 'hospital_db');
        }
        public function dongketnoi($conn){
            $conn -> close();
        }

        public function connect(){
            try{
                $pdo = new PDO("mysql:host=localhost;dbname=hospital_db", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            }catch(PDOException $e){
                die("Could not connect to the database hospital_db: ". $e->getMessage());
                return null;
            }
        }
    }

?>