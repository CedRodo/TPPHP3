<?php include_once "header.php"; ?>

<h1>Annonce</h1>
<section id="article2">
<article class="une_annonce">
<h3>Annonce de <?php echo $utilisateur->prenom." ".$utilisateur->nom; ?></h3>
<div class="art_icons">
    <a class="star-favorite" href="ajouter_favoris?id=<?= $entry->id; ?>&datefavori=<?= $datefavori; ?>&page=une"><img title="Favoris" src="http://localhost:8000/assets/icons_logos/favorite.png" alt="star favorite"><a/>
</div>
<div class="ref_annonce">
    <h4>Reférence</h4><p><?php echo $entry->ref; ?></p>
</div>
<div class="titre_annonce">
    <h4>Titre</h4><p><?php echo $entry->titre; ?></p>
</div>
<div class="message_annonce">
<h4>Message</h4>
<p style="display: block !important;"><?php echo $entry->message; ?></p>
</div>
<div class="date_annonce">
    <h4 style=";">Date de l'envoi</h4><p><?php echo $entry->dateenvoi ?></p>
</div>
<div class="image_annonce">
<img src="http://localhost:8000/img/<?php echo $entry->image; ?>">
</div>
</article>
</section>

<p style="font-size: 18px; color: white;">Retour vers la page d'<a style="text-decoration: none; color: red;" href="/">accueil</a>, <a style="text-decoration: none; color: green;" href="mes_annonces">vos annonces</a> ou <a style="text-decoration: none; color: yellow;" href="toutes_annonces">toutes les annonces</a>.</p>

<?php require "footer.php"; ?>