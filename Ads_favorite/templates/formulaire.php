<?php if (isset($_GET['id'])==true) { $id = $_GET['id']; } ?>

<div>
    <h1>INSCRIPTION</h1>

<form class="formulaireSub" method="POST" action="<?php echo "inscription"; ?>">
<fieldset>
    <legend>Veuillez remplir les champs d'inscription :</legend>
        <label for="prenom">Votre prénom : </label> <input type="text" placeholder="Prénom" name="prenom" id="prenom" required="required" /> <br />
        <label for="name">Votre nom : </label> <input type="text" placeholder="Nom" name="nom" id="nom" required="required" /> <br />
        <label for="mail">Votre adresse mail : </label> <input type="text" placeholder="Adresse mail" name="mail" id="mail" /> <br />
        <label for="password">Votre mot de passe : </label> <input type="password" placeholder="Mot de passe" name="password" id="password" required="required" /> <br />
        <label for="age">Votre âge :</label> <input type="number" name="age" id="age" placeholder="Âge" value="18" min="18" max="100" step="1" />
</fieldset>
<br/>    
<input class="formButton" type="submit" value="Envoyer" />
</div>
</form>