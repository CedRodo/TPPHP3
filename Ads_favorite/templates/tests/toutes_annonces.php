<?php include_once 'header.php'; ?>

<h1>Toutes les annonces</h1>

<section id="listeAnnonces">
<?php
    date_default_timezone_set('Europe/Paris');
    $datefavori = date('d/m/Y');
foreach($annonces as $annonce){ ?>
    <article class="annonce">
        
        <div class="art_icons">
            <a class="star-favorite" href="ajouter_favoris?id=<?= $annonce->id ;?>&datefavori=<?= $datefavori; ?>&page=toutes"><img title="Ajouter aux favoris" src="http://localhost:8000/assets/icons_logos/favorite.png" alt="star favorite"><a/><p class="ref">Ref. : <?= $annonce->ref; ?></p>
        </div>
        <div class="titre">
            <p><a href="annonce?id=<?= $annonce->id; ?>"><?= $annonce->titre; ?></a></p>
        </div>
        <div class="photos">
            <img src="http://localhost:8000/img/<?= $annonce->image; ?>" alt="image de l'annonce"></img>
        </div>
        <div class="message">
            <p><?= $annonce->message;?></p>
        </div>
        <div class="date">
            <p><span>Date de l'envoi</span> <?= $annonce->dateenvoi; ?></p>
        </div>
        <div class="modsup">
            <?php if ($annonce->email_user == $_SESSION['user']) { ?>
            <p><button title="Modifier l'annonce"><a href="publication?id=<?php echo $annonce->id."&titre=".$annonce->titre."&message=".$annonce->message."&ref=".$annonce->ref."&image=".$annonce->image."&mode=mod"; ?>">Modifier</a></button><button title="Supprimer l'annonce"><a href="suppression_annonce?id=<?= $annonce->id;?>"> Supprimer </a></button></p>
            <?php } else if ($annonce->email_user != $_SESSION['user']) { ?>
            <p><button title="Contacter l'expéditeur"><a href="#">Contacter</a></button></p>
        </div>
        <?php } ?>
    </article>
<?php
}
?>

</section>

<?php include_once __DIR__."/../templates/footer.php"; ?>

<?php include_once "footer.php"; ?>