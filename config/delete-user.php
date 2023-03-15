<?php

include_once('conexao.php');
if(isset($_GET['idDel'])){
    $id=$_GET['idDel'];
    $deletar="DELETE FROM tbusers WHERE  idUser=:id";

    try{
        $resultado = $conect->prepare($deletar);
        $resultado->bindValue(':id', $id, PDO::PARAM_INT);
        $resultado->execute();

        $contar = $resultado->rowCount();
        if($contar>0){
            header("Location: ../users.php");
        }else{
            header("Location: ../users.php");
        }
    }catch (PDOException $e){
        echo "<p>ERRO DE PDO = </p>".$e->getMessage();
    }
}