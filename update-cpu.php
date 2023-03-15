<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
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
    <?php
        include_once('config/conexao.php');
        if(!isset($_GET['id'])){
            header("Location: update-cpu.php");
            exit;
        }
        $id = filter_input(INPUT_GET,'id',FILTER_DEFAULT);

        $select = "SELECT * FROM tbstore WHERE idUser=:id";
        try{
            $resultado = $conect->prepare($select);
            $resultado->bindParam(':id',$id, PDO::PARAM_INT);
            $resultado->execute();

            $cont = $resultado->rowCount();
            if($cont > 0){
                while($show = $resultado->FETCH(PDO::FETCH_OBJ)){
                    $id = $show->idUser;
                    $nomeUp = $show->clientStore;
                    $telUp = $show->telStore;
                    $modUp = $show->modStore;
                    $fabUp = $show->fabStore;
                    $seUp = $show->seStore;
                    $desUp = $show->desStore;
                }
            }else{
                echo '<h5>Ops!</h5>
                não foi possível editar este perfil !!!';
            }
            
        }catch (PDOException $e){
            echo"<strong> ERRO DE SELECT NO PDO = </strong>". $e->getMessage();
          }
        ?>
    <div class="formLog">
        <h2 class="title">Edite seu dados</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="camp">
                <label for="">Nome do Cliente*</label>
                <input type="text" name="nome" class="pao" placeholder="" value="<?php echo $nomeUp?>">
            </div>
            <div class="camp">
                <label for="">Telefone*</label>
                <input type="text" name="tel" class="pao" placeholder="" onkeypress="$(this).mask('(00) 00000-0000')" value="<?php echo $telUp?>">
            </div>
            <div class="camp">
                <label for="">Modelo*</label>
                <input type="text" name="modelo" placeholder="" value="<?php echo $modUp?>">
            </div>
            <div class="camp">
                <label for="">Fabricante*</label>
                <input type="text" name="fab" class="pao" placeholder="" value="<?php echo $fabUp?>">
            </div>
            <div class="camp">
                <label for="">Número de série*</label>
                <input type="text" name="serie" class="pao" placeholder="" value="<?php echo $seUp?>">
            </div>
            <div class="camp">
                <label for="">Descrição do Problema*</label>
                <input type="text" name="descProblem" class="pao" placeholder="" value="<?php echo $desUp?>">
            </div>
            <button type="submit" name="btnUp" class="btn-login btn btn-primary">Editar</button>
        </form>
        
        <a href="tables.php" class="pao">Voltar</a>
                                <?php
                                    include_once('config/conexao.php');
                                    if(isset($_POST['btnUp'])){
                                        $nome=$_POST['nome'];
                                        $tel=$_POST['tel'];
                                        $mod=$_POST['modelo'];
                                        $fab=$_POST['fab'];
                                        $serie=$_POST['serie'];
                                        $descProblem=$_POST['descProblem'];

                                        $editar="UPDATE tbstore SET clientStore=:nome,telStore=:tel,modStore=:modelo,fabStore=:fab,seStore=:serie,desStore=:descProblem WHERE idUser=:id";                   
                                        try {
                                          $result = $conect->prepare($editar);
                                          $result->bindParam(':id',$id, PDO::PARAM_INT);
                                          $result->bindParam(':nome',$nome, PDO::PARAM_STR);
                                          $result->bindParam(':tel',$tel, PDO::PARAM_STR);
                                          $result->bindParam(':modelo',$mod, PDO::PARAM_STR);
                                          $result->bindParam(':fab',$fab, PDO::PARAM_STR);
                                          $result->bindParam(':serie',$serie, PDO::PARAM_STR);
                                          $result->bindParam(':descProblem',$descProblem, PDO::PARAM_STR);
                                          $result->execute();
                                            
                                          $contar=$result->rowCount();
                                          if($contar > 0){
                                                echo ' <div class="alert alert-success" role="alert">
                                                        OK registro editado com sucesso!
                                                      </div>';
                                              }else{
                                                echo '<div class="alert alert-success" role="alert">
                                                      Ops registro não editado!
                                                    </div>';
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