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

function annonce() {
    include __DIR__."/../../templates/annonce.php";
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

// version $_COOKIE

function ajouter_favoris2() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

    include_once __DIR__.'/../entity/Annonces.php';
    include_once __DIR__.'/../entity/Favoris.php';
    include_once __DIR__.'/../entity/Favori.php';

    if (isset($_COOKIE['favoris'])){

        // Je recupere le cookie
       $favoris_str=$_COOKIE['favoris'];
       //je convertie en objet panier
       $favoris=json_decode($favoris_str); 

   }
   else {
    
       $favoris=new Favoris();
       
       $favoris->favori=[];
   }

   
   // on créé une ligne du panier
   $favori=new Favori();
   // on insérer l'article dans la variable article grâce à l'ORM
   $favori = Annonces::retrieveByPK($_GET['id']);


   // avant de rajouter si il est dans le panier ou pas ? Si il est dedans 
   // juste rajouter la quantité 

  // pacourir mon panier et verifier j'ai l 'id que je veux rajouter
  array_push($favoris->favori, $favori);

  $favoris_encode=json_encode($favoris);
  
  setcookie("favoris",$favoris_encode);
        
    include __DIR__."/../../templates/ajout_favoris.php";
}

// version $_SESSION

function ajouter_favoris() {

include __DIR__.'/../entity/Annonces.php';
// SOIT LA SESSION N EXISTE PAS
if (isset($_SESSION['favoris'])==false){
    $entry = Annonces::retrieveByPK($_GET['id']);
    $entry->datefavori = $_GET['datefavori'];
    $entry->save();
    $tab_fav[]=$_GET['id'];
    $_SESSION['favoris']=$tab_fav;
}

else {
    
    $tab_fav=$_SESSION['favoris'];

    
    if (in_array($_GET['id'], $tab_fav)==false){
        
         $tab_fav[]=$_GET['id'];

         $entry = Annonces::retrieveByPK($_GET['id']);
         $entry->datefavori = $_GET['datefavori'];
         $entry->save();
         
         $_SESSION['favoris']=$tab_fav;


    }
   
}
        
    include __DIR__."/../../templates/ajout_favoris2.php";
}

function mes_favoris() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    include_once __DIR__.'/../Entity/Annonces.php';
    include_once __DIR__.'/../../templates/favoris.php';
}

function mes_favoris2() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    include_once __DIR__.'/../Entity/Annonces.php';
    if (!isset($_COOKIE['favoris'])) {
        include_once __DIR__.'/../../templates/favoris2.php';
        return;
    }
    $favoris_string=$_COOKIE['favoris'];
    $favoris=json_decode($favoris_string); 
    include_once __DIR__.'/../../templates/favoris2.php';
}

function retirer_favori() {
    // if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

    // require_once __DIR__."/../../src/Entity/Annonces.php";
    
    // $entry = Annonces::retrieveByPK($_GET['id']);
    // $favtitre = $entry->titre;
    $index = $_GET['pos'];
    // if (isset($_SESSION['favoris'])) {
    //     unset($_SESSION['favoris'][$index]);
    //     $tab_retire = $_SESSION['favoris'];
    //     $_SESSION['favoris'] = $tab_retire;
    // }
    if (isset($_COOKIE['favoris'])) {
        $favoris_str = ($_COOKIE['favoris']);
        $favoris=json_decode($favoris_str);
        unset($_COOKIE['favoris']);
        var_dump($_COOKIE);
        echo "<br/><br/>";
        var_dump($favoris);
        echo "<br/><br/>";
        var_dump($favoris->favori);
        echo "<br/><br/>";
        var_dump($favoris->favori[$index]);
        unset($favoris->favori[$index]);
        echo "<br/><br/>";
        var_dump($favoris->favori);
        $favoris_str=json_encode($favoris);
        echo "<br/><br/>";
        var_dump($favoris_str);
        setcookie("favoris",$favoris_str);
    }
    
    include __DIR__."/../../templates/retir_favori.php";
}

function vider_favoris() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    
    require_once __DIR__."/../../src/Entity/Annonces.php";

    include __DIR__."/../../templates/vid_favoris.php";
}





?>