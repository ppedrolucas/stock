<?php
try{
    DEFINE('HOST','localhost');
    DEFINE('BD','bdstore');
    DEFINE('USER','root');
    DEFINE('PASS','');

    $conect = new PDO('mysql:host='.HOST.';dbname='.BD,USER,PASS);
    $conect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "<p>ERRO DE PDO</p>".$e->getMessage();
}