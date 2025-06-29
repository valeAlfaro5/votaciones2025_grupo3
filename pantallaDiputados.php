<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
   <title >Elección de Diputados</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div class="diputados_page">
    <h1 >Diputados</h1>
    <p>Selecciona 9 diputados. No avanzaras hasta que escogas los 9 diputados.</p>

    <div>
    <form class = "form" method="POST" action="">
    <table>
      <th colspan="10">Partido Liberal de Honduras</th>
      <tr  >
        <td rowspan="2"><img src="./imagenes/plh.jpg" alt="Salvador Nasralla" height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plh/david-carranza.jpg" height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plh/geri-galeas.jpg" height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plh/glenda-galo.jpg" height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plh/juan-guillen.jpg"  height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plh/manuel-barahona.jpg"  height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plh/menfis-valladares.jpg"  height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plh/ramon-benitez.jpg"  height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plh/sra-guzman.jpg" height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plh/suany-amador.jpg" height = "100"width="100"></td>
      </tr>
      <tr>
        <td> <label for="4">David Carranza</label> <input type="checkbox" id="4" name="diputados[]" value="4"> </td>
        <td> <label for="2">Geri Galeas </label> <input type="checkbox" id="2" name="diputados[]" value="2"> </td>
        <td> <label for="9">Glenda Galo</label> <input type="checkbox" id="9" name="diputados[]"value="9"> </td>
        <td> <label for="3">Juan Guillen</label> <input type="checkbox" id="3" name="diputados[]"value="3"> </td>
        <td> <label for="7">Manuel Barahona</label> <input type="checkbox" id="7" name="diputados[]"value="7"> </td>
        <td> <label for="5">Menffis Valladares</label> <input type="checkbox" id="5" name="diputados[]"value="5"> </td>
        <td> <label for="1">Ramon Benitez</label> <input type="checkbox" id="1" name="diputados[]"value="1"> </td>
        <td> <label for="6">Sara Guzman</label> <input type="checkbox" id="6" name="diputados[]"value="6"> </td>
        <td> <label for="8">Suany Amador</label> <input type="checkbox" id="8" name="diputados[]"value="8"> </td>
      </tr>
   
    </table>

    <table>
        <th colspan="10">Partido Nacional de Honduras</th>
        <tr  >
           <td rowspan="2"><img src="./imagenes/pnh.png"  height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/pnh/alex-ventura.jpg" height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/pnh/edas-montoya.jpg"   height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/pnh/freddy-espinoza.jpg"   height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/pnh/ignacio-moreno.jpg"   height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/pnh/ilsy-gomez.jpg"   height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/pnh/jose-paguada.jpg"   height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/pnh/juan-carmona.jpg"   height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/pnh/nidia-rodriguez.jpg"   height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/pnh/roy-sanchez.jpg"   height = "100"width="100"></td>
      </tr>
      <tr>
      
        <td><label for="14">Alex Ventura</label> <input type="checkbox" id="14" name="diputados[]" value="14"></td>
        <td><label for="10">Edas Montoya</label> <input type="checkbox" id="10" name="diputados[]" value="10"></td>
        <td><label for="15">Freddy Espinoza</label> <input type="checkbox" id="15" name="diputados[]" value="15"></td>
        <td><label for="18">Ignacio Moreno</label> <input type="checkbox" id="18" name="diputados[]" value="18"></td>
        <td><label for="13">Isly Gomez</label> <input type="checkbox" id="13" name="diputados[]" value="13"></td>
        <td><label for="12">Jose Paguada</label> <input type="checkbox" id="12" name="diputados[]" value="12"></td>
        <td><label for="11">Juan Carmona</label> <input type="checkbox" id="11" name="diputados[]" value="11"></td>
        <td><label for="16">Nidia Rodriguez</label> <input type="checkbox" id="16" name="diputados[]" value="16"></td>
        <td><label for="17">Roy Sanchez</label> <input type="checkbox" id="17" name="diputados[]" value="17"></td>
      </tr>

    </table>

    <table>
      <th colspan="10">Partido Libre y Refundación</th>
        <tr >
        <td rowspan="2"><img src="./imagenes/libre.png" height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plr/glenda-coello.jpg"   height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plr/javier-pastrana.jpg"    height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plr/jose-mendoza.jpg"    height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plr/manuel-robert.jpg"    height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plr/margot-lezama.jpg"    height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plr/nelver-nunez.jpg"    height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plr/oscar-espinal.jpg"    height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plr/wendy-mendez.jpg"    height = "100"width="100"></td>
        <td ><img src="./imagenes/diputados/plr/wilfredo-flores.jpg"    height = "100"width="100"></td>
      </tr>
      <tr>
        <td><label for="24">Glenda Coello</label> <input type="checkbox" id="24" name="diputados[]" value="24"></td>
        <td><label for="22">Javier Pastrana</label> <input type="checkbox" id="22" name="diputados[]" value="22"></td>
        <td><label for="21">Jose Mendoza</label> <input type="checkbox" id="21" name="diputados[]" value="21"></td>
        <td><label for="19">Manuel Robert</label> <input type="checkbox" id="19" name="diputados[]" value="19"></td>
        <td><label for="20">Margot Lezama</label> <input type="checkbox" id="20" name="diputados[]" value="20"></td>
        <td><label for="26">Nelver Nuñez</label> <input type="checkbox" id="26" name="diputados[]" value="26"></td>
        <td><label for="25">Oscar Espinal</label> <input type="checkbox" id="25" name="diputados[]" value="25"></td>
        <td><label for="27">Wendy Mendez</label> <input type="checkbox" id="27" name="diputados[]" value="27"></td>
        <td><label for="23">Wilfredo Flores</label> <input type="checkbox" id="23" name="diputados[]" value="23"></td>
      </tr>
      </table>

    <div>
      <input type="submit" id="btnVotar" value="Votar" disabled><br><br>
    </div>

  </form>
  </div>
</div>

<?php
    include('Conexion.php'); 
    $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

    if ($Conexion && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $diputados = $_POST['diputados'];
            
            if (count($diputados) === 9) { 
                $fallo = false;
                foreach ($diputados as $diputado_id) {
                    $diputado_id = intval($diputado_id);
                    $Consulta = "UPDATE Diputado SET votos = votos + 1 WHERE diputado_id = '$diputado_id'";
                    $Resultado = $Conexion->query($Consulta);
                    if (!$Resultado) {
                        $fallo = true;
                        break;
                    }
                }

                if (!$fallo) {
                    echo "<p>¡Votos registrados con éxito!</p>";
                    echo "<script>setTimeout(() => window.location.href = 'pantallaAlcalde.php', 2000);</script>";
                } else {
                    echo "<p>Error al registrar los votos.</p>";
                }
            } else {
                echo "<p>Debe seleccionar exactamente 9 diputados.</p>";
            }
    } else {
        echo "<p>Error al conectar con la base de datos.</p>";
    }
    ?>



<script>
   document.addEventListener("DOMContentLoaded", () => {
  const checkboxes = document.querySelectorAll('input[type="checkbox"][name="diputados[]"]');
  const btnVotar = document.getElementById('btnVotar');

  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', () => {
      const seleccionados = document.querySelectorAll('input[type="checkbox"][name="diputados[]"]:checked');

      console.log("Seleccionados:", seleccionados.length); // Para debug

      if (seleccionados.length > 9) {
        checkbox.checked = false;
        alert("Solo puedes seleccionar 9 diputados.");
        return;
      }

      btnVotar.disabled = (seleccionados.length !== 9);
      console.log("Botón habilitado:", !btnVotar.disabled);
    });
  });
});

</script>



</body>     
</html>