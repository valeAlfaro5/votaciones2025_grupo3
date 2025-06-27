<!DOCTYPE html>
<html lang="es" >
<head>
   <title >Elección de Presidente</title>
  <link rel="stylesheet" href="estilos.css">
</head>

<body>
  <div class="presi_page">
    <h1 >Presidentes</h1>
    <p>Selecciona un presidente.</p>
    <table>
      <tr> 
        <th>Partido Liberal de Honduras</th>
        <th>Partido Nacional de Honduras</th>
        <th>Partido de Libertad y Refundación</th>
      </tr>
      <tr>
        <td ><img src="./imagenes/plh.jpg" alt="Salvador Nasralla" height = "150"width="200"></td>
        <td ><img src="./imagenes/pnh.png" alt="Salvador Nasralla" height = "150"width="200"></td>
        <td ><img src="./imagenes/libre.png" alt="Salvador Nasralla" height = "150"width="200"></td>
      </tr>
      <tr>
      <th >Salvador Nasralla</th>
      <th > Nasry Asfura </th>
      <th > Rixi Moncada </th>
      </tr>
      <tr>
      <td ><img src="./imagenes/nasralla.jpg" alt="Salvador Nasralla" height = "300"width="200"></td>
      <td ><img src="./imagenes/paip_orden.jpg" alt="Nasry Asfura" height ="300"width="200"></td>
      <td ><img src="./imagenes/mocada.jpg" alt="Rixi Moncada" height = "300"width="200"></td>
      </tr>
      <tr>
        <td ><input type="radio" name="presidente" id="nasralla" value ="1"></td>
        <td ><input type="radio" name="presidente" id="asfura"  value="2"></td>
        <td ><input type="radio" name="presidente" id="moncada" value="3"></td>
      </tr>
      
    </table>  
    <div>
      <input type="submit" id="btnVotar" value="Votar" onclick="window.location.href='pantallaDiputados.html'; " disabled>
      <br>
    </div>
     <?php
       include('Conexion.php');
       $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

        if($Conexion){
            if (isset($_POST['presidente'])) {
              $presidente_id = intval($_POST['presidente']); 
              $Consulta = "update Presidente set votos = votos + 1 where presidente_id = $presidente_id ";
              $Resultado = $Conexion->query($Consulta);

              if ($Resultado) {
                  echo "¡Voto registrado exitosamente!";
              } else {
                  echo "Error al registrar el voto.";
              }
            }
        }
       ?>

  </br>
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