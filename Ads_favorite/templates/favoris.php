<h2>Liste des articles favoris</h2>
<br/>
<div id="favoris">
<?php $pos = 0; ?>
<?php if (isset($_SESSION["favoris"])==true) { 

foreach($_SESSION["favoris"] as $monannonce){
    $entry = Annonces::retrieveByPK($monannonce);   
    ?>


<hr>
<br/>
<section class="favoris_articles">
<section class="image_article">
<img src="<?php echo $entry->image; ?>" alt="image de <?php echo $entry->titre; ?>">
</section>
<section class="contenu_article">
<p class="titre_favori"><a href="article?id=<?php echo $monannonce; ?>"><?php echo $entry->titre; ?></a><span>Ref : <?php echo $entry->ref; ?></span></p></br>
<p>Message : <?= $entry->message; ?></p>
<p>Ajouté le : <?= $entry->datefavori; ?></p>
</section>
    <button><a href="retirer_favori?id=<?php echo $monannonce; ?>&pos=<?php echo $pos; ?>">Retirer l'annonce des favoris</a></button>
</section>
</section>
    
<?php 
    $pos++; } ?>
<br/>
<hr>
</div>
<br/>

<p style="color: white; font-size: 20px; text-align: end;"> <button><a href="vider_favoris">Vider les favoris</a></button></p>

<p style="color: white; font-size: 20px;">Retour vers l'<a style="text-decoration: none; color: yellow;" href="/">accueil</a> ou la <a style="text-decoration: none; color: yellow;" href="liste_articles">les annonces</a>.</p>

<?php } else { ?>

<p style="color: white; font-size: 20px;"> La liste des favoris est vide. </p>
    
<?php } ?>
<?php include "footer.php"; ?>