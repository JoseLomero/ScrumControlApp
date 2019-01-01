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
    <!-- JS archives -->
    <script type="text/javascript" src="js/formGenerator.js"></script>
    <script type="text/javascript" src="js/helpers.js"></script>
    <script type="text/javascript" src="js/formRemover.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/errors.js"></script>
    <script type="text/javascript" src="js/_init.js" defer></script>
    
    <!-- CSS archives -->
    <link rel="stylesheet" href="css/style.css">
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
      $consulta_datos = "SELECT Usuarios.ID, Usuarios.Nom FROM Usuarios WHERE Usuarios.Permisos = 2;";
      $resultado = mysqli_query($registre, $consulta_datos);
      global $nombres;
      
      echo "<script>
      var nombresSM = [];";
      
      while ($registre = mysqli_fetch_assoc($resultado)) {
        echo "nombresSM.push({ ",
          "id: '",$registre['ID'],"',",
          "name: '".$registre['Nom']."'",
        "});";
      }

      echo "</script>";
    }

    function retrieveProductOwner($registre) {
      $consulta_datos = "SELECT Usuarios.ID, Usuarios.Nom FROM Usuarios WHERE Usuarios.Permisos = 1;";
      $resultado = mysqli_query($registre, $consulta_datos);
      global $nombres;
      
      echo "<script>
      var nombresPO = [];";
      
      while ($registre = mysqli_fetch_assoc($resultado)) {
        echo "nombresPO.push({ ",
          "id: '",$registre['ID'],"',",
          "name: '".$registre['Nom']."'",
        "});";
      }

      echo "</script>";
    }

    function retrieveDeveloperTeam($registre) {
      $consulta_datos = "SELECT Grupos.Nombre_Grupo, Grupos.ID_Proyecto FROM Grupos WHERE Grupos.ID_Proyecto is NULL;";
      $resultado = mysqli_query($registre, $consulta_datos);
      global $nombres;
      
      echo "<script>
      var nombresGD = [];";
      
      while ($registre = mysqli_fetch_assoc($resultado)) {
        echo "nombresGD.push({ ",
          "name: '",$registre['Nombre_Grupo'],"',",
          "id: '".$registre['ID_Proyecto']."'",
        "});";
      }

      echo "</script>";
    }

    userData($login_session, $db);
    retrieveScrumMaster($db);
    retrieveProductOwner($db);
    retrieveDeveloperTeam($db);
    
    echo "<nav>
      <div class='nav-wrapper grey darken-2'>
        <span class='brand-logo'>Scrum Control App</span>
        <ul class='right '>
          <li>Bienvenido, ".$login_session."</li>
          <li>
            <a href='logout.php' class='btn'>
              <i class='material-icons left'>exit_to_app</i> Logout
            </a>
          </li>
        </ul>
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

    <div class="window-message">
		  <div id="errores"></div>
    </div>

  </body>
</html>