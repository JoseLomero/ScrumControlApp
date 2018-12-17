<?php include('session.php');?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <!-- Materialize -->
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">

    <!-- Own stuff -->

    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js" defer></script>
    <script type="text/javascript" src="js/error.js" defer></script>
  </head>

  <body>
    <?php

    $sql = "SELECT Nombre_Proyecto, Descripcion FROM Proyectos;";
    mysqli_select_db($db,'ScrumControlBD');
    $resultat = mysqli_query($db,$sql);


    
    function userData($user, $registre) {
      $consulta_datos = "SELECT Usuarios.Permisos, Usuarios.ID_Grupo FROM Usuarios WHERE Usuarios.Nom = '$user';";
      $resultado = mysqli_query($registre, $consulta_datos);
      global $permisos, $grupo;
      while ($registre = mysqli_fetch_assoc($resultado)) {
        $permisos = $registre['Permisos'];
        $grupo = $registre['ID_Grupo'];
        echo "<script>var tipoUsuario = ".$permisos."</script>";
      }
    }

    function retrieveScrumMaster($registre) {
      $consulta_datos = "SELECT Usuarios.Nom FROM Usuarios WHERE Usuarios.Permisos = 2;";
      $resultado = mysqli_query($registre, $consulta_datos);
      global $nombres;
      
      echo "<script>
      var nombresSM = [];";
      
      while ($registre = mysqli_fetch_assoc($resultado)) {
        $nombres = $registre['Nom'];
        echo "nombresSM.push('".$nombres."');";
      }

      echo "</script>";
    }

    userData($login_session, $db);
    retrieveScrumMaster($db);

    userData($login_session, $db);
    retrieveScrumMaster($db);
    
    echo "<nav>
      <div class='nav-user'>
        <div class='app-Name' ><p>Scrum Control App</p></div>
        <div class='usuario-user'>
          <p>Bienvenido, ".$login_session."</p>
          <a href='logout.php' class ='btn-small'>
            <i class='material-icons left'>exit_to_app</i>Exit
          </a>
        </div>
      </div>
    </nav>";
    echo "<div class='Project-list'>
      <div class='Project-title'>Proyectos</div>
      <div class='Project-table'>
        <ul>";
    while ($registre = mysqli_fetch_assoc($resultat)) {
      echo "<li><a href='#' name='Proyecto'>".$registre['Nombre_Proyecto']." (".$registre['Descripcion'].")</a></li>";
    }
      echo "</ul>";
    echo "</div>";
    echo "</div>";
    ?>
    
    <div class="row">
      <div class="new-Project-box"></div>
    </div>
  

  </body>
</html>



<!--CONSULTA PROJECTES DEVELOPERS:

  select Nom from Usuarios, Grupos, Proyectos where Usuarios.ID_Grupo = Grupos.ID and Grupos.ID_Proyecto = Proyectos.ID and Grupos.ID = 1;

CONSULTA PROJECTES SCRUM MASTER:

  select Nom from Usuarios, Grupos, Proyectos where Usuarios.ID_Grupo = Grupos.ID and Grupos.ID_Proyecto = Proyectos.ID and Grupos.ID = 1;

CONSULTA PROJECTES PRODUCT OWNER:

  select Nombre_Proyecto from Proyectos where ID_Product_Owner = (select ID from Usuarios where Permisos = 1); -->