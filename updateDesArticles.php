<?php 
include 'blogConnex.php';
$id = $_GET['id'];
$toUpdate = mysqli_query($bdd, "SELECT title, content, author FROM Article WHERE id = $id");
$gonnaUpdate = mysqli_fetch_assoc($toUpdate);

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
		echo "Your article as been modify";
		$blogTitle = mysqli_real_escape_string($bdd, $_POST[blogTitle]);
		$blogContent = mysqli_real_escape_string($bdd, $_POST[blogContent]);
		$blogAuthor = mysqli_real_escape_string($bdd, $_POST[blogAuthor]);
		mysqli_query($bdd,"UPDATE Article SET title='$blogTitle', content='$blogContent', author='$blogAuthor' WHERE id='$id'");
		header('Location: listeDesArticles.php'); 
	}
}
?>

<!DOCTYPE html>
<html>
<form action="" method="POST">
	<label for="title">Title :</label>
	<input type="text" name="blogTitle" id="userBlogTitle" value="<?php echo $gonnaUpdate['title'] ?>"/><br>
	<label for="content">Your article :</label>
	<textarea name="blogContent" id="userBlogContent">
		<?php echo $gonnaUpdate['content'] ?>
	</textarea>
	<p></p>
	<label for="author">Your name :</label>
	<input type="text" name="blogAuthor" id="userBlogAuthor" value="<?php echo $gonnaUpdate['author'] ?>">
	<button type="submit">Modify your article</button>

</form>
</html>