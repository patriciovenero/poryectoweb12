<?php 
    $server = 'bdmysql.testing-apps.com';
    $username = 'grupo3';
    $password = 'JNc!9*4F#Y59';
    $database = 'grupo3';

    try{
        $bd = new PDO("mysql:host=$server;dbname=$database",$username,$password);
    }catch(PDOException $e){
        die('Coneccion Fallida: '.$e->getMessage());
    }
?>