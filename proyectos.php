<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <?php
    $user = $_POST['user'];
    echo "<nav>";
    echo "  <div class='nav-user'>";
    echo "    <p class='usuario-user'>Bienvenido, ".$user."</p>";
    echo "    <a href='index.php'>";
    echo "      <button><img class='logout' src='img/logout.png'></button>";
    echo "    </a>";
    echo "  </div>";
    echo "</nav>";
    ?>
  </body>
</html>
