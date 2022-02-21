<?php
// routeur : 
//dans cd public
// php -S localhost:8000

if (isset($_SERVER['PATH_INFO'])==false){
  
    include __DIR__.'/../src/controller/accueil_ctrl.php';
}

else if ($_SERVER['PATH_INFO']=="/accueil"){
   
    include __DIR__.'/../src/controller/accueil_ctrl.php';

}

// else if ($_SERVER['PATH_INFO']=="/article"){
//     include __DIR__.'/../src/controller/articleController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/creer_article"){
//     include __DIR__.'/../src/controller/insertion_artController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/validationajout"){
//     include __DIR__.'/../src/controller/insertionokController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/modification_article"){
//     include __DIR__.'/../src/controller/modif_artController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/validationmodif"){
//     include __DIR__.'/../src/controller/modificationokController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/suppression_article"){
//     include __DIR__.'/../src/controller/supp_artController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/ajouter_favoris"){
//     include __DIR__.'/../src/controller/ajout_favController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/favoris_articles"){
//     include __DIR__.'/../src/controller/fav_artController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/retirer_favori"){
//     include __DIR__.'/../src/controller/retir_favController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/vider_favoris"){
//     include __DIR__.'/../src/controller/vider_favController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/ajouter_panier"){
//     include __DIR__.'/../src/controller/ajout_panController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/panier_articles"){
//     include __DIR__.'/../src/controller/pan_artController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/vider_panier"){
//     include __DIR__.'/../src/controller/vider_panController.php';
// }

// else if ($_SERVER['PATH_INFO']=="/commande"){
//     include __DIR__.'/../src/controller/commande_Controller.php';
// }

// else if ($_SERVER['PATH_INFO']=="/bondecommande"){
//     include __DIR__.'/../src/controller/bdc_Controller.php';
// }
