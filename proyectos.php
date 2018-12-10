<?php include('session.php'); ?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <?php

    echo "<nav>";
    echo "  <div class='nav-user'>";
    echo "    <div class='app-Name' ><p>Scrum Control App</p></div>";
    echo "    <div class='usuario-user'><p>Bienvenido, ".$login_session."</p>";
    echo "    <a href='logout.php'>";
    echo "      <button><img class='logout' src='img/logout.png'></button>";
    echo "    </a></div>";
    echo "  </div>";
    echo "</nav>";
    ?>
  </body>
</html>
