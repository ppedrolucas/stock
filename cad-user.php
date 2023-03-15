<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estoque | Budega Da Informática</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
</head>
<body class="banner">
    <section>
    <div class="container">
    <div class="formLog">
        <h2 class="title">Cadastre-se</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="camp">
                <label for="">Nome Completo*</label>
                <input type="text" name="nome" class="pao" placeholder="Joaquim Phonex" required>
            </div>
            <div class="camp">
                <label for="">Nome de usuário*</label>
                <input type="text" name="username" placeholder="Username23" required>
            </div>
            <div class="camp">
                <label for="">Telefone*</label>
                <input type="text" name="tel" onkeypress="$(this).mask('(00) 0000-0000')" class="pao" placeholder="4002-8922" required>
            </div>
            <div class="camp">
                <label for="">Endereço de E-mail*</label>
                <input type="email" name="email" class="pao" placeholder="@exemple.com" required>
            </div>
            <div class="camp">
                <label for="">Crie uma senha de 6 dígitos*</label>
                <input type="password" name="senha" onkeypress="$(this).mask('000000')" class="pao" placeholder="Crie uma senha se 6 dígitos*" required>
            </div>
            <button type="submit" name="btnCad" class="btnLog">Cadastrar</button>
        </form>
        
        <a href="index.php" class="pao">Voltar para o login</a>
        <?php
        
        include('config/conexao.php');
        if(isset($_POST['btnCad'])){
            $nome=$_POST['nome'];
            $user=$_POST['username'];
            $tel=$_POST['tel'];
            $email=$_POST['email'];
            $pass=$_POST['senha'];
            $cadastro="INSERT INTO tbusers(nameUser,username,telUser,emailUser,passUser) VALUES(:nome,:username,:tel,:email,:pass)";                   
            try {
              $result = $conect->prepare($cadastro);
              $result->bindParam(':nome',$nome, PDO::PARAM_STR);
              $result->bindParam(':username',$user, PDO::PARAM_STR);
              $result->bindParam(':tel',$tel, PDO::PARAM_STR);
              $result->bindParam(':email',$email, PDO::PARAM_STR);
              $result->bindParam(':pass',$pass, PDO::PARAM_STR);
              $result->execute();

              $contar=$result->rowCount();
              if($contar > 0){
                    echo ' <h5>OK!</h5>
                              cadastrado realizado com sucesso !!!';
                  }else{
                    echo '<h5>Ops!</h5>
                            algo de errado não está certo !!!';
                  }
              }catch (PDOException $e){
                echo"<strong> ERRO DE CADASTRO PDO = </strong>". $e->getMessage();
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