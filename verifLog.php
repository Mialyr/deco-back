<?php

    $email = $_POST['email'];
    $mdp = $_POST['pass'];
    
    require('fonctions.php');
	$connect = dbconnect();
	$result = checkUser($connect,$email,$mdp);
	var_dump($result);
	if(checkUser($connect,$email,$mdp)==true){
		session_start();
        $user = findUser("where email='".$email."'");
		$_SESSION["login"] = "OK";
		header('Location: table.php?user='.$user[0]->username);
	} else{
		header('Location: index.php');
	}

?>