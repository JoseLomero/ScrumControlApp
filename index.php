<?php
include("config.php");
session_start();
$error=Null;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = mysqli_real_escape_string($db,$_POST['user']);
  $password = mysqli_real_escape_string($db,$_POST['password']);

  $sql = "SELECT Nom FROM Usuarios WHERE Nom='".$username."';";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  //$active = $row['active'];
  $count = mysqli_num_rows($result);
  //Si el resultado concuerda en la base de datos solo puede devolber 1 row
  if($count ==1){
    $sql = "SELECT * FROM Usuarios WHERE Nom='".$username."' AND Pasword=SHA2('".$password."',512);";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];
    $count = mysqli_num_rows($result);
    //Si el resultado concuerda en la base de datos solo puede devolber 1 row
    if($count ==1){
     $_SESSION['login_user'] = $username;
      header("location:proyectos.php");
    }else{
      $error = "Contraseña incorrecta";
    }
  }else{
    $error = "El usuario no existe";
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
        echo "<form action='' method='post'>";
            echo "User name: <input type='text' name='user' value='' placeholder='username'><br>";
            echo "Password: <input type='password' name='password' value='' placeholder='password'><br>";
            echo "<input type='submit' name='submit'>";
        echo "</form>";

        if($error!=Null){
          echo "<div>$error</div>";
        }
    ?>
    </body>
</html>
