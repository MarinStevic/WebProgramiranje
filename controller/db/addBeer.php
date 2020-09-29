<?php

require __DIR__ . "./../DbHandler.php";

use Db\DbHandler;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // citanje podataka dobivenih POST metodom
    $name = $_POST['name'];
    $info = $_POST['info'];

    // određivanje putanje slike gdje ce se spremati
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // provjera je li velicina slike manja od 50MB
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // provjera je li $uploadOk postavljen na 0 i da je došlo do error-a
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // ako je sve u redu slika se sprema na server
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $db = new DbHandler();
            $db->insert("INSERT INTO beers(name, info, path, likes) 
                VALUES ('{$name}', '{$info}', '{$target_file}', 0)");
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            header("Location: ../../index.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}