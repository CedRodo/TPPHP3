<?php

include_once __DIR__.'/../../vendor/SimpleOrm.class.php';

class Annonces extends SimpleOrm {
    public $id;
    public $ref;
    public $titre;
    public $message;
    public $image;
    public $dateenvoi;
    public $datefavori;
    public $email_user;
}

?>