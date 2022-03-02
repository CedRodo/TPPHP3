<?php include_once 'header.php'; ?>
<h1 style="color: white; margin:0px 10px 150px 10px;">Liste des favoris</h1>
<div id="favoris">
<?php $pos = 0;
if (isset($_SESSION["favoris"])==true) { 

foreach($_SESSION["favoris"] as $monannonce){
    include_once __DIR__."/../src/entity/Annonces.php";
    $entry = Annonces::retrieveByPK($monannonce);   
    ?>


<section class="favoris_annonces">
<div class="image_annonce">
<img src="http://localhost:8000/img/<?= $entry->image; ?>" alt="image de <?= $entry->titre; ?>">
</div>
<div class="contenu_annonce">
<div class="en-tete"><p class="date"><span>Ajouté le</span> <?= $entry->datefavori; ?></p><p class="ref">N° de l'annonce : <?= $entry->ref; ?></p></div>
<p class="titre_favori"><a href="annonce?id=<?= $monannonce; ?>"><?= $entry->titre; ?></a></p></br>
<p class="message"><?= $entry->message; ?></p>
</div>
<div class="action_annonce">
    <button><a href="retirer_favori?id=<?= $monannonce; ?>&pos=<?= $pos; ?>">Retirer l'annonce des favoris</a></button>
</div>
</section>
    
<?php 
    $pos++; } ?>
<br/>
<hr>
</div>
<br/>

<p style="color: white; font-size: 20px; text-align: end;"> <button><a href="vider_favoris">Vider les favoris</a></button></p>

<p style="color: white; font-size: 20px;">Retour vers l'<a style="text-decoration: none; color: yellow;" href="/">accueil</a> ou <a style="text-decoration: none; color: yellow;" href="mes_annonces">mes annonces</a>.</p>

<?php } else { ?>

<p style="color: white; font-size: 20px;"> La liste des favoris est vide.</p>
    
<?php } ?>
<?php include_once "footer.php"; ?>