<?php 

 ini_set('max_execution_time',0);    
 date_default_timezone_set("America/Sao_Paulo");
 include 'vendor/autoload.php';
 if(empty($_SESSION['nome'])){
    $_SESSION['loginErro'] = " * Usuário ou senha inválidos"; 
    header("Location: login.php");
 }

 ?>
<header>
    <h1 style="color: #000000;">GeoSite Bot mailing adm</h1>
    <h4 style="color: #000000;">Bem vindo: <?php echo $_SESSION['nome'];?></h4>


    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6a7eee;">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li><a class="navbar-brand" href="index.php">Página inicial Cadastrar Mailing</a></li>
                <li><a class="navbar-brand mx-4" href="cadastrar.php">Cadastrar logins</a></li>
                <li><a class="navbar-brand mx-4" href="dashboard2.php">Dashboard</a></li>
                <li><a class="navbar-brand mx-4" href="sair.php">Logout</a></li>
              
            </ul>
            <form class="d-flex">
              <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
              <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
            </form>
          </div>
        </div>
    </nav>

<!-- <div class="container">
  <div class="row align-items-start">
    <div class="col">
    <a class="navbar-brand" href="index.php">Página inicial Cadastrar Mailing</a>
    </div>
    <div class="col">
    <a  class="navbar-brand" href="cadastrar.php">Cadastrar logins</a>
    </div>
    <div class="col">
    <a class="navbar-brand"  href="dashboard2.php">Dashboard</a>
    </div>
    <div class="col">
    <a  class="navbar-brand" href="sair.php">Logout</a>
    </div>
  </div> -->

  <!-- <nav class="left">
 
        <ul>
            <li><a  href="index.php">Página inicial Cadastrar Mailing</a></li>
            <li><a  href="cadastrar.php">Cadastrar logins</a></li>
            <li><a  href="dashboard2.php">Dashboard</a></li>
            <li><a  href="sair.php">Logout</a></li>
        </ul> 
    </nav>  -->
</header>    