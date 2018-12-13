<?php include('session.php');?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js" defer></script>
  </head>

  <body>
    <?php

    //Aixo es provisional, ara mateix entris amb qui entris, et sortiran tots els projectes
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
        //echo "<div id='usuario-user' class='".$permisos." ".$grupo."'></div>";
      }
    }
    userData($login_session, $db);
    
    echo "<nav>
      <div class='nav-user'>
        <div class='app-Name' ><p>Scrum Control App</p></div>
        <div class='usuario-user'><p>Bienvenido, ".$login_session."</p>
        <a href='logout.php'>
          <button><img class='logout' src='img/logout.png'></button>
        </a></div>
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
      <div class="col card hoverable push-s1 s10 push-m2 m8 push-l4 l4 new-proyect-box"></div>
    </div>
  

  </body>
</html>



<!--CONSULTA PROJECTES DEVELOPERS:

  select Nom from Usuarios, Grupos, Proyectos where Usuarios.ID_Grupo = Grupos.ID and Grupos.ID_Proyecto = Proyectos.ID and Grupos.ID = 1;

CONSULTA PROJECTES SCRUM MASTER:

  select Nom from Usuarios, Grupos, Proyectos where Usuarios.ID_Grupo = Grupos.ID and Grupos.ID_Proyecto = Proyectos.ID and Grupos.ID = 1;

CONSULTA PROJECTES PRODUCT OWNER:

  select Nombre_Proyecto from Proyectos where ID_Product_Owner = (select ID from Usuarios where Permisos = 1);
