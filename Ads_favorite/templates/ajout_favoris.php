<?php include_once 'header.php';

include __DIR__."/../src/entity/Annonces.php";
$favorites = Annonces::retrieveByPK($_GET['id']); ?>

<img style="margin-top: 50px;" src="http://localhost:8000/img/<?= $favorites->image; ?>" alt="l'image de l'article">

<p style="color: white; font-size: 20px;">L'article "<?= $favorites->titre; ?>" a bien été ajouté aux favoris. </p>

<p style="color: white; font-size: 20px;">Retour vers l'<a style="text-decoration: none; color: yellow;" href="/">accueil</a>, la <a style="text-decoration: none; color: yellow;" href="annonces">liste des annonces</a> ou <a style="text-decoration: none; color: yellow;" href="favoris">la liste des favoris</a>.</p>

<?php include_once "footer.php"; ?>