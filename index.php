<?php
ob_start(); //ARMAZENA MEUS DADOS EM CACHE
session_start(); //INICIA A SESSÃO
if(isset($_SESSION['username']) && (isset($_SESSION['passUser']))){
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script> 
    <title>Sistema de Estoque | Budega Da Informática</title>
    
    <style>
      .btn-login{
      margin-top: 6px;
      margin-bottom: 8px;
      width: 100%;
      }
      a{
    text-decoration: none;
    color: #0d6efd;
      }
      a:hover{
          color: #0b55c4;
      }
    </style>
</head>
<body class="banner">
    <section>
    <div class="container">
    <div class="formLog">
        <h2 class="title">Login</h2>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="camp">
                <label for="">Nome de usuário*</label>
                <input type="text" name="username" placeholder="Ex: Username23" required>
            </div>
            <div class="camp">
                <label for="">Digite sua senha*</label>
                <input type="password" name="pass" onkeypress="$(this).mask('000000')" class="pao" required>
            </div>
            <button type="submit" name="btnLog" class="btn-login btn btn-primary">Entrar</button>
        </form>
        <a href="cad-user.php" class="pao">Criar conta!</a>
        <?php

        include_once('config/conexao.php');

        if(isset($_GET['acao'])){
          $acao = $_GET['acao'];
          if($acao=='not'){
              echo '<div class="alert alert-danger" role="alert">
                          Erro ao acessar o sistema !
                    </div>';
          }else if($acao=='sair'){
              echo '<div class="alert alert-primary" role="alert">
                        Seção encerrada, volte sempre c:
                    </div>';
          }
      }
        if(isset($_POST['btnLog'])){
            
            $login=$_POST['username'];
            $pass=$_POST['pass'];

            $select="SELECT * FROM tbusers WHERE username=:username AND passUser=:passUser";
            try {
              $resultLogin = $conect->prepare($select);
              
              $resultLogin->bindParam(':username',$login, PDO::PARAM_STR);
              $resultLogin->bindParam(':passUser',$pass, PDO::PARAM_STR);
              $resultLogin->execute();
  
              $verificar = $resultLogin->rowCount();
              if ($verificar>0) {
                
                $login=$_POST['username'];
                $pass=$_POST['pass'];
                //CRIAR SESSAO »»
               
                $_SESSION['username'] = $login;
                $_SESSION['passUser'] = $pass;
  
                echo '<div class="alert alert-success" role="alert">
                            Bem-vindo ao seu sistema de estoque :)
                        </div>';
              
                header("Refresh: 1, home.php?acao=welcome");
              }else{
                echo '<div class="alert alert-danger" role="alert">
                            Usuário inválido
                        </div>';
              }
            } catch(PDOException $e){
              echo "<strong>ERRO DE LOGIN = </strong>".$e->getMessage();
            }
          }

        ?>
    </div>
</div>
    </section>
    
    <script src="scripts/jquery-3.6.3.min.js"></script>
    <script src="scripts/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    
</body>
</html>