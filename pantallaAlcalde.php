<!DOCTYPE html>
<html lang="es" >
<head>
   <title >Elección de Alcalde</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div class="Alcalde_page">
    <h1 >Alcaldes</h1>
    <p>Estos son los candidatos de alcaldia de tu municipio en Choluteca.</p>
    <p>Selecciona un alcalde.</p>

    <div class="tablas">

    <div id="PLH" class="tabcontent">
      <table>
        <th colspan="10">Partido Liberal de Honduras</th>
        <tr>
           <td rowspan="2"><img src="./imagenes/plh.jpg" alt="Salvador Nasralla" height = "100"width="100"></td>
       <?php
       include('Conexion.php');
       session_start();
      $municipio_usuario = isset($_SESSION['municipio']) ? $_SESSION['municipio'] : '';
       $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

            if($Conexion){

                $Consulta = "select * from Alcalde where partido_id =1 and Municipio = '$municipio_usuario';";
                $Resultado = $Conexion->query($Consulta);
                while ($Fila = $Resultado->fetch_assoc()) {
                  $nombre = $Fila["Nombre"];
                  $foto ="imagenes/alcaldes/plh" . $nombre . ".jpg";;
                  echo "<td><img src='$foto' height='100' width='100'></td>";
                  }
                $Resultado->data_seek(0);
                echo "<tr>";
                while($Fila = $Resultado->fetch_assoc()){
                    $Cuenta = $Fila["Nombre"];
                    echo "<td>".$Nombre."</td>";
                    echo "<input type='radio' name='alcalde' value='$Fila[alcalde_id]'>";
                }
                echo "</tr>";
            } 
       ?>
        </tr>

      </table>
    </div>

    <div id="PNH" class="tabcontent">
      <table>
        <th colspan="10">Partido Nacional de Honduras</th>
        <tr>
           <td rowspan="2"><img src="./imagenes/pnh.png"  height = "100"width="100"></td>
       <?php
       include('Conexion.php');
        session_start();
      $municipio_usuario = isset($_SESSION['municipio']) ? $_SESSION['municipio'] : '';
       $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

            if($Conexion){
                // echo "<h2>Conexión Exitosa!!!</h2>";

                $Consulta = "select * from Alcalde where partido_id =2  and Municipio = '$municipio_usuario';";
                $Resultado = $Conexion->query($Consulta);
                
                while ($Fila = $Resultado->fetch_assoc()) {
                  $nombre = $Fila["Nombre"];
                  $foto ="imagenes/alcaldes/plh" . $nombre . ".jpg";;
                  echo "<td><img src='$foto' height='100' width='100'></td>";
                  }
                $Resultado->data_seek(0);
                echo "<tr>";
                while($Fila = $Resultado->fetch_assoc()){
                    $Cuenta = $Fila["Nombre"];
                    echo "<td>".$Nombre."</td>";
                    echo "<input type='radio' name='alcalde' value='$Fila[alcalde_id]'>";
                }
                echo "</tr>";
            } 
            
       ?>
        </tr>
      </table>
    </div>

    <div id="PLR" class="tabcontent">
      <table>
        <th colspan="10">Partido Libre y Refundación</th>
        <tr >
        <td rowspan="2"><img src="./imagenes/libre.png" height = "100"width="100"></td>
       <?php
       include('Conexion.php');
        session_start();
      $municipio_usuario = isset($_SESSION['municipio']) ? $_SESSION['municipio'] : '';
       $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

            if($Conexion){
                // echo "<h2>Conexión Exitosa!!!</h2>";

                $Consulta = "select * from Alcalde where partido_id =3 and Municipio = '$municipio_usuario';";
                $Resultado = $Conexion->query($Consulta);
                
                while ($Fila = $Resultado->fetch_assoc()) {
                  $nombre = $Fila["Nombre"];
                  $foto ="imagenes/alcaldes/plh" . $nombre . ".jpg";;
                  echo "<td><img src='$foto' height='100' width='100'></td>";
                  }
                $Resultado->data_seek(0);
                echo "<tr>";
                while($Fila = $Resultado->fetch_assoc()){
                    $Cuenta = $Fila["Nombre"];
                    echo "<td>".$Nombre."</td>";
                    echo "<input type='radio' name='alcalde' value='$Fila[alcalde_id]'>";
                }
                echo "</tr>";
            } 
       ?>
        </tr>
      </table>
    </div>
    <div>
          <input type="submit" id="btnVotar" value="Votar" onclick="window.location.href='pantallaDiputados.html'; " disabled>
          <br>
        </div>
  </div>
</div>

<script>
   
    const radios = document.querySelectorAll('input[type="radio"][name="alcalde"]');
    const btnVotar = document.getElementById('btnVotar');
    radios.forEach(radio => {
      radio.addEventListener('change', () => {
        btnVotar.disabled = false;
      });
    });
  </script>

</body>     
</html>