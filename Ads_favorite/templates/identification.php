<?php include_once 'header.php'; ?>

<h2 class="formTitle">PAGE DE CONNEXION</h2>

<form class="formulaireLogin" method="post" action="connexion">
<fieldset>
    <legend style="padding-left: 10px;">Entrez vos identifiants</legend>
        <label for="mail" style="margin-left: 10px;">Votre adresse email </label> <input type="text" placeholder="Adresse email" name="mail" id="mail" value="<?php  if (isset($_SESSION['user'])==true) { echo $_SESSION['user']; } ?>" required="required" /> <br />
        <label for="password" style="margin-left: 10px;">Votre mot de passe </label> <input type="password" placeholder="Mot de passe" name="password" id="password" required="required" /> <br />
</fieldset>
<br/>    
<input class="formButton" type="submit" value="Envoyer" />
</form>  

<?php include_once 'footer.php' ?>