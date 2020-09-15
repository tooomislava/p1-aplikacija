<?php

include("session.php");
include("pdo.php");

if($_POST["submit"] == "Odustani"){
    header("Location:popis_kuca.php");
}


if($_FILES["foto"]["name"]){

    $putanja = "slike/"; 
    move_uploaded_file($_FILES["slika"]["tmp_name"], $putanja . $_FILES["slika"]["name"]);

    $uploadana_slika = $_FILES["slika"]["name"];

}else{

    $uploadana_slika = $_POST["foto"];
}

if($_POST["id_kuce"] > 0 && $_POST["submit"] == "Uredi" ){
    $upit = $db->query("UPDATE kuce SET 
        ime = '" . $_POST["ime"] . "',
        gospodar = '" . $_POST["gospodar"] . "',
        foto = '" . $uploadana_slika . "'
        WHERE
        id_kuce = " . $_POST["id_kuce"] . "

        ");
    header("Location:popis_kuca.php");
    
}elseif($_POST["id_kuce"] > 0 && $_POST["submit"] == "Potvrdi" ){
    $upit = $db->query("DELETE FROM kuce WHERE id_kuce = " . $_POST["id_kuce"]);
    header("Location:popis_kuca.php");
    
}elseif($_POST["id_kuce"] == 0){
    $upit = $db->query("INSERT INTO kuce 
        (ime, gospodar, foto)VALUES
        ('" . $_POST["ime"] . "',
        '" . $_POST["gospodar"] . "',
        '" . $uploadana_slika . "')
        ");
    header("Location:popis_kuca.php");
}

?>