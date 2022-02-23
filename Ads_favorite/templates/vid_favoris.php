<?php include_once 'header.php';
if (isset($_SESSION['favoris'])) {
    unset($_SESSION['favoris']);
}
if (isset($_COOKIE['favoris'])) {
    unset($_COOKIE['favoris']);
    setcookie('favoris', '', time() - 3600, '/'); // empty value and old timestamp
}?>


<p style="color: white; font-size: 20px;">La liste de favoris a bien été supprimée.</p>

<p style="color: white; font-size: 20px;">Retour vers l'<a style="text-decoration: none; color: yellow;" style="text-decoration: none;" href="/">accueil</a> ou <a style="text-decoration: none; color: yellow;" style="text-decoration: none;" href="mes_annonces">mes annonces.</a>.</p>

<?php include_once 'footer.php'; ?>