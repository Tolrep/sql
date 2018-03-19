<?php 
include "blogConnex.php";
$id = $_GET['id'];

if($_POST){
	if(isset($_POST['del'])){
	mysqli_query($bdd, "DELETE FROM Article WHERE id = '$id'");
	header('Location: listeDesArticles.php');
	}
	if(isset($_POST['anul'])){
		header('Location: listeDesArticles.php');
	}
}

?>

<p>Voulez-vous vraiment supprimer?</p>
<form action="" method="POST">
	<input type="submit" name="del" value="Supprimer"/>
</form>

<form action="" method="POST">
	<input type="submit" name="anul" value="Annuler"/>
</form>