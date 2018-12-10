<?php include('session.php'); ?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <?php

    echo "<nav>
      <div class='nav-user'>
        <div class='app-Name' ><p>Scrum Control App</p></div>
        <div class='usuario-user'><p>Bienvenido, ".$login_session."</p>
        <a href='logout.php'>
          <button><img class='logout' src='img/logout.png'></button>
        </a></div>
      </div>
    </nav>
    <button>Crea errores!</button>";
    ?>
  </body>
</html>
