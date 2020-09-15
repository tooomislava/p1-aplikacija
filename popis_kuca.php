<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$query = $db->query("SELECT * FROM kuce");
$rezultati = $query->fetchAll();
?>
<table>
	<tr>
	<th>Popis Kuća:</th>
	<th></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	echo "<tr>
			<td><a href='kuce.php?id=" . $stavka["id_kuce"] . "'>" .  $stavka['ime'] . "</a></td>
		  	<td>";
	


	echo "</td>
		  </tr>";
}
?>
</table>
