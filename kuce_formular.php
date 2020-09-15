<?php

include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id != 0){
    $query = $db->query("SELECT * FROM kuce WHERE id_kuce = $id");
    $rezultati = $query->fetchAll();
    $id_kuce = $rezultati[0]["id_kuce"];
    $ime = $rezultati[0]["ime"];
    $gospodar = $rezultati[0]["gospodar"];
    $foto = $rezultati[0]["foto"];
}else{
    $id_kuce = 0;
    $ime = "";
    $gospodar = 0;
    $foto= "";
}

?>

<h3>Kuće</h3>
<div class="row" style="margin-top:26px">
    <div class="medium-12 large-12 columns">
    <form method="post" action="kuce_sql.php" enctype="multipart/form-data" name="form" id="forma-kuce">
    <input type="hidden" name="id_kuce" value="<?php echo $id_kuce;?>">
    Ime Kuće
    <input type="text" name="ime" value="<?php echo $ime;?>">
    gospodar
    <select name="gospodar">
    <option value="0"> -- </option>
    <?php
        $query = $db->query("SELECT * FROM gospodari");
        $rezultati = $query->fetchAll();
        foreach($rezultati as $izv){
            if($gospodar == $izv["id_gospodara"]){
                $selected = " selected";
            }else{
                $selected = "";
            }
            echo "<option value='" . $izv["id_gospodara"] . "'" . 
            $selected ." >" . $izv["ime"] . " " .  $izv["prezime"] . "</option>";
        }
        ?>   </select>
    Slika
    <input type="text" name="foto" value="<?php echo $foto;?>" >
    <?php
        if($foto == ""){
            $slika = "dummy.jpg";
        }else{
            $slika = $foto;
        }
    ?>
	<img src="slike/<?php echo $foto; ?>" width="150"><br><br>

    <input type="submit" name="submit" value="Uredi" class="button">
    </form>

    </div>
</div>
