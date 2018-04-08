<?php

    $username = $_POST['username'];
    $email = $_POST['email'];
    $mdp = $_POST['pass'];

    require("fonctions.php");
    $connexion = dbconnect();
    addUser($connexion,$username,$email,$mdp);

    header('Location:index.php');

?>