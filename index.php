<?php
include("config.php")
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = mysqli_real_escape_string($db,$_POST['user']);
  $password = mysqli_real_escape_string($db,$_POST['password']);

  $sql = "SELECT * FROM Usuarios WHERE Nom='".$user."' AND Pasword=SHA2('".$password."',512);";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];
  $count = mysqli_num_rows($result);

  //Si el resultado concuerda en la base de datos solo puede devolber 1 row

  if($count ==1){
    session_regiester("myusername");
    $_SESSION['login_user'] = $username;
    header("location:proyectos.php");
  }else{
    $error = "Valores del login erroneos";
  }

}
?>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
    </head>

    <body>
    <?php
        echo "<h3>LOG IN</h3>";
        echo "<form action='proyectos.php' method='post'>";
            echo "User name: <input type='text' name='user' value='' placeholder='username'><br>";
            echo "Password: <input type='password' name='password' value='' placeholder='password'><br>";
            echo "<input type='submit' name='submit'>";
        echo "</form>";
        if ($_POST != null) {
            # Conexión a la bdd
            $conn = mysqli_connect('localhost','boss','1234');
            mysqli_select_db($conn, 'ScrumControlBD');

            $user = $_POST['user'];
            $password = $_POST['password'];

            $consulta = "SELECT * FROM Usuarios WHERE Nom='".$user."' AND Pasword=SHA2('".$password."',512);";
            echo "$consulta<br>";

            $resultat = mysqli_query($conn, $consulta);
            if (!$resultat) {
                $message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
                $message .= 'Consulta realitzada: ' . $consulta;
                die($message);
            }
        }
    ?>
    </body>
</html>
