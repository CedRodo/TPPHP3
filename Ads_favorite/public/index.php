<?php session_start();
// routeur : 
//dans cd public
// php -S localhost:8000

// ACCUEIL

if (isset($_SERVER['PATH_INFO'])==false){
  
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    accueil();
}

else if ($_SERVER['PATH_INFO']=="/accueil"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    accueil();
}

// Partie "ANNONCES"

else if ($_SERVER['PATH_INFO']=="/publication"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    publier_annonce();
}

else if ($_SERVER['PATH_INFO']=="/enregistrer_annonce"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    enregistrer_annonce();
}

else if ($_SERVER['PATH_INFO']=="/suppression_annonce"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    suppression_annonce();
}

else if ($_SERVER['PATH_INFO']=="/mes_annonces"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    mes_annonces();
}

else if ($_SERVER['PATH_INFO']=="/toutes_annonces"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    toutes_annonces();
}

else if ($_SERVER['PATH_INFO']=="/annonce"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    annonce();
}

else if ($_SERVER['PATH_INFO']=="/recents"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    recentes_annonces();
}

else if ($_SERVER['PATH_INFO']=="/top_annonces"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    top_annonces();
}

// Partie "FAVORIS"

else if ($_SERVER['PATH_INFO']=="/ajouter_favoris2"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    ajouter_favoris2();
}

else if ($_SERVER['PATH_INFO']=="/ajouter_favoris"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    ajouter_favoris();
}

else if ($_SERVER['PATH_INFO']=="/favoris"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    mes_favoris();
}

else if ($_SERVER['PATH_INFO']=="/retirer_favori"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    retirer_favori();
}

else if ($_SERVER['PATH_INFO']=="/vider_favoris"){
   
    include __DIR__.'/../src/controller/annonce_ctrl.php';
    vider_favoris();
}

// Partie "CONNEXION UTILISATEUR"

else if ($_SERVER['PATH_INFO']=="/inscription"){
   
    include __DIR__.'/../src/controller/connexion_ctrl.php';
    inscription();
}

else if ($_SERVER['PATH_INFO']=="/connexion"){
   
    include __DIR__.'/../src/controller/connexion_ctrl.php';
    connexion();
}

else if ($_SERVER['PATH_INFO']=="/deconnexion"){
   
    include __DIR__.'/../src/controller/connexion_ctrl.php';
    deconnexion();
}

else if ($_SERVER['PATH_INFO']=="/identification"){
   
    include __DIR__.'/../src/controller/connexion_ctrl.php';
    identification();
}

// Pour faire des tests

else if ($_SERVER['PATH_INFO']=="/videcookie"){
   
    include __DIR__.'/../templates/tests/videcookie.php';
}

else if ($_SERVER['PATH_INFO']=="/test"){
   
    include __DIR__.'/../templates/tests/test.php';
}

else if ($_SERVER['PATH_INFO']=="/header"){
   
    include __DIR__.'/../templates/tests/header-test.php';
}
