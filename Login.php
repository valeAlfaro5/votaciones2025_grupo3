<!DOCTYPE html>
<html>
<head>
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
    <button type="button" class="admin-btn" onclick="window.location.href='LoginAdmin.html'">Iniciar sesión como admin</button>
</form>

<?php
    include('Conexion.php');
    $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);
    
    if($Conexion){
        $municipio = $_POST['municipio'];
        $identidad =$_POST['identidad'];
        $usuario = $_POST['usuario'];

        if(isset($_POST['municipio']) && isset($_POST['usuario'])){
            $ConMun = "SELECT * FROM Municipio WHERE nombre = $municipio";
            $Resultado1->query($ConMun);
            
            if($Resultado1){
                $ConUser = "INSERT INTO Usuario (usuario, password, identidad) VALUES ('$usuario', '', '$identidad')";
                $Resultado2->query($ConUser);
                if($Resultado2){
                    echo "Login Exitoso!";
                }
            }
        }
        
    }else{
        echo "Error de conexion!!";
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
    session_start();
    $_SESSION['municipio'] = $_POST['municipio'];
    return true;
   }
  </script>
</body>
</html>