<?php
  include('Conexion.php');
  $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);
  $votos = [];
  $candidatos = ["Salvador Nasralla", "Nasry Asfura", "Rixi Moncada"];
  $votacionesCanceladas = file_exists("votacion_cancelada.flag");
  $ganador = null;

  if ($Conexion) {
    $Consulta = "SELECT votos FROM Presidente";
    $Resultado = $Conexion->query($Consulta);

    if ($Resultado && $Resultado->num_rows > 0) {
      while ($fila = $Resultado->fetch_assoc()) {
        $votos[] = (int)$fila["votos"];
      }

      if ($votacionesCanceladas && count($votos) === count($candidatos)) {
        $maxVotos = max($votos);
        $indiceGanador = array_search($maxVotos, $votos);
        $ganador = $candidatos[$indiceGanador];
      }
    }
  } else {
    echo "Error de Conexion";
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resultados de Elección de Presidente</title>
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
        <a href="AlgoBanqueroSolo.html">Algoritmo del Banquero para un solo Recursos</a>
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
  <h1>Resultados de Elección de Presidente</h1>
  <p>Gráfico comparativo de candidatos a la presidencia.</p>
  <canvas id="myChart" width="600px" height="500px" style="max-width: 1500px; background-color: #FFE9EF;"></canvas>

  <?php if ($votacionesCanceladas && $ganador !== null): ?>
    <div style="margin-top: 20px; font-size: 1.5em; font-weight: bold; color: green;">
      🏆 Ganador: <?= htmlspecialchars($ganador) ?>
    </div>
  <?php endif; ?>
</div>

<script>
  var xValues = <?= json_encode($candidatos) ?>;
  var yValues = <?= json_encode($votos) ?>;
  var barColors = ["#FC809F", "#FC809F", "#FC809F"];

  new Chart("myChart", {
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
        fontSize: 23
      },
      scales: {
        xAxes: [{
          ticks: {
            fontSize: 18
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            fontSize: 18
          }
        }]
      }
    }
  });
</script>

<script>
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
