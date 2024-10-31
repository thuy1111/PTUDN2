<?php
    class clsKetNoi{
        public function moketnoi(){
            return mysqli_connect('localhost','root', '', 'hospital_db');
        }
        public function dongketnoi($conn){
            $conn -> close();
        }
    }
?>