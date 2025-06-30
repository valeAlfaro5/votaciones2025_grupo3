<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Login - Votaciones 2025</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>Registro de Votantes</h1>
<p>Bienvenido al sistema de votaciones.</p>
<form class = "form-login" method="POST" action="" onsubmit="return validarFormulario()">
    <input type="ID" name="identidad" placeholder="No. de Identidad" maxlength="17" oninput="formatearIdentidad(this)" required><br>
    <input type="text" name = "usuario" placeholder="Usuario" required><br>
    <input type="text" name = "municipio" placeholder="Municipio" required><br>
    <input type="submit" value="Entrar" >
    <br>
    <button type="button" class="admin-btn" onclick="window.location.href='LoginAdmin.php'">Iniciar sesión como admin</button><br><br>
</form>

<?php
    include('Conexion.php');
    session_start(); 

    
      if (file_exists("votacion_cancelada.flag")) {
      echo "<script>
          alert('⚠️ Las votaciones han sido canceladas. No se puede iniciar sesión.');
      </script>";
      exit();
      }



    $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);
    if($Conexion && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $municipio = $_POST['municipio'];
        $identidad =$_POST['identidad'];
        $usuario = $_POST['usuario'];
        $pass= "";
        
        $ConMun = "SELECT municipio_id FROM Municipio WHERE nombre = '$municipio'";
        $Resultado1 = $Conexion->query($ConMun);
        
        if($Resultado1){
          $fila = $Resultado1->fetch_assoc();
          $_SESSION['municipio_id'] = $fila['municipio_id'];

          //validar que no este en la bd
          $Validar = "SELECT * FROM Usuario WHERE identidad = '$identidad'";
          $Resultado3 = $Conexion->query($Validar);

          if($Resultado3){//si esta se redirige a la pagina
            echo "<script>setTimeout(() => window.location.href = 'pantallaPresidente.php', 2000);</script>";
          }else{
            //si no esta se ingresan sus datos 
           $ConUser = "INSERT INTO Usuario (usuario, pass, identidad) VALUES ('$usuario', '$pass', '$identidad')";
            $Resultado2 = $Conexion->query($ConUser);
            if($Resultado2){
                echo "<p>Login Exitoso!</p>";
                echo "<script>setTimeout(() => window.location.href = 'pantallaPresidente.php', 2000);</script>";
            }}
        }
        
    }
?>

 <script>
    function formatearIdentidad(input) {
      let value = input.value.replace(/\D/g, ''); 

      if (value.length > 4) {
        value = value.slice(0, 4) + '-' + value.slice(4);
      }
      if (value.length > 9) {
        value = value.slice(0, 9) + '-' + value.slice(9);
      }
      if (value.length > 15) {
        value = value.slice(0, 15); 
      }

      input.value = value;
    }

   function validarFormulario() {
    const identidadInput = document.querySelector('input[name="identidad"]');
    const usuarioInput = document.querySelector('input[name="usuario"]');
    const municipioInput = document.querySelector('input[name="municipio"]');
    const errorDiv = document.getElementById('error-identidad');

    const identidadLimpia = identidadInput.value.replace(/\D/g, '');

    if (!identidadLimpia || identidadLimpia.length !== 13) {
        errorDiv.textContent = "La identidad debe tener exactamente 13 dígitos.";
        identidadInput.style.border = "1px solid red";
        return false;
    }

    if (usuarioInput.value.trim() === '' || municipioInput.value.trim() === '') {
        errorDiv.textContent = "Debe llenar todos los campos.";
        return false;
    }

    // Todo válido
    errorDiv.textContent = "";
    return true;
   }
  </script>
</body>
</html>