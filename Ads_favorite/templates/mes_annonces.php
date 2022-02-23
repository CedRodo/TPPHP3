<?php include_once 'header.php'; ?>

<h1 style="color: white; margin-left: 10px; margin-bottom: 100px;">Mes annonces</h1>

<section id="listeAnnonces">
<?php
    date_default_timezone_set('Europe/Paris');
    $datefavori = date('d/m/Y');
foreach($annonces as $annonce){ ?>
    <article class="annonce">
        <p class="ref">Ref. : <?= $annonce->ref; ?></p>
        <div class="art_icons"><a class="star-favorite" href="ajouter_favoris?id=<?= $annonce->id ;?>&datefavori=<?= $datefavori; ?>"><img title="Favoris" src="http://localhost:8000/assets/icons_logos/favorite.png" alt="star favorite"><a/></div>
        <p class="titre"><a href="annonce?id=<?= $annonce->id; ?>"><?= $annonce->titre; ?></a></p>
        <p class="photos"><img src="http://localhost:8000/img/<?= $annonce->image; ?>" alt="image de l'annonce"></p>
        <p class="message"><?= $annonce->message;?></p>
        <p class="date"><span>Date de l'envoi</span> <?= $annonce->dateenvoi; ?></p>
        <p class="modsup"><button title="Modifier l'article"><a href="modification_article?id="<?= $annonce->id."&titre=".$annonce->titre."&message=".$annonce->message."&ref=".$annonce->ref."&image=".$annonce->image; ?>">Modifier</a></button><button title="Supprimer l'article"><a href="suppression_article?id=<?= $annonce->id;?>"> Supprimer </a></button></p>
    </article>
<?php
}
?>

</section>

<?php include_once __DIR__."/../templates/footer.php"; ?>

<?php include_once "footer.php"; ?>

