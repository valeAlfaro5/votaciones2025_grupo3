<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8" />
    <title>Login Admin - Votaciones 2025</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>Acceso Administrador</h1>
<p>Ingrese sus credenciales de administrador.</p>
<form class="form-login" method="POST" action="" >
    <input type="text" name="usuario" placeholder="Usuario Admin" required><br>
    <input type="password" name="pass" placeholder="Contraseña" required><br>
    <input type="submit" value="Entrar ">
    <br>
    <button type="button" class="volver-btn" onclick="window.location.href='Login.php'">Volver</button>
</form>

<?php
    include('Conexion.php');
    $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

    if ($Conexion && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = mysqli_real_escape_string($Conexion, $_POST['usuario']);
        $pass = mysqli_real_escape_string($Conexion, $_POST['pass']);

        $Consulta = "SELECT * FROM Usuario WHERE usuario = '$usuario' AND pass = '$pass'";
        $Resultado = $Conexion->query($Consulta);

        if ($Resultado) {
            echo "<script>setTimeout(() => window.location.href = 'resultadosPresidente.php', 1000);</script>";
        } else {
            echo "<p style='color:red;'>Usuario o contraseña incorrectos.</p>";
        }
    }
?>

</body>
</html>