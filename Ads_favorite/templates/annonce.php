<?php include_once "header.php"; ?>

<?php

require_once "../src/Entity/Annonces.php";

?>

<h3>Annonce</h3>
<br/>
<br/>
<br/>
<?php
$entry = Annonces::retrieveByPK($_GET['id']); ?>

<section id="article">
<h4>Référence : </h4>
<p><?php echo $entry->ref; ?></p>
<h4>Titre : </h4>
<p><?php echo $entry->titre; ?></p>
<br/>
<br/>
<br/>
<br/>
<h4>Message : </h4>
<p><?php echo $entry->message; ?></p>
<br/>
<br/>
<h4>Date de l'envoi : </h4>
<p><?php echo $entry->dateenvoi ?></p>
<p><img src="http://localhost:8000/img/<?php echo $entry->image;?>"><p>
</section>

<a href="index.php">Retour vers la page d'accueil</a>

<?php require "footer.php"; ?>