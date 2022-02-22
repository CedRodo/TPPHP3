<?php include_once "header.php";
 

if (isset($_SESSION['user'])==false){

require 'formulaire.php';

}
else { ?>
  <p style="color: white; font-size: 20px;">Vous êtes connecté.</p>
<?php } ?>


<?php include_once "footer.php"; ?>