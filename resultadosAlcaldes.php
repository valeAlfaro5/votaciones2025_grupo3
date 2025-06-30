<?php
include('Conexion.php');
$Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

$alcaldes = [];
$ganadores = [];
$votacionesCanceladas = file_exists("votacion_cancelada.flag");

$partidos = ['PLH' => 1, 'PNH' => 2, 'PLR' => 3];

function nombreReducido($nombreCompleto) {
  $partes = preg_split("/\s+/", trim($nombreCompleto));
  return (isset($partes[0]) ? $partes[0] : '') . ' ' . (isset($partes[2]) ? $partes[2] : '');
}

if ($Conexion) {
  foreach ($partidos as $partido => $idPartido) {
    $Consulta = "SELECT nombre, votos FROM Alcalde WHERE partido_id = $idPartido";
    $Resultado = $Conexion->query($Consulta);

    $alcaldes[$partido] = [];

    if ($Resultado && $Resultado->num_rows > 0) {
      while ($fila = $Resultado->fetch_assoc()) {
        $alcaldes[$partido][] = [
          'nombre' => nombreReducido($fila["nombre"]),
          'votos' => (int)$fila["votos"]
        ];
      }

      usort($alcaldes[$partido], function($a, $b) {
        return $b['votos'] - $a['votos'];
      });

      if (!empty($alcaldes[$partido])) {
        $ganadores[$partido] = $alcaldes[$partido][0]['nombre'];
      }
    }
  }
} else {
  echo "Error de conexión";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resultados de Elección de Alcaldes</title>
  <link rel="stylesheet" href="estilos.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>

<body>

<ul class="sidenav">
  <li><a href="resultadosPresidente.php">Presidentes</a></li>
  <li><a href="resultadosAlcaldes.php">Alcaldes</a></li>
  <li><a href="resultadosDiputados.php">Diputados</a></li>
  <li>
    <a href="#general">General ▾</a>
    <div class="subnav-content">
        <a href="AlgoAvestruz.html">Algoritmo del Avestruz</a>
        <a href="AlgoBanqueroSolo.html">Algoritmo del Banquero para un solo Recurso</a>
        <a href="AlgoBanqueroVarios.html">Algoritmo del Banquero para Varios Recursos</a>
        <a href="AlgoFilo.html">Problema de los Filosofos Comelones</a>
        <a href="AlgoLectores.html">Problema de Lectores Escritores</a>
        <a href="AlgoBarberos.html">Problema del Barbero Durmiente</a>
    </div>
  </li>
  <li><a href="manejoVotaciones.php"> Manejo de Votaciones</a></li>
  <li><a href="LoginAdmin.php">Regresar a Inicio</a></li>
</ul>

<div class="content">
  <h1>Resultados de Elección de Alcaldes</h1>
  <p>Gráfico comparativo de candidatos a la alcaldía.</p>

  <div class="tablas">
    <button class="tablink" onclick="openPage('PLH', this, 'red')" id="defaultOpen">Partido Liberal de Honduras</button>
    <button class="tablink" onclick="openPage('PNH', this, 'blue')">Partido Nacional de Honduras</button>
    <button class="tablink" onclick="openPage('PLR', this, 'red')">Partido de Libertad y Refundación</button>

    <div id="PLH" class="tabcontent">
      <h3>Partido Liberal de Honduras</h3>
      <canvas id="chartPLH" width="400px" height="350px" style="max-width: 900px; background-color: #FFE9EF;"></canvas>
      <div id="ganadorPLH" class="ganador"></div>
    </div>

    <div id="PNH" class="tabcontent">
      <h3>Partido Nacional de Honduras</h3>
      <canvas id="chartPNH" width="400px" height="350px" style="max-width: 900px; background-color: #FFE9EF;"></canvas>
      <div id="ganadorPNH" class="ganador"></div>
    </div>

    <div id="PLR" class="tabcontent">
      <h3>Partido de Libertad y Refundación</h3>
      <canvas id="chartPLR" width="400px" height="350px" style="max-width: 900px; background-color: #FFE9EF;"></canvas>
      <div id="ganadorPLR" class="ganador"></div>
    </div>
  </div>
</div>

<script>
  const alcalde = <?php echo json_encode($alcaldes); ?>;
  const ganadores = <?php echo json_encode($ganadores); ?>;
  const votacionesCanceladas = <?php echo $votacionesCanceladas ? 'true' : 'false'; ?>;

  let chartsLoaded = {
    PLH: false,
    PNH: false,
    PLR: false
  };

  function openPage(pageName, elmnt, color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
    }

    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

    if (!chartsLoaded[pageName]) {
      loadChart(pageName);
      chartsLoaded[pageName] = true;
    }
  }

  function loadChart(partido) {
    const datos = alcalde[partido];
    const ctx = document.getElementById('chart' + partido).getContext('2d');
    const xValues = datos.map(d => d.nombre);
    const yValues = datos.map(d => d.votos);
    const barColors = datos.map(() => "#FC809F");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: "Votos por Candidato",
          fontSize: 22
        },
        scales: {
          xAxes: [{
            ticks: { fontSize: 13 },
            autoSkip: false
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true,
              fontSize: 14
            }
          }]
        }
      }
    });

    if (votacionesCanceladas && ganadores[partido]) {
      const ganadorDiv = document.getElementById("ganador" + partido);
      ganadorDiv.innerHTML = `<p style="margin-top: 10px; font-weight: bold; color: green;">🏆 Ganador: ${ganadores[partido]}</p>`;
    }
  }

  document.getElementById("defaultOpen").click();
  document.querySelectorAll('.sidenav > li > a[href="#general"]').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const sub = this.nextElementSibling;
      sub.style.display = sub.style.display === 'block' ? 'none' : 'block';
    });
  });
</script>

</body>
</html>
