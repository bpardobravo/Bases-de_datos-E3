<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	// $tipo = $_POST["tipo_elegido"];
	// $nombre = $_POST["nombre_pokemon"];

 	$query = "SELECT nid, nnombre FROM naviera;";
	$result = $db -> prepare($query);
	$result -> execute();
	$navieras = $result -> fetchAll();
  ?>

	<table>
    <tr>
		<th>ID</th>
      <th>Nombre</th>
    </tr>
	<?php
		foreach ($navieras as $naviera) {
			echo "<tr> <td>$naviera[0]</td></tr>";
		}
	?>
	</table>

<?php include('../templates/footer.html'); ?>
