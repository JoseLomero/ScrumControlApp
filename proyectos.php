<?php include('session.php');?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <?php
    //proyectos:
    $sql = "SELECT Nombre_Proyecto, Descripcion FROM Proyectos;";
    mysqli_select_db($db,'ScrumControlBD');
    $resultat = mysqli_query($db,$sql);

    echo "<nav>
      <div class='nav-user'>
        <div class='app-Name' ><p>Scrum Control App</p></div>
        <div class='usuario-user'><p>Bienvenido, ".$login_session."</p>
        <a href='logout.php'>
          <button><img class='logout' src='img/logout.png'></button>
        </a></div>
      </div>
    </nav>
    <button>Crea errores!</button>
    <div id='errores'>
      <div class='errores-icono'><img src='img/exclamation.png' class='basicError-icon'></div>
      <div class='errores-mensaje'>Error!</div>
    </div>";
    echo "<div>";
    while ($registre = mysqli_fetch_assoc($resultat)) {
      echo "<div><h2>".$registre['Nombre_Proyecto']."</h2></div>";
      echo "<div><h4>".$registre['Descripcion']."</h4></div>";
    }
    echo "</div>";
    ?>
  </body>
</html>
