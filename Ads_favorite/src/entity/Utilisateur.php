<?php

include_once __DIR__.'/../../vendor/SimpleOrm.class.php';

class Utilisateur extends SimpleOrm {
    public $id;
    public $nom;
    public $prenom;
    public $motdepasse;
    public $mail;
    public $age;
}

?>