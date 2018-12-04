<?php include('session.php'); ?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <?php
    $user = $_POST['user'];
    echo "
    <nav>
      <div class='nav-user'>
        <p class='usuario-user'>Bienvenido, ".$user."</p>
        <a href='index.php'>
          <button><img class='logout' src='img/logout.png'></button>
        </a>
      </div>
    </nav>
    <button>Muestra un error!</button>";
    ?>
  </body>
</html>
