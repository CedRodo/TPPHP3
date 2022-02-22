<?php

function publier_annonce() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    include __DIR__."/../../templates/publication.php";
}

function enregistrer_annonce() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

    include __DIR__."/../entity/Annonces.php";

    if ($_POST['titre']==""){
        $erreur_titre="<br/><p>Vous n'avez pas entré de titre</p>";
    }

    if ($_POST['message']==""){
        $erreur_description="<br/><p>Vous n'avez pas entré de message</p>";
   
    }

    if (  ($_POST['titre']=="") || ($_POST['message']=="")  ) {
       
        include 'http://localhost:8000/publication';
        return ;
    }
        
    if(isset($_FILES['image'])){
        $tmpName = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"]."/img/".$name);
    } else { $entry->image = "http://localhost:8000/assets/icons_logos/no_image.png"; }
    echo $_SESSION['user'];
    echo $_GET['ref'];
    date_default_timezone_set('Europe/Paris');
    $datedujour = date('d/m/Y');
    $dateenvoi = $datedujour;
    $entry = new Annonces;
    $entry->ref = $_GET['ref'];
    $entry->titre = $_POST['titre'];
    $entry->message = $_POST['message'];
    $entry->dateenvoi = $datedujour;
    $entry->image = $name;
    $entry->id_user = $_SESSION['id'];
    $entry->save();

    include __DIR__."/../../templates/annonce_envoi.php";
}

function mes_annonces() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

    include __DIR__."/../entity/Annonces.php";

    $annonces = Annonces::all();
        
    include __DIR__."/../../templates/mes_annonces.php";
}

function toutes_annonces() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    include __DIR__."";
}

function recentes_annonces() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    include __DIR__."";
}

function top_annonces() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    include __DIR__."";
}

function ajouter_favoris() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

    include __DIR__.'/../entity/Annonces.php';
    
    if (isset($_SESSION['favoris'])==false){
        $entry = Annonces::retrieveByPK($_GET['id']);
        $entry->datefavori = $_GET['datefavori'];
        $entry->save();
        $tab_fav[]=$_GET['id'];
        $_SESSION['favoris']=$tab_fav;
    }
    
    else {
    
        // si l'identifant est get est deja dans mon tableau alors je ne l'insere pas dans la 
        // session
    
        // recuperer le tableau existant
        $tab_fav=$_SESSION['favoris'];
    
        // on ajoute cet ID uniquement dans le cas ou l'ID n'est pas enregistré
        if (in_array($_GET['id'], $tab_fav)==false){
            // Rajouter au tableau le nouvelle identifiant sur lequel on a cliqué
             $tab_fav[]=$_GET['id'];
    
             $entry = Annonces::retrieveByPK($_GET['id']);
             $entry->datefavori = $_GET['datefavori'];
             $entry->save();
    
             // Nouveau tableau complet vient s'enregistrer dans le tableau de session
             $_SESSION['favoris']=$tab_fav;
    
    
        }
       
    }
        
    include __DIR__."/../../templates/ajout_favoris.php";
}

function mes_favoris() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    include __DIR__."/../../templates/favoris.php";
}





?>