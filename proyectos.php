<?php include('session.php');?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
  </head>

  <body>
    <?php
    $sql = "SELECT Nombre_Proyecto, Descripcion FROM Proyectos;";
    mysqli_select_db($db,'ScrumControlBD');
    $resultat = mysqli_query($db,$sql);

    /*
    function userData($user, $registre) {
      $consulta_datos = "SELECT Usuarios.Permisos FROM Usuarios WHERE Usuarios.Nom = '$user';";
      echo $consulta_datos;
      while ($registre = mysqli_fetch_assoc($resultado)) {
        echo $resultado;
        "<script> var permisosUsuario = ".$resultado."</script>";
        "<div class='".$resultado."'></div>";
      }
    }
    userData($login_session, $registre);
    */
    echo "<nav>
      <div class='nav-user'>
        <div class='app-Name' ><p>Scrum Control App</p></div>
        <div class='usuario-user'><p>Bienvenido, ".$login_session."</p>
        <a href='logout.php'>
          <button><img class='logout' src='img/logout.png'></button>
        </a></div>
      </div>
    </nav>";
    echo "<div class='proyect-list'>
      <div class='proyect-title'>Proyectos</div>
      <div class='proyect-table'>
        <ul>";
    while ($registre = mysqli_fetch_assoc($resultat)) {
      echo "<li><a href='#' name='proyecto'>".$registre['Nombre_Proyecto']." (".$registre['Descripcion'].")</a></li>";
    }
      echo "</ul>";
    echo "</div>";
    echo "</div>";
    ?>
  </body>
</html>
