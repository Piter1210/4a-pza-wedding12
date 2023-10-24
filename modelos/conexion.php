<?php 
    class Conexion{
        static public function conectar(){
            $link = new PDO("mysql:host=localhost;port=3306;dbname=4a-pza-wedding", "soporte4A", "lBh8rNWVq8clJiBY");
    
            $link->exec("set names utf8");
    
            return $link;
        }
    }
    
?>