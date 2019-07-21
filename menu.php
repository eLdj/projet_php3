<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Projet Php</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <!-- <a class="navbar-brand" href="#">
          <img src="http://placehold.it/150x50?text=Logo" alt="">
        </a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="inscrire.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="promo.php">Promotion</a>
        </li>
        <li class="dropdown">
          <a class="nav-link" class="dropdown-toggle" data-toggle="dropdown" href="#">Modification</a>
          <ul class="dropdown-menu">
            <li class="dropdown-submenu"><a href="modifpromo.php" >Promotions</a></li>
            <li class="dropdown-submenu"><a href="modifetu.php" >Apprenants</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listetu.php">Les apprenants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>