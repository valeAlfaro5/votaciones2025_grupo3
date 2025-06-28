<!DOCTYPE html>
<html lang="es">
<head>
  <title>Elección de Presidente</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div class="presi_page">
    <h1>Presidentes</h1>
    <p>Selecciona un presidente.</p>

    <div>
    <form class = "form"method="POST" action="">
      <table>
        <tr>
          <th>Partido Liberal de Honduras</th>
          <th>Partido Nacional de Honduras</th>
          <th>Partido de Libertad y Refundación</th>
        </tr>
        <tr>
          <td><img src="./imagenes/plh.jpg" alt="PLH" height="100" width="100"></td>
          <td><img src="./imagenes/pnh.png" alt="PNH" height="100" width="100"></td>
          <td><img src="./imagenes/libre.png" alt="Libre" height="100" width="100"></td>
        </tr>
        <tr>
          <th>Salvador Nasralla</th>
          <th>Nasry Asfura</th>
          <th>Rixi Moncada</th>
        </tr>
        <tr>
          <td><img src="./imagenes/nasralla.jpg" alt="Nasralla" height="200" width="200"></td>
          <td><img src="./imagenes/paip_orden.jpg" alt="Asfura" height="200" width="100"></td>
          <td><img src="./imagenes/mocada.jpg" alt="Moncada" height="200" width="100"></td>
        </tr>
        <tr>
          <td><input type="radio" name="presidente" value="1"></td>
          <td><input type="radio" name="presidente" value="2"></td>
          <td><input type="radio" name="presidente" value="3"></td>
        </tr>
      </table>
      <input type="submit" id="btnVotar" value="Votar" disabled><br><br>
    </form>
</div>

    <?php
      include('Conexion.php'); 
      $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

      if ($Conexion) {
        if (isset($_POST['presidente'])) {
          $presidente_id = intval($_POST['presidente']);
          $Consulta = "UPDATE Presidente SET votos = votos + 1 WHERE presidente_id = $presidente_id";
          $Resultado = $Conexion->query($Consulta);

          if ($Resultado) {
            echo "<p>¡Voto registrado con éxito!</p>";
            echo "<script>setTimeout(() => window.location.href = 'pantallaDiputados.html', 2000);</script>";
          } else {
            echo "<p>Error al registrar el voto</p>";
          }
        }
      } else {
        echo "<p>Error al conectar con la base de datos.</p>";
      }
    ?>
  </div>

  <script>
    const radios = document.querySelectorAll('input[type="radio"][name="presidente"]');
    const btnVotar = document.getElementById('btnVotar');

    radios.forEach(radio => {
      radio.addEventListener('change', () => {
        btnVotar.disabled = false;
      });
    });
  </script>
</body>
</html>
