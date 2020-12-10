<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $puerto = $_POST["puerto"];

  $query = "SELECT personal.peid, personal.pnombre FROM atraque, puerto, personal WHERE personal.bid = atraque.bid AND atraque.pid = puerto.pid  AND genero = 'mujer' AND es_capitan = 1 AND UPPER(puerto.punombre) LIKE UPPER('$puerto%');";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
