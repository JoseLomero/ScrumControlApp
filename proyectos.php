<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Proyectos Actuales</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php
    $user = $_POST['user'];
    echo "<nav>";
    echo "  <p>".$user."</p>";
    echo "  <a href='index.php'>";
    echo "    <button><img class='logout' src='img/logout.png'></button>";
    echo "  </a>";
    echo "</nav>";
    ?>
  </body>
</html>