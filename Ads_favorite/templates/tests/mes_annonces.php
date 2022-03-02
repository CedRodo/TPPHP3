<?php include_once 'header.php'; ?>

<h1>Mes annonces</h1>

<section id="listeAnnonces">
<?php
    date_default_timezone_set('Europe/Paris');
    $datefavori = date('d/m/Y');
foreach($mesannonces as $annonce){ ?>
    <article class="annonce">
        
        <div class="art_icons"><a class="star-favorite" href="ajouter_favoris?id=<?= $annonce->id ;?>&datefavori=<?= $datefavori; ?>&page=mes"><img title="Ajouter aux favoris" src="http://localhost:8000/assets/icons_logos/favorite.png" alt="star favorite"><a/><p class="ref">Ref. : <?= $annonce->ref; ?></p></div>
        <p class="titre"><a href="annonce?id=<?= $annonce->id; ?>"><?= $annonce->titre; ?></a></p>
        <p class="photos"><img src="http://localhost:8000/img/<?= $annonce->image; ?>" alt="image de l'annonce"></p>
        <p class="message"><?= $annonce->message;?></p>
        <p class="date"><span>Date de l'envoi</span> <?= $annonce->dateenvoi; ?></p>
        <p class="modsup"><button title="Modifier l'annonce"><a href="publication?id=<?php echo $annonce->id."&titre=".$annonce->titre."&message=".$annonce->message."&ref=".$annonce->ref."&image=".$annonce->image."&mode=mod"; ?>">Modifier</a></button><button title="Supprimer l'annonce"><a href="suppression_annonce?id=<?= $annonce->id;?>"> Supprimer </a></button></p>
    </article>
<?php
}
?>

</section>

<?php include_once __DIR__."/../templates/footer.php"; ?>

<?php include_once "footer.php"; ?>

