<?php

function inscription() {
    if ( (isset($_POST['prenom'])==true) && 
         (isset($_POST['mail'])==true) &&
         (isset($_POST['nom'])==true) &&
         (isset($_POST['password'])==true) && 
         (isset($_POST['age'])==true) )
        
        {
         $mdp=password_hash($_POST['password'], PASSWORD_BCRYPT);
         
         
          
         require_once __DIR__."/../entity/Utilisateur.php";
    
            $entry = new Utilisateur;
            $entry->prenom = $_POST['prenom'];
            $entry->nom = $_POST['nom'];
            $entry->mdp = $mdp;
            $entry->mail = $_POST['mail'];
            $entry->age = $_POST['age'];
            $entry->save();
            
            $_SESSION['user']= $entry->mail;
            $_SESSION['name']= $entry->prenom." ".$entry->nom;
            
            
        }
    
    
    
    include __DIR__."/../../templates/inscription.php";
}

function connexion() {
    if ($_POST==null) {
    header('location: identification');
    die;
    }
    
    require_once __DIR__."/../entity/Utilisateur.php";
    
    
    $emailUtilLog=$_POST['mail'];
    $mdpUtilLog=$_POST['password'];
    
    $entry = Utilisateur::retrieveByMail($_POST['mail'], SimpleOrm::FETCH_ONE);

    if ($entry==null){ include __DIR__."/../../templates/header.php";
        die ('<p style="color: white; font-size: 20px;">Vous n'."'".'êtes pas encore inscrit.<br/>Vous devez vous <a href="inscription" style="text-decoration: none; color: yellow;">inscrire</a> pour accéder aux annonces.</p>');
    }
    
    $emailUtilTable=$entry->mail;
    $nomUtilTable=$entry->nom;
    $prenomUtilTable=$entry->prenom;
    $mdpUtilTable=$entry->mdp;

    include __DIR__."/../../templates/connexion.php";
}

function deconnexion() {
    include __DIR__."/../../templates/deconnexion.php";
}

function identification() {
    include __DIR__."/../../templates/identification.php";
}