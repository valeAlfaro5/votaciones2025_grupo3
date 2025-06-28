<!DOCTYPE html>
<html lang="es" >
<head>
   <title >Elección de Alcalde</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div class="Alcalde_page">
    <h1 >Alcaldes</h1>
    <p>Estos >son los candidatos de alcaldia de tu municipio en Choluteca.</p>
    <p>Selecciona un alcalde.</p>

    <div class="tablas">
    <button class="tablink" onclick="openPage('PLH', this, 'red')" id="defaultOpen">Partido Liberal de Honduras</button>
    <button class="tablink" onclick="openPage('PNH', this, 'blue')">Partido Nacional de Honduras</button>
    <button class="tablink" onclick="openPage('PLR', this, 'red')">Partido de Libertad y Refundación</button>

    <div id="PLH" class="tabcontent">
      <h3>Partido Liberal de Honduras</h3>
      <table>
        <tr>
       <th>Nombre</th>
       <?php
       include('Conexion.php')
       $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

            if($Conexion){

                $Consulta = "select * from Alcalde where partido_id =1;";
                $Resultado = $Conexion->query($Consulta);
                
                while($Fila = $Resultado->fetch_assoc()){
                    $Cuenta = $Fila["Nombre"];
                    echo "<td>".$Nombre."</td>";
                }
       ?>
        </tr>
        <tr>
         <th>Municipio</th> 
          <?php
            include('Conexion.php')
            $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

                  if($Conexion){
                      echo "<h2>Conexión Exitosa!!!</h2>";

                      $Consulta = "select * from Municipio;";
                      $Resultado = $Conexion->query($Consulta);
                      
                      while($Fila = $Resultado->fetch_assoc()){
                          $Cuenta = $Fila["Municipio"];
                          echo "<td>".$Municipio."</td>";
                      }
                  }
            ?>
        </tr>
      </table>
    </div>

    <div id="PNH" class="tabcontent">
      <h3>Partido Nacional de Honduras</h3>
      <table>
        <tr>
       <th>Nombre</th>
       <?php
       include('Conexion.php')
       $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

            if($Conexion){
                // echo "<h2>Conexión Exitosa!!!</h2>";

                $Consulta = "select * from Alcalde where partido_id =2;";
                $Resultado = $Conexion->query($Consulta);
                
                while($Fila = $Resultado->fetch_assoc()){
                    $Cuenta = $Fila["Nombre"];
                    echo "<td>".$Nombre."</td>";
                }
       ?>
        </tr>
        <tr>
         <th>Municipio</th> 
          <?php
            include('Conexion.php')
            $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

                  if($Conexion){
                      echo "<h2>Conexión Exitosa!!!</h2>";

                      $Consulta = "select * from Municipio;";
                      $Resultado = $Conexion->query($Consulta);
                      
                      while($Fila = $Resultado->fetch_assoc()){
                          $Cuenta = $Fila["Municipio"];
                          echo "<td>".$Municipio."</td>";
                      }
                  }
            ?>
        </tr>
    </div>

    <div id="PLR" class="tabcontent">
      <h3>Partido de Libertad y Refundación</h3>
      <table>
        <tr>
       <th>Nombre</th>
       <?php
       include('Conexion.php')
       $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

            if($Conexion){
                // echo "<h2>Conexión Exitosa!!!</h2>";

                $Consulta = "select * from Alcalde where partido_id =3;";
                $Resultado = $Conexion->query($Consulta);
                
                while($Fila = $Resultado->fetch_assoc()){
                    $Cuenta = $Fila["Nombre"];
                    echo "<td>".$Nombre."</td>";
                }
       ?>
        </tr>
        <tr>
         <th>Municipio</th> 
          <?php
            include('Conexion.php')
            $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

                  if($Conexion){
                      echo "<h2>Conexión Exitosa!!!</h2>";

                      $Consulta = "select * from Municipio;";
                      $Resultado = $Conexion->query($Consulta);
                      
                      while($Fila = $Resultado->fetch_assoc()){
                          $Cuenta = $Fila["Municipio"];
                          echo "<td>".$Municipio."</td>";
                      }
                  }
            ?>
        </tr>
    </div>
    <div>
          <input type="submit" id="btnVotar" value="Votar" onclick="window.location.href='pantallaDiputados.html'; " disabled>
          <br>
        </div>
  </div>
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