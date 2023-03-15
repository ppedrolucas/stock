<?php
ob_start(); //ARMAZENA MEUS DADOS EM CACHE
session_start(); //INICIA A SESSÃO
if(!isset($_SESSION['loginUser']) && (!isset($_SESSION['passUser']))){
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
    <title>Shards Dashboard Lite - Free Bootstrap Admin Template – DesignRevision</title>
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
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="home.php">
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
             
             
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    
                  </div>
                </div>
              </form>
              <ul class="navbar-nav border-left flex-row ">
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="images/avatars/0.jpg" alt="User Avatar">
                    <span class="d-none d-md-inline-block">User</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <!--<a class="dropdown-item" href="user-profile-lite.php">
                      <i class="material-icons">&#xE7FD;</i> Profile</a>-->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="?sair">
                      <i class="material-icons text-danger">&#xE879;</i> Logout </a>
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
                <span class="text-uppercase page-subtitle">Sistema de Estoque</span>
                <h3 class="page-title">Budega Da Informática</h3>
              </div>
            </div>
            <!-- Cards -->
            <div class="row">
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Posts</span>
                        <h6 class="stats-small__value count my-3">2,390</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">4.7%</span>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Pages</span>
                        <h6 class="stats-small__value count my-3">182</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Users</span>
                        <h6 class="stats-small__value count my-3">2,413</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-4"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Subscribers</span>
                        <h6 class="stats-small__value count my-3">17,281</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease">2.4%</span>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-5"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fim dos cards -->
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  

                    <div class="card-header border-bottom">
                      <h6 class="m-0">Formulário</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item px-3">
                        <form action="" method="post" enctype="multipart/form-data">

                          <!-- Input Groups -->
                          <strong class="text-muted d-block mb-2">Dados do cliente</strong>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="fa-sharp fa-solid fa-user"></i>
                              </span>
                            </div>
                            <input type="text" name="nome" class="form-control" placeholder="Nome" aria-label="Username" aria-describedby="basic-addon1" required> 
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fa-solid fa-phone"></i>
                              </span>
                            </div>
                            <input type="text" name="tel" class="form-control" placeholder="Telefone para contato" onkeypress="$(this).mask('(00) 00000-0000')" aria-label="" aria-describedby="basic-addon2" required>
                          </div>
                        
                          <!-- Input Groups -->
                          <!-- Seamless Input Groups -->
                          <strong class="text-muted d-block mb-2">Informações do computador</strong>
                          <div class="input-group mb-3">
                            <div class="input-group input-group-seamless">
                              <input type="text" name="modelo" class="form-control" id="form1-username" placeholder="Modelo" required> 
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group input-group-seamless">
                              <input type="text" name="fab" class="form-control" id="form1-username" placeholder="Fabricante" required> 
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group input-group-seamless">
                              <input type="text" name="serie" class="form-control" id="form1-username" placeholder="Número de Série " required> 
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group input-group-seamless">
                              <textarea type="text" name="descProblem" class="form-control" id="form1-username" placeholder="Descrição do problema e sintomas" required></textarea>
                            </div>
                          </div>
                          
                            <button type="submit" name="btnEnviar" class="mb-2 btn btn-primary mr-2">Enviar</button>
                        </form>
                        <?php
                        
                        include_once('config/conexao.php');
                        
                        if(isset($_POST['btnEnviar'])) {
                          $nome=$_POST['nome'];
                          $tel=$_POST['tel'];
                          $modelo=$_POST['modelo'];
                          $fab=$_POST['fab'];
                          $serie=$_POST['serie'];
                          $desProblem=$_POST['descProblem'];
                          $data= date('Y-m-d');

                          $cadastrar = "INSERT INTO tbstore (clientStore,telStore,modStore,fabStore,seStore,desStore,data) VALUES (:nome,:tel,:modelo,:fab,:serie,:descProblem,:data)";

                          try{
                            $result = $conect->prepare($cadastrar);
                            $result->bindParam(':nome',$nome, PDO::PARAM_STR);
                            $result->bindParam(':tel',$tel, PDO::PARAM_STR);
                            $result->bindParam(':modelo',$modelo, PDO::PARAM_STR);
                            $result->bindParam(':fab',$fab, PDO::PARAM_STR);
                            $result->bindParam(':serie',$serie, PDO::PARAM_STR);
                            $result->bindParam(':descProblem',$desProblem, PDO::PARAM_STR);
                            $result->bindParam(':data',$data, PDO::PARAM_STR);
                            $result->execute();

                            $contar=$result->rowCount();
                            if($contar > 0){
                              echo '<div class="alert alert-success" role="alert">
                                      <strong>OK cadastro concluido!</strong>
                                    </div>';
                            }else{
                              echo '<div class="alert alert-danger" role="alert">
                                      <strong>OPS algo de errado não está certo!</strong>
                                    </div>';
                            }
                          }catch (PDOException $e){
                            echo "<p>ERRO DE PDO = </p>".$e->getMessage();
                          }
                        }
                        
                        ?>
                      </li>
                    </ul>
                  
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
              
                      <div class="card-header border-bottom">
                        <h6 class="m-0">Últimos Registros - Resumo</h6>
                      </div>
                      <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">#</th>
                              <th scope="col" class="border-0">Cliente</th>
                              <th scope="col" class="border-0">Contato</th>
                              <th scope="col" class="border-0">Modelo</th>
                              <th scope="col" class="border-0">Desc.Problema</th>
                              <th scope="col" class="border-0">Data</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            
                            $select = "SELECT * FROM tbstore ORDER BY idUser DESC LIMIT 5";
                            try{
                              $resultado = $conect->prepare($select);
                              $resultado->execute();
                              $contar = $resultado->rowCount();
                              if($contar > 0){
                                while($show = $resultado->FETCH(PDO::FETCH_OBJ)){

                                
                            
                            ?>
                            <tr>
                              <td><?php echo $show->idUser;?></td>
                              <td><?php echo $show->clientStore;?></td>
                              <td><?php echo $show->telStore;?></td>
                              <td><?php echo $show->modStore;?></td>
                              <td><?php echo $show->desStore;?></td>
                              <td><?php echo $show->data;?></td>
                            </tr>
                            <?php
                            
                                  }
                                }else{
                                  echo '<div class="alert alert-danger" role="alert">
                                          <strong>OPS algo de errado não está certo!</strong>
                                        </div>';
                                }
                              }catch (PDOException $e){
                                echo "<p>ERRO DE PDO = </p>".$e->getMessage();
                              }
                            
                            ?>
                          </tbody>
                        </table>
                      </div>
                 
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">© Todos os direitos reservados
              <a href="#" rel="nofollow">2023</a>
            </span>
          </footer>
        </main>
      </div>
    </div>
    <script src="scripts/jquery-3.6.3.min.js"></script>
    <script src="scripts/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>
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
