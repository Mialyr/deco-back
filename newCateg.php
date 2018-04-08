<?php
    require('fonctions.php');

    $file_path = "images/";
    $file_path0 = $file_path . basename($_FILES['uploaded_file']['name']);

    $img = $file_path.$_FILES['uploaded_file']['name'];
    $imgDesc = $_POST['imgDesc'];
    $nom = $_POST['nom'];
    $description = pg_escape_string($_POST['description']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$file_path0))
    {
            addCategorie($img,$imgDesc,$nom,$description);
            echo("uploaded successfull");
            header('Location: table.php');
    }
?>