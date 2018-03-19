<?php
include "blogConnex.php";
$blogResults = mysqli_query($bdd, "SELECT id, title, content, author FROM Article");


while ($blogDonnees = mysqli_fetch_assoc($blogResults))
{
	echo $blogDonnees['title'] . "<br>";
	echo $blogDonnees['content'] . "<br>";
	echo $blogDonnees['author'] . "<br>";
	?>
	<a href="deleteDesArticles.php?id=<?= $blogDonnees['id'] ?>">DELETE</a>
	<a href="updateDesArticles.php?id=<?= $blogDonnees['id'] ?>">UPDATE</a>
	<?php 
	echo "<br>";
}