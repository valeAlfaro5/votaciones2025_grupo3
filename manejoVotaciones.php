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
    <h1>Manejo de Votaciones</h1>
    <p>En este espacio puedes terminar o reactivar las votaciones.</p>

    <form method="POST">
      <button type="submit" name="accion" value="terminar">Terminar Votaciones</button>
      <button type="submit" name="accion" value="reactivar">Reiniciar Votaciones</button>
    </form>

    <?php
    // Procesamiento de acciones
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        if ($accion === 'terminar') {
            file_put_contents('votacion_cancelada.flag', 'CANCELADO');
            echo "<p style='color:red;'>⚠️ Las votaciones han sido terminadas.</p>";
        }

        if ($accion === 'reactivar') {
    if (file_exists('votacion_cancelada.flag')) {
        unlink('votacion_cancelada.flag');

        include('Conexion.php');
        $Conexion = mysqli_connect($Servidor, $Usuario, $Clave, $BD);

        if ($Conexion) {
            $Consulta1 = "UPDATE Presidente SET votos = 0";
            $Consulta2 = "UPDATE Diputado SET votos = 0";
            $Consulta3 = "UPDATE Alcalde SET votos = 0";

            $ok1 = mysqli_query($Conexion, $Consulta1);
            $ok2 = mysqli_query($Conexion, $Consulta2);
            $ok3 = mysqli_query($Conexion, $Consulta3);

            if ($ok1 && $ok2 && $ok3) {
                echo "<p style='color:green;'>✅ Las votaciones han sido reactivadas y los votos reiniciados en todas las tablas.</p>";
            } else {
                echo "<p style='color:red;'>❌ Error al reiniciar los votos. Verifica las tablas.</p>";
              }

              mysqli_close($Conexion);
          } else {
              echo "<p style='color:red;'>❌ Error de conexión a la base de datos.</p>";
          }
      } else {
          echo "<p style='color:orange;'>ℹ️ Las votaciones ya estaban activas.</p>";
      }
  }

    }

    // Mostrar estado actual
    if (file_exists('votacion_cancelada.flag')) {
        echo "<p style='color:red;'>🛑 Estado actual: Votaciones TERMINADAS</p>";
    } else {
        echo "<p style='color:green;'>🟢 Estado actual: Votaciones ACTIVAS</p>";
    }
    ?>
  </div>
</body>
</html>
