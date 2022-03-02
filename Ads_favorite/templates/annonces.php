<?php include_once 'header.php'; ?>

<?php if ($page = "mes") { ?> 

<h1>Mes annonces</h1>

<?php } else if ($page == "toutes") { ?>

<h1>Toutes les annonces</h1> <?php } ?>

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
            <p><a href="publication?id=<?php echo $annonce->id."&titre=".$annonce->titre."&message=".$annonce->message."&ref=".$annonce->ref."&image=".$annonce->image."&mode=mod"; ?>"><img src="http://localhost:8000/assets/icons_logos/favicon_modif.png" alt="écriture" title="Modifier l'annonce"></a><a href="suppression_annonce?id=<?= $annonce->id;?>"><img src="http://localhost:8000/assets/icons_logos/favicon_trashbin.png" alt="poubelle" title="Supprimer l'annonce"></a></p>
            <?php } else if ($annonce->email_user != $_SESSION['user']) { ?>
            <p><a href="#"><img src="http://localhost:8000/assets/icons_logos/favicon_contact3.png" alt="enveloppe" title="Contacter l'expéditeur"></a></p>
        </div>
        <?php } ?>
    </article>
<?php
}
?>

</section>

<?php include_once "footer.php"; ?>