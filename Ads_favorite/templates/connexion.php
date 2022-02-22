<?php include_once "header.php";
if (($emailUtilLog==$emailUtilTable) && (password_verify($mdpUtilLog, $mdpUtilTable))) { ?>
    <p style="color: white; font-size: 20px;">Bonjour, <?php echo $prenomUtilTable." ".$nomUtilTable; ?> ! Vous pouvez <a style="color: yellow; text-decoration: none;" href="publication">publier</a> ou <a style="color: red; text-decoration: none" href="mes_annonces">consulter</a> vos annonces.</p>
<?php   include_once __DIR__.'/../src/entity/Utilisateur.php';
        $utilisateur = Utilisateur::retrieveByMail($_POST['mail'], SimpleOrm::FETCH_ONE);
        $_SESSION['user']=$_POST['mail'];
        $_SESSION['name']="$prenomUtilTable $nomUtilTable";
        $_SESSION['id']=$utilisateur->id;
} else if ($emailUtilLog!=$emailUtilTable) { ?><p style="color: white; font-size: 20px;">Identifiant de connexion invalide.</p>
<p style="color: white; font-size: 20px;">Veuillez vous reconnecter.</p><button><a href="connexion" style="text-decoration: none; color: yellow;">Retour à la connexion</a></button>
<?php } else { ?>
    <p style="color: white; font-size: 20px;">Mot de passe invalide.</p>
    <p style="color: white; font-size: 20px;">Veuillez vous reconnecter.</p><button><a href="connexion" style="text-decoration: none; color: yellow;">Retour à la connexion</a></button>

<?php } ?>
<br/>
<br/>
<br/>

<?php include_once "footer.php"; ?>