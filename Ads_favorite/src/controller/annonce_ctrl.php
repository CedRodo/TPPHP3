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



// function ajouter_favoris() {
//     if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

//     include __DIR__.'/../entity/Annonces.php';
    
//     if (isset($_COOKIE['favoris'])==false){
//         $monfavori = Annonces::retrieveByPK($_GET['id']);
//         // $monfavori_encode=json_encode($monfavori);
//         $monfavori_encode=json_encode($monfavori);
//         setcookie("favoris",$monfavori_encode,time() + 60*60*24*30);
//         include __DIR__."/../../templates/ajout_favoris.php";
//         return;
//     }

//         // Je recupere le cookie
    
//     // if (isset($_COOKIE['favoris'])){

//         // Je recupere le cookie
//        $favoris_str=$_COOKIE['favoris'];
//        //je convertie en objet panier
//        $favoris=json_decode($favoris_str);

//     //    $favoris_encode=json_encode($favoris);


//         // include_once __DIR__."/../entity/Favori.php";
//         // $favoris = new Favori();
//         // $favoris->ligneFav=[];
//         // include_once __DIR__."/../entity/LigneFav.php";
//         // $unfavori=new LigneFav();
//         // $unfavori->titre=Annonces::retrieveById($_GET['id']);
//         var_dump($_COOKIE);
//         $monfavori = Annonces::retrieveByPK($_GET['id']);
//         echo "<br/>Mon Favori 1<br/>";
//         print_r($monfavori);
//         $monfavori_encode=json_encode($monfavori, true);
//         echo "<br/>Mon Favori après decode<br/>";
//         print_r($monfavori);
        
        
//         // $monfavori_encode=json_encode($monfavori);


//         echo "<br/>Favoris 1<br/>";
//         var_dump($favoris); // OBJET
//         echo "<br/>";
//         $favoris_encode=json_encode($favoris);
//         echo "<br/>Favori après encode<br/>";
//         var_dump($favoris_encode);
//         echo "<br/>";
//         $favoris_decode=json_decode($favoris_encode, true);
//         echo "<br/>Favori après decode true<br/>";
//         var_dump($favoris_decode);
//         // var_dump($monfavori_encode);
//         echo "<br/>";
//         $favoris_decode = json_decode($favoris_encode, true);
//         $favoris_str = json_encode($favoris_decode);
//         $monfavori_decode = json_decode($monfavori_encode, true);
//         var_dump($monfavori_decode);
//         var_dump($favoris_decode);
//         echo "<br/>";
//         // array_push($favoris_decode, $monfavori_decode);
//         // array_push($favoris_encode, $monfavori_encode);
//         // il faut faire le cookie
//         // $favoris_encode = json_encode($favoris_decode);
//         // array_push($favoris->ligneFav, $unfavori);
//         // $favoris_encode = json_encode($favoris);
//         // setcookie("favoris",$favori_encode);
//         setcookie("favoris",$favoris_str, time() + 60*60*24*30);
       
//     include __DIR__."/../../templates/ajout_favoris.php";
// }


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
        
    include __DIR__."/../../templates/ajout_favoris.php";
}

function mes_favoris() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    include_once __DIR__.'/../Entity/Annonces.php';
    include_once __DIR__.'/../../templates/favoris.php';
}

function retirer_favori() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

    require_once __DIR__."/../../src/Entity/Annonces.php";
    
    $entry = Annonces::retrieveByPK($_GET['id']);
    
    include __DIR__."/../../templates/retir_favori.php";
}

function vider_favoris() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    
    require_once __DIR__."/../../src/Entity/Annonces.php";

    include __DIR__."/../../templates/vid_favoris.php";
}





?>