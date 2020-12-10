<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $puerto = $_POST["puerto"];
  $año = $_POST["año"];
  $año_prox = intval($año) + 1;
  $año_prox = strval($año_prox);

 	$query = "SELECT buque.bid, buque.bnombre FROM (SELECT * FROM (SELECT * FROM atraque WHERE ingreso < '$año_prox-01-01' AND ingreso >= '$año-01-01') AS atr_2020, puerto WHERE UPPER(puerto.punombre) LIKE UPPER('$puerto%') AND atr_2020.pid = puerto.pid) AS atr_2020_valpo, buque WHERE buque.bid = atr_2020_valpo.bid;";
	$result = $db -> prepare($query);
	$result -> execute();
	$buques = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>ID</th>
      <th>Nombre buque</th>
    </tr>
  <?php
	foreach ($buques as $b) {
  		echo "<tr><td>$b[0]</td><td>$b[1]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
