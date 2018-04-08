<?php

    function dbconnect()
    {
        $PARAM_hote='mysql-decoration.alwaysdata.net'; // le chemin vers le serveur
        $PARAM_port='3306'; 
        $PARAM_nom_bd='decoration_bdd'; // le nom de votre base de données 
        $PARAM_utilisateur='157046'; // nom d'utilisateur pour se connecter 
        $PARAM_mot_passe='rakoto123456789'; // mot de passe de l'utilisateur pour se connecter 
        $connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
        return $connexion;
    }

    function addUser($connexion,$username,$email,$mdp){
		$req = "INSERT INTO utilisateur(Username,Email,Mdp) VALUES('".$username."','".$email."','".$mdp."')";
		$prep = $connexion->exec($req);
	}

    function checkUser($connexion,$email,$mdp){
        $req = "SELECT * FROM utilisateur WHERE email='".$email."' AND mdp='".$mdp."'";
        var_dump($req);
        $resultat = $connexion->query($req);
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        var_dump($resultat);
        $result = $resultat->fetch();
        if($result!=false)
            return true;
        return false;
	}

    function findUser($critere){
		$connex = dbconnect();
        $sql=$connex->query("SELECT * FROM utilisateur ".$critere);
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $tab = array();
        while( $ligne = $sql->fetch() )
        {       
            $tab[] = $ligne;
        } 
        $sql->closeCursor();
        return $tab;
	}

    function findCategorie($critere){
		$connex = dbconnect();
        if($critere!=null){
            $sql=$connex->query("SELECT * FROM categorie ".$critere);
        }
        else{
            $sql=$connex->query("SELECT * FROM categorie ");
        }
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $tab = array();
        while( $ligne = $sql->fetch() )
        {       
            $tab[] = $ligne;
        } 
        $sql->closeCursor();
        return $tab;
	}

    function addCategorie($file1,$imgDesc,$nom,$description){
        $connexion = dbconnect();
        $categ = findCategorie(null);
        $idC = ($categ[count($categ)-1]->id)+1;
		$req = "INSERT INTO Categorie(Id,Image,ImgDesc,Nom,Description) VALUES('".$idC."','".$file1."','".$imgDesc."','".$nom."','".$description."')";
		echo $req;
        $prep = $connexion->exec($req);
	}

?>