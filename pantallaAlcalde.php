<?php
session_start();
include('Conexion.php');

function nombreReducido($nombreCompleto) {
    $partes = preg_split("/\s+/", trim($nombreCompleto));
    return (isset($partes[0]) ? $partes[0] : '') . (isset($partes[2]) ? '_' . $partes[2] : '');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
   <title>Elección de Alcalde</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div class="Alcalde_page">
    <h1>Alcaldes</h1>
    <p>Estos son los candidatos de alcaldía de tu municipio en Choluteca.</p>
    <p>Selecciona un alcalde.</p>

    <form method="POST" action="">

    <div class="tablas">
      <div id="PLH" class="tabcontent">
        <table>
          <th colspan="10">Partido Liberal de Honduras</th>
          <tr>
            <td rowspan="2"><img src="./imagenes/plh.jpg" height="100" width="100"></td>
            
            <?php
            $municipio_usuario = isset($_SESSION['municipio_id']) ? $_SESSION['municipio_id'] : 0;
            $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);
            if ($Conexion) {
              $Consulta = "SELECT * FROM Alcalde WHERE partido_id = 1 AND municipio_id = $municipio_usuario;";
              $Resultado = $Conexion->query($Consulta);
              // Fotos
              while ($fila = $Resultado->fetch_assoc()) {
                $nombreCompleto = $fila["nombre"];
                $nombre = nombreReducido($nombreCompleto);
                $foto = "imagenes/alcaldes/plh/" . $nombre . ".jpg";
                echo "<td><img src='$foto' height='100' width='100'></td>";
              }
              $Resultado->data_seek(0);
              echo "</tr><tr>";
              // Nombres + radios
              while ($fila = $Resultado->fetch_assoc()) {
                $nombre = $fila["nombre"];
                echo "<td>{$nombre}<br><input type='radio' name='alcalde' value='{$fila['alcalde_id']}'></td>";
              }
              echo "</tr>";
            }
            ?>
        </table>
      </div>

      <div id="PNH" class="tabcontent">
        <table>
          <th colspan="10">Partido Nacional de Honduras</th>
          <tr>
            <td rowspan="2"><img src="./imagenes/pnh.png" height="100" width="100"></td>
            <?php
            if ($Conexion) {
              $Consulta = "SELECT * FROM Alcalde WHERE partido_id = 2 AND municipio_id = $municipio_usuario;";
              $Resultado = $Conexion->query($Consulta);
              while ($fila = $Resultado->fetch_assoc()) {
                $nombreCompleto = $fila["nombre"];
                $nombre = nombreReducido($nombreCompleto);
                $foto = "imagenes/alcaldes/pnh/" . $nombre . ".jpg";
                echo "<td><img src='$foto' height='100' width='100'></td>";
              }
              $Resultado->data_seek(0);
              echo "</tr><tr>";
              while ($fila = $Resultado->fetch_assoc()) {
                $nombre = $fila["nombre"];
                echo "<td>{$nombre}<br><input type='radio' name='alcalde' value='{$fila['alcalde_id']}'></td>";
              }
              echo "</tr>";
            }
            ?>
        </table>
      </div>

      <div id="PLR" class="tabcontent">
        <table>
          <th colspan="10">Partido Libre y Refundación</th>
          <tr>
            <td rowspan="2"><img src="./imagenes/libre.png" height="100" width="100"></td>
            <?php
            if ($Conexion) {
              $Consulta = "SELECT * FROM Alcalde WHERE partido_id = 3 AND municipio_id = $municipio_usuario;";
              $Resultado = $Conexion->query($Consulta);
              while ($fila = $Resultado->fetch_assoc()) {
                $nombreCompleto = $fila["nombre"];
                $nombre = nombreReducido($nombreCompleto);
                $rutaRelativa = "imagenes/alcaldes/plh/" . $nombre . ".jpg";
                $rutaServidor = __DIR__ . '/' . $rutaRelativa; 
                

                if (!file_exists($rutaServidor)) {
                    $rutaRelativa = "imagenes/anonimo.webp"; 
                }

                echo "<td><img src='$rutaRelativa' height='100' width='100'></td>";
              }
              $Resultado->data_seek(0);
              echo "</tr><tr>";
              while ($fila = $Resultado->fetch_assoc()) {
                $nombre = $fila["nombre"];
                echo "<td>{$nombre}<br><input type='radio' name='alcalde' value='{$fila['alcalde_id']}'></td>";
              }
              echo "</tr>";
            }
            ?>
        </table>
      </div>

      <div>
        <input type="submit" id="btnVotar" value="Votar" disabled><br>
      </div>

    </div>

    
    </form>

    <?php
      if ($Conexion) {
        if (isset($_POST['alcalde'])) {
          $alcalde_id = intval($_POST['alcalde']);
          $Consulta = "UPDATE Alcalde SET votos = votos + 1 WHERE alcalde_id = $alcalde_id";
          $Resultado = $Conexion->query($Consulta);

          if ($Resultado) {
            echo "<p>¡Voto registrado con éxito!</p>";
            echo "<script>setTimeout(() => window.location.href = 'mensajeFinal.html', 1000);</script>";
          } else {
            echo "<p>Error al registrar el voto</p>";
          }
        }
      } else {
        echo "<p>Error al conectar con la base de datos.</p>";
      }
    ?>


    <script>
      const radios = document.querySelectorAll('input[type="radio"][name="alcalde"]');
      const btnVotar = document.getElementById('btnVotar');
      radios.forEach(radio => {
        radio.addEventListener('change', () => {
          btnVotar.disabled = false;
        });
      });
    </script>

  </div>
</body>
</html>
