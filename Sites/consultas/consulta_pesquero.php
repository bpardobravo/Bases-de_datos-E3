<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

//   $puerto = $_POST["puerto"];
//   $buque = $_POST["buque"]

  $query = "SELECT bnombre, COUNT(*) AS contador FROM buque, personal WHERE buque.bid = personal.bid AND buque.tipo = 'pesquero' GROUP BY bnombre HAVING COUNT(*) = (SELECT MAX(count) FROM (SELECT bnombre, COUNT(*) FROM buque, personal WHERE buque.bid = personal.bid AND buque.tipo = 'pesquero' GROUP BY bnombre) AS tabla);";
  $result = $db -> prepare($query);
  $result -> execute();
  $buque = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>Nombre</th>
      <th>Nro de personas</th>
      
    </tr>
  <?php
  foreach ($buque as $b) {
    echo "<tr> <td>$b[0]</td> <td>$b[1]</td>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
