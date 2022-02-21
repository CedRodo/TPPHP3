<?php

include_once __DIR__.'/../../vendor/SimpleOrm.class.php';

class Articles extends SimpleOrm {
    public $id;
    public $ref;
    public $titre;
    public $description;
    public $prix;
    public $img;
    public $datefavori;
    public $datepanier;
}

?>