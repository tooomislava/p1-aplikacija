<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id == 0){
	echo "<h3>Kuće <small>(<a href='kuce_formular.php'>dodavanje nove kuće</a>)</small></h3>";
	$query = $db->query("SELECT * FROM kuce");
}else{
	$query = $db->query("SELECT * FROM kuce WHERE id_kuce = " . $id);
	$rezultati = $query->fetchAll();
    echo "<h1>" . $rezultati[0]["ime"] . "</h1>";
    $query = $db->query("SELECT * FROM kuce WHERE gospodar = " . $id);
	
}

$rezultati = $query->fetchAll();

foreach($rezultati as $kuca){
	echo "<div class=\"row\" style=\"margin-top:26px\">";
		echo "<div class=\"medium-3 large-3 columns\">";
		echo "</div>";
		echo "<div class=\"medium-6 large-6 columns\">";
			echo "<strong>" . $kuca["ime"] . "</strong></br>";

		echo "</div>";
		echo "<div class=\"medium-3 large-3 columns\">";
        echo "<img src='slike/kuca_" . $kuca["id_kuce"] . ".jpg'>";
		echo "</div>";

		
		echo "<a href='kuce_formular.php?id=" . $kuca["id_kuce"] . "'>uredi</a><br><a href='kuce_brisanje.php?id=" . $kuca["id_kuce"] . "'>pobriši</a>";
		echo "<hr />";

	echo "</div>";
}

?>