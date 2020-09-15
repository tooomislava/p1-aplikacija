<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id != 0){
   	$upit = $db->query("DELETE FROM kuce WHERE id_kuce = " . $id);
	header("Location:kuce.php");

	$rezultati = $query->fetchAll();
    $id_kuce = $rezultati[0]["id_kuce"];
    $ime = $rezultati[0]["ime"];
    $gospodar = $rezultati[0]["gospodar"];
    $foto = $rezultati[0]["foto"];
}else{
    $id_kuce = 0;
    $ime = "";
    $gospodar = 0;
    $foto = "";
}

?>
<h3>Kuće</h3>

<div class="row" style="margin-top:26px">
	<div class="medium-12 large-12 columns">
    <form method="post" action="kuce_sql.php" enctype="multipart/form-data" name="form" id="forma-kuce">
    <input type="hidden" name="id_kuce" value="<?php echo $id_kuce;?>">
    Želite li stvarno pobrisati kuću? "<b><?php echo $ime; ?></b>"

    <input type="submit" name="submit" value="Potvrdi" class="button">&nbsp;&nbsp;
    <input type="submit" name="submit" value="Odustani" class="button">
    </form>
    
    
    </div>
</div>    
<?php
include("template_podnozje.html");
?>