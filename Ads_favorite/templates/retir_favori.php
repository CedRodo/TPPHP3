<?php include_once 'header.php';
$favtitre = $entry->titre;
$index = $_GET['pos'];
unset($_SESSION['favoris'][$index]);
$tab_retire = $_SESSION['favoris'];
$_SESSION['favoris'] = $tab_retire;


?>

<p style="color: white; font-size: 20px;">Le favori "<?= $favtitre; ?>" a été retiré.</p>

<p style="color: white; font-size: 20px;">Retour vers l'<a style="text-decoration: none; color: yellow;" href="/">accueil</a> ou <a style="text-decoration: none; color: yellow;" href="mes_annonces">mes annonces</a>.</p>

<?php include_once 'footer.php'; ?>