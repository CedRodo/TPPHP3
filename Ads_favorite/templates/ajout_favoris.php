<?php include_once 'header.php';

include_once __DIR__."/../src/entity/Annonces.php";
$favorites = Annonces::retrieveByPK($_GET['id']); ?>


<img style="margin: 60px; max-width: 600px;" src="http://localhost:8000/img/<?= $favorites->image; ?>" alt="l'image de l'article">

<p style="color: white; font-size: 20px;">L'article "<?= $favorites->titre; ?>" a bien été ajouté aux favoris. </p>

<p style="color: white; font-size: 20px;">Retour vers l'<a style="text-decoration: none; color: yellow;" href="/">accueil</a>, <a style="text-decoration: none; color: yellow;" href="mes_annonces">mes annonces</a> ou <a style="text-decoration: none; color: yellow;" href="favoris2">la liste des favoris</a>.</p>

<?php include_once "footer.php"; ?>