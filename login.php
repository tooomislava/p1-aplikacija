<?php
include("template_zaglavlje_login.html");
include("pdo.php");

$submit = isset($_POST["Submit"]) ? $_POST["Submit"] : false;
$korisnicko_ime = isset($_POST["korisnicko_ime"]) ? $_POST["korisnicko_ime"] : "";
$lozinka = isset($_POST["lozinka"]) ? $_POST["lozinka"] : "";

if($submit == "Dalje"){
	$query = $db->query("SELECT * FROM administratori WHERE korisnicko_ime = '$korisnicko_ime'"); 


	$rezultati = $query->fetchAll();
	if(count($rezultati) == 0){
		echo "<p style='color:#FF0000' align='center'>pogrešno korisničko ime</p>";
	}else{
		if($lozinka == $rezultati[0]["lozinka"]){
			
			session_start();
			$_SESSION["korisnik"] = $korisnicko_ime;
			$_SESSION["ime_i_prezime"] = $rezultati[0]["ime"] . " " . $rezultati[0]["prezime"];
			header("Location:kuce.php");
		}else{
			echo "<p style='color:#FF0000' align='center'>pogrešna lozinka</p>";
		}
	}

}

?>

<div class="medium-4 medium-offset-4">
<p align="center">Prijava</p>
<form action="" method="post">
Korisničko ime (TZ):<br>
<input type="text" name="korisnicko_ime"  /><br />
Lozinka (TZ):<br>
<input type="password" name="lozinka" /><br />
<input type="submit" name="Submit" value="Dalje" />
</form>
</div>
<?php
include("template_podnozje.html");
?>