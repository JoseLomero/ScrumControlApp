<?php
include 'template/header.php';
echo '<script type="text/javascript" src="js/paginas/proyectos.js"></script>';
print_r($_POST);
if ($_POST) {
  createProject($db, $_POST);
}

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

function retrieveProductOwner($conexion) {
  $consulta_datos = "SELECT Usuarios.ID, Usuarios.Nom FROM Usuarios WHERE Usuarios.Permisos = 1;";
  $resultado = mysqli_query($conexion, $consulta_datos);
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

function createProject($conexion, $data) {
  // Insertar proyecto
  $insertar_datos = "INSERT INTO proyectos (Nombre_Proyecto, Descripcion, Numero_Sprint, ID_Scrum_Master, ID_Product_Owner) VALUES (
    '" .mysqli_real_escape_string($conexion, $data['nom']) . "',
    '" .mysqli_real_escape_string($conexion, $data['descr']) . "',
    '" .mysqli_real_escape_string($conexion, $data['scrumMaster']) . "',
    '" .mysqli_real_escape_string($conexion, $data['productOwner']) . "',
    '" .mysqli_real_escape_string($conexion, $data['developers']) . "'
    );";
  $resultado = mysqli_query($conexion, $insertar_datos);

print_r($insertar_datos .  $resultado);
  // Atualizar grupo

}

function retrieveDeveloperTeam($conexion) {
  $consulta_datos = "SELECT Grupos.Nombre_Grupo, Grupos.ID FROM Grupos WHERE Grupos.ID_Proyecto is NULL;";
  $resultado = mysqli_query($conexion, $consulta_datos);
  global $nombres;

  echo "<script>
  var nombresGD = [];";

  while ($registre = mysqli_fetch_assoc($resultado)) {
    echo "nombresGD.push({ ",
      "name: '",$registre['Nombre_Grupo'],"',",
      "id: '".$registre['ID']."'",
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
<?php
include 'template/footer.php';