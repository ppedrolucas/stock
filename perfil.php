<?php
ob_start(); //ARMAZENA MEUS DADOS EM CACHE
session_start(); //INICIA A SESSÃO
if(!isset($_SESSION['username']) && (!isset($_SESSION['passUser']))){
    header("Location: index.php?acao=negado");
    exit;
}
include_once('config/sair.php');
?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema de Estoque | Edição de Perfil</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
  </head>
  <body class="h-100">
    
    
    <div class="container-fluid">
    <?php
        include_once('config/conexao.php');
        $userOnline = $_SESSION['username'];
        $passOnline = $_SESSION['passUser'];

        $selectOnline = "SELECT * FROM tbusers WHERE username=:userOnline AND passUser=:passOnline";

        try{
              $resultOnline = $conect->prepare($selectOnline);
              
              $resultOnline->bindParam(':userOnline',$userOnline, PDO::PARAM_STR);
              $resultOnline->bindParam(':passOnline',$passOnline, PDO::PARAM_STR);
              $resultOnline->execute();

              $contar = $resultOnline->rowCount();
              if($contar > 0){
                  while($show = $resultOnline->FETCH(PDO::FETCH_OBJ)){
                    $id = $show->idUser;
                    $nomeOn = $show->nameUser;
                    $userOn = $show->username;
                    $emailOn = $show->emailUser;
                    $passOn = $show->passUser;
                    $telOn = $show->telUser;
                  }
              }else{
                '<div class="alert alert-danger" role="alert">
                            Não deu certo
                        </div>';
              }

        }catch(PDOException $e){
              echo "<strong>ERRO DE LOGIN = </strong>".$e->getMessage();
            }
        ?>
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">Budega Da Informática</span>
                </div>
              </a>
              
            </nav>
          </div>
          
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="home.php">
                  <i class="fa-sharp fa-solid fa-house"></i>
                  <span>Página Principal</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="users.php">
                <i class="fa-sharp fa-solid fa-users"></i>
                  <span>Tablela de Usuários</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="tables.php">
                  <i class="material-icons">table_chart</i>
                  <span>Tablela de Serviços</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="user-profile-lite.php">
                <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                  <span>Editar Perfil</span>
                </a>
              </li>

            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <div action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                
              </div>
              <ul class="navbar-nav border-left flex-row ">
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="images/avatars/0.jpg" alt="User Avatar">
                    <span class="d-none d-md-inline-block"><?php echo $_SESSION['username']?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="perfil.php">
                      <i class="material-icons">&#xE7FD;</i> Perfil</a>
                    
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="?sair">
                      <i class="material-icons text-danger">&#xE879;</i> Sair </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Sistema de estoque</span>
                <h3 class="page-title">Editar Perfil</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="images/avatars/0.jpg" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0"><?php echo $nomeOn;?></h4>
                    <span class="text-muted d-block mb-2"><?php echo $userOn;?></span>
                    <span class="text-muted d-block mb-2"><?php echo $emailOn;?></span>
                    
                  </div>
                  <ul class="list-group list-group-flush">
                   
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Dados do perfil</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form method="post" enctype="multipart/form-data">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName">Nome Completo*</label>
                                <input type="text" name="nome" class="form-control" id="feFirstName" value="<?php echo $nomeOn;?>"> 
                              </div>
                              <div class="form-group col-md-6">
                                <label for="feLastName">Username*</label>
                                <input type="text" name="username" class="form-control" id="feLastName" value="<?php echo $userOn;?>"> 
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email*</label>
                                <input type="email" name="email" class="form-control" id="feEmailAddress" value="<?php echo $emailOn;?>"> </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Senha*</label>
                                <input type="password" name="pass" class="form-control" id="fePassword" value="<?php echo $passOn;?>"> 
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Telefone*</label>
                              <input type="text" name="tel" class="form-control" onkeypress="$(this).mask('(00) 00000-0000')" id="feInputAddress" value="<?php echo $telOn;?>">
                            </div>
                            
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Foto de Perfil</label>
                                <input type="file" class="form-control" name="upload">
                              </div>
                            </div>
                            <button type="submit" name="btnUp" class="btn btn-accent">Editar</button>
                          </form>
                          <?php
                                    include_once('config/conexao.php');
                                    if(isset($_POST['btnUp'])){
                                        $nome=$_POST['nome'];
                                        $username=$_POST['username'];
                                        $tel=$_POST['tel'];
                                        $email=$_POST['email'];
                                        $pass=$_POST['pass'];
                                        $editar="UPDATE tbusers SET nameUser=:nome,username=:username,emailUser=:email,passUser=:pass,telUser=:tel WHERE idUser=:id";                   
                                        try {
                                          $result = $conect->prepare($editar);
                                          $result->bindParam(':id',$id, PDO::PARAM_INT);
                                          $result->bindParam(':nome',$nome, PDO::PARAM_STR);
                                          $result->bindParam(':username',$username, PDO::PARAM_STR);
                                          $result->bindParam(':tel',$tel, PDO::PARAM_STR);
                                          $result->bindParam(':email',$email, PDO::PARAM_STR);
                                          $result->bindParam(':pass',$pass, PDO::PARAM_STR);
                                          $result->execute();
                                            
                                          $contar=$result->rowCount();
                                          if($contar > 0){
                                                echo ' <div class="alert alert-success" role="alert">
                                                        <strong>OK conta editada com sucesso!</strong>
                                                      </div>';
                                              }else{
                                                echo '<div class="alert alert-danger" role="alert">
                                                      <strong>Ops conta não editada!</strong>
                                                    </div>';
                                              }                                           
                                          }catch (PDOException $e){
                                            echo"<strong> ERRO DE CADASTRO PDO = </strong>". $e->getMessage();
                                          }
                                    }
                                    ?>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">© Todos os direitos reservados
              <a href="https://designrevision.com" rel="nofollow">2023</a>
            </span>
          </footer>
        </main>
      </div>
    </div>
    <script src="scripts/jquery-3.6.3.min.js"></script>
    <script src="scripts/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
  </body>
</html>