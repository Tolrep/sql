<?php

include "blogConnex.php";
if(isset($_POST)){
	$errors = [];
	if(empty($_POST[blogTitle])){
		$errors[blogTitle1] = "A title please";
	}
	if(empty($_POST[blogContent])){
		$errors[blogContent1] = "The content of your article please";
	}
	if(empty($_POST[blogAuthor])){
		$errors[blogAuthor1] = "Your name or pseudo please";
	}
	if(count($errors) == 0){
		echo "Your article as been send";
		$blogTitle = mysqli_real_escape_string($bdd, $_POST[blogTitle]);
		$blogContent = mysqli_real_escape_string($bdd, $_POST[blogContent]);
		$blogAuthor = mysqli_real_escape_string($bdd, $_POST[blogAuthor]);
		mysqli_query($bdd, "INSERT INTO Article (title, content, author) VALUES ('$blogTitle', '$blogContent', '$blogAuthor')");

	}
}

?>

<!DOCTYPE html>
<html>
<form action="" method="POST">
	<label for="title">Title :</label>
	<input type="text" name="blogTitle" id="userBlogTitle"/>
	<p></p>
	<label for="content">Your article :</label>
	<textarea name="blogContent" id="userBlogContent"></textarea>
	<p></p>
	<label for="author">Your name :</label>
	<input type="text" name="blogAuthor" id="userBlogAuthor">
	<button type="submit">Send your article</button>

</form>
</html>