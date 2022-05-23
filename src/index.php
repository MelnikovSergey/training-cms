<?php

include_once 'config/Database.php';
include_once 'controllers/Articles.php';

$database = new Database();
$db = $database->getConnection();

$article = new Articles($db);
$result = $article->getArticles();

?>

<div id="blog">

<?php

while($post = $result->fetch_assoc()) {

	$date = date_create($post['created']);
	$message = str_replace("\n\r", "<br><br>", $post['message']);

	<section class="blog-post">
 		<h3><a href="view.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
 		
 		<em><strong>Категория:</strong><a href="#" target="_blank"><?php echo $post['category']; ?></a></em>

		<em><strong>Дата:</strong><?php echo date_format($date, "d F Y"); ?></em>

 		<article>
 			<p><?php echo $message; ?></p>
 		</article>

                <a href="view.php?id=<?php echo $post['id']; ?>" class="btn btn-more">Читать далее →</a>
	</section>
        
<?php } ?>      

</div>