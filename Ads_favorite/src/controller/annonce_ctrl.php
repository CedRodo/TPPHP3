<?php

function accueil() { 
    include_once __DIR__."/../../templates/accueil.php";
}

function publier_annonce() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    $modRef = $_GET['ref'];
    $modTitre = $_GET['titre'];
    $modMessage = $_GET['message'];
    $modImage = $_GET['image'];
    }
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
    date_default_timezone_set('Europe/Paris');
    $datedujour = date('d/m/Y');
    $dateenvoi = $datedujour;
    if (isset($_GET['mode'])) {
        $entry = Annonces::retrieveByPK($_GET['id']); } 
        else {
        $entry = new Annonces;
        }
    $entry->ref = $_GET['ref'];
    $entry->titre = $_POST['titre'];
    $entry->message = $_POST['message'];
    $entry->dateenvoi = $datedujour;
    $entry->image = $name;
    $entry->datefavori = "";
    $entry->email_user = $_SESSION['user'];
    $entry->save();

    include __DIR__."/../../templates/annonce_envoi.php";
}

function suppression_annonce() {
    require_once "../src/Entity/Annonces.php";
    $suppAnnonce = Annonces::retrieveByPK($_GET['id']);
    $suppAnnonce->delete();
    include __DIR__."/../../templates/suppression_annonce.php";
}

function annonce() {
    require_once "../src/Entity/Annonces.php";
    require_once "../src/Entity/Utilisateur.php";
    date_default_timezone_set('Europe/Paris');
    $datedujour = date('d/m/Y');
    $datefavori = $datedujour;
    $entry = Annonces::retrieveByPK($_GET['id'], SimpleOrm::FETCH_ONE);
    $userAnnonce = $entry->email_user;
    $utilisateur = Utilisateur::retrieveByMail($userAnnonce, SimpleOrm::FETCH_ONE);
    include __DIR__."/../../templates/annonce.php";
}

function mes_annonces() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

    include __DIR__."/../entity/Annonces.php";

    $annonces = Annonces::retrieveByEmail_user($_SESSION['user'], SimpleOrm::FETCH_MANY);
    
    $page = "mes";

    include __DIR__."/../../templates/annonces.php";
}

function toutes_annonces() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

    include __DIR__."/../entity/Annonces.php";

    $annonces = Annonces::all();

    $page = "toutes";
        
    include __DIR__."/../../templates/annonces.php";
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

function ajouter_favoris() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

    include_once __DIR__.'/../entity/Annonces.php';

    
    

    if (isset($_COOKIE['favoris'])) {

       $favoris = json_decode($_COOKIE['favoris']); 

       foreach($favoris as $mesfavoris) {
        if ($mesfavoris->id == $_GET['id']) {
            // include __DIR__."/../../templates/header.php";
            // echo "<p style='color: white; font-size: 20px; margin: 10px 0px 0px 20px'>Favori déjà présent dans la liste.</p>";
            // include __DIR__."/../../templates/footer.php";
            header( "refresh:6;url=mes_annonces" );
            echo '<p>Le favori est déjà présent dans la liste, vous allez être redirigé vers les annonces. Sinon, cliquez ici <a href="mes_annonces">here</a>.</p>'; 
            return;
            }
        }
    }
    else {
        $favoris = [];
   }

   date_default_timezone_set('Europe/Paris');
   $datedujour = date('d/m/Y');
   $dateenvoi = $datedujour;

    $favori = Annonces::retrieveByPK($_GET['id']);

    $favori->datefavori = $datedujour;
    $favori->save();
   
    array_push($favoris, $favori);

    $favoris_str = json_encode($favoris, true);
  
    setcookie("favoris", $favoris_str);
        
    include __DIR__."/../../templates/ajout_favoris.php";
}

// version $_SESSION

// function ajouter_favoris() {

// include __DIR__.'/../entity/Annonces.php';
// // SOIT LA SESSION N EXISTE PAS
// if (isset($_SESSION['favoris'])==false){
//     $entry = Annonces::retrieveByPK($_GET['id']);
//     $entry->datefavori = $_GET['datefavori'];
//     $entry->save();
//     $tab_fav[]=$_GET['id'];
//     $_SESSION['favoris']=$tab_fav;
// }

// else {
    
//     $tab_fav=$_SESSION['favoris'];

    
//     if (in_array($_GET['id'], $tab_fav)==false){
        
//          $tab_fav[]=$_GET['id'];

//          $entry = Annonces::retrieveByPK($_GET['id']);
//          $entry->datefavori = $_GET['datefavori'];
//          $entry->save();
         
//          $_SESSION['favoris']=$tab_fav;


//     }
   
// }
        
//     include __DIR__."/../../templates/ajout_favoris2.php";
// }

function mes_favoris2() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    include_once __DIR__.'/../Entity/Annonces.php';
    include_once __DIR__.'/../../templates/favoris2.php';
}

function mes_favoris() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    include_once __DIR__.'/../Entity/Annonces.php';
    if (!isset($_COOKIE['favoris'])) {
        include_once __DIR__.'/../../templates/favoris.php';
        return;
    }
    $favoris_string=$_COOKIE['favoris'];
    $favoris=json_decode($favoris_string); 
    include_once __DIR__.'/../../templates/favoris.php';
}

function retirer_favori() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }
    
    require_once __DIR__."/../../src/Entity/Annonces.php";
    
    $entry = Annonces::retrieveByPK($_GET['id']);
    $favtitre = $entry->titre;
    $index = $_GET['pos'];
    if (isset($_SESSION['favoris'])) {
        unset($_SESSION['favoris'][$index]);
        $tab_retire = $_SESSION['favoris'];
        $_SESSION['favoris'] = $tab_retire;
    }
    if (isset($_COOKIE['favoris'])) {
        $favoris_str = ($_COOKIE['favoris']);
        $favoris=json_decode($favoris_str);
        // var_dump($favoris);
        unset($favoris[$index]);
        // (array)($favoris->favori);
        // var_dump($favoris);
        $favoris_str=json_encode($favoris, true); // Problème : transforme souvent un tableau ($favoris[]) en chaîne de caractères qui décrivent un objet
        // var_dump($favoris_str);
        setcookie("favoris",$favoris_str);
    }
    
    if ($_COOKIE['favoris']="") {
        unset($_COOKIE['favoris']);
    }
    
    
    include __DIR__."/../../templates/retir_favori.php";
}

// ************ 2ème version ************ //
// rencontre le même problème que la première version avec json_encode qui transforme un tableau

// function retirer_favori2() {
//     if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

//     $entry = json_decode($_COOKIE['favoris']);

//     var_dump($entry);
//     echo "<br />";echo "<br />";echo "<br />";
    
    
//         foreach( $entry as $key=>$favoris){
//             if ($favoris->id == $_GET['id'] ){
//                  var_dump($favoris);
                 
//                  unset($entry[$key]);
//                  setcookie("favoris",json_encode($entry));
//             }
//         }
    
    
//         echo "<br />";echo "<br />";echo "<br />";
//         var_dump($entry);
    
//     include __DIR__."/../../templates/retir_favori.php";
// }

function vider_favoris() {
    if (isset($_SESSION['user'])==false) { header('location: identification'); die; }

    if (isset($_SESSION['favoris'])) {
        unset($_SESSION['favoris']);
    }
    if (isset($_COOKIE['favoris'])) {
        unset($_COOKIE['favoris']);
        setcookie('favoris', '', time() - 3600, '/');
        
        
    }

    include_once __DIR__."/../../templates/vid_favoris.php";
}





?>