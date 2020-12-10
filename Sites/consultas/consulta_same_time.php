<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $puerto = $_POST["puerto"];
  $buque = $_POST["buque"];
  
  $query = "SELECT tabla.bid, tabla.bnombre FROM (SELECT buque.bid, bnombre, ingreso, salida, punombre FROM buque, atraque, puerto WHERE buque.bid = atraque.bid AND  atraque.pid = puerto.pid AND UPPER(puerto.punombre) LIKE UPPER('$puerto%') AND ) AS tabla,(SELECT buque.bid, bnombre, ingreso, salida, punombre FROM buque, atraque, puerto WHERE buque.bid = atraque.bid AND  atraque.pid = puerto.pid AND UPPER(puerto.punombre) LIKE UPPER('$puerto%')) AS tablita WHERE (tabla.ingreso, tabla.salida) OVERLAPS (tablita.ingreso, tablita.salida) and UPPER(tablita.bnombre) LIKE UPPER('$buque%');";
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
