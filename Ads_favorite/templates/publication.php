<?php include_once 'header.php'; ?>

<h1 style="color: white; margin-left: 10px;">Publier votre annonce</h1>

<div id="wrapper">

	<form enctype="multipart/form-data" id="paper" method="POST" action="enregistrer_annonce?ref=<?php echo rand(10000,99999); ?>">
		<div id="margin">Titre: <input id="title" type="text" name="titre" required="required"></div>
		<textarea placeholder="Vous pouvez publier votre annonce ici" id="text" name="message" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px; " required="required"></textarea>  
		<br>
		<p style="color: white;"><input type="file" name="image" id="imageupload"><input id="button" type="submit" value="Publier"></p>
		
	</form>

</div>
<br/>


<?php include_once "footer.php"; ?>