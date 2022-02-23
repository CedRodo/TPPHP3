<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="http://localhost:8000/assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="http://localhost:8000/assets/bootstrap/js/bootstrap.js" />
    <link rel="stylesheet" href="http://localhost:8000/assets/css/style.css" >
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Ads Favorite</title>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" style="color: green;" href="#">ADS FAVORITES</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publication">Publier une annonce</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="mes_annonces">Mes annonces</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consulter les annonces
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Les annonces récentes</a>
          <a class="dropdown-item" href="#">Les meilleures annonces</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="favoris">Mes favoris</a>
        </div>
            <li class="nav-item">
        <a class="nav-link" href="favoris">Mes favoris</a>
      </li>
            <li style="width: 1100px;" class="nav-item">
            <div style="padding-top: 5px; text-align: end;">
              <?php if (isset($_SESSION['name'])==true) { ?>
              <p style="white-space: pre-wrap; display: inline;"><img src="http://localhost:8000/assets/icons_logos/user.png" alt="nom de l'utilisateur"> Bonjour <?php echo $_SESSION['name'];?>   <a href="deconnexion"><img src="http://localhost:8000/assets/icons_logos/logout.png" alt="se déconnecter"></a></p>
              <?php } ?>
              <p style="white-space: pre-wrap; display: inline;">  <a href="connexion"><img src="http://localhost:8000/assets/icons_logos//login.png" alt="se connecter"></a>  <a href="inscription"><img src="http://localhost:8000/assets/icons_logos/inscription.png" alt="s'inscrire"></a></p>
            </div>
      </li>
      </li>
    </ul>
  </div>
</nav>
</header>
<main>
  <!-- <link rel="icon" type="image/png" sizes="16x16" href="http://localhost:8000/assets/icons_logos/logophp.png"> -->