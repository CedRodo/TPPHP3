<?php include_once 'header.php'; ?>

<h1 style="color: white; margin-left: 10px;">Publier votre annonce</h1>

<?php if (isset($_GET['mode'])) { ?> <h2 style="color: yellow; text-align: center">Modification</h2> <?php } ?>

<div id="wrapper">

	<form enctype="multipart/form-data" id="paper" method="POST" action="enregistrer_annonce?id=<?php if (isset($_GET['mode'])) { echo $_GET['id']; } ?>&ref=<?php if (isset($_GET['mode'])) { echo $modRef; } else { echo rand(10000,99999); } ?>&mode=<?php if (isset($_GET['mode'])) { echo 'mod'; } ?>">
		<div id="margin">Titre: <input id="title" type="text" name="titre" <?php if (isset($_GET['mode'])) { ?> value="<?= $modTitre; ?>" <?php } ?> required="required"></div>
		<textarea style="white-space: pre-wrap;" placeholder="Vous pouvez publier votre annonce ici" id="text" name="message" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px;" required="required"><?php if (isset($_GET['mode'])) { echo $modMessage; } ?></textarea>  
		<br>
		<?php if (isset($_GET['mode'])) { ?> <p style="text-align: center;"><img style="width: 300px;" src="<?php echo "http://localhost:8000/img/".$modImage; ?>" alt="image de l'annonce"> <?php } ?></p>
		<p style="color: white;"><input type="file" name="image" id="imageupload"><input id="button" type="submit" value="Publier"></p>
		
	</form>

</div>
<br/>


<?php include_once "footer.php"; ?>