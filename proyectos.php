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
    //proyectos:
    $sql = "SELECT Nombre_Proyecto, Descripcion FROM Proyectos;";
    mysqli_select_db($db,'ScrumControlBD');
    $resultat = mysqli_query($db,$sql);

    
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
    
    echo "<nav>
      <div class='nav-user'>
        <div class='app-Name' ><p>Scrum Control App</p></div>
        <div class='usuario-user'><p>Bienvenido, ".$login_session."</p>
        <a href='logout.php'>
          <button><img class='logout' src='img/logout.png'></button>
        </a></div>
      </div>
    </nav>
    <div id='errores'>
      <div class='errores-icono'><img src='img/exclamation.png' class='basicError-icon'></div>
      <div class='errores-mensaje'><p>Error!</p></div>
    </div>\n";
    echo "    <div>\n";
    while ($registre = mysqli_fetch_assoc($resultat)) {
      echo "      <div><a href='#'><h2>".$registre['Nombre_Proyecto']."</h2></div>\n";
      echo "      <div><h4>".$registre['Descripcion']."</h4></div>\n";
    }
    echo "    </div>\n";
    ?>
  </body>
</html>
