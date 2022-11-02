<?php 
//error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');

include 'data.php';
//include 'sqlRequests.php';

$link = mysqli_connect('localhost', $login, $password);
mysqli_select_db($link, 'o95007ds_1');
$query = '';
$page = '';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT product.*, sections.name sec_name FROM (product INNER JOIN sections ON product.sections_id = sections.id)   WHERE product.id = {$id}";
	$page = "trash/product.php";
}
elseif (isset($_GET['cat_id'])) {
	$cat_id = $_GET['cat_id'];
	$query = "SELECT product.id, product.name, product.price, i.path, (SELECT sections.name FROM sections WHERE sections.id = product.sections_id) sec_name FROM product INNER JOIN (SELECT images.path, images.id FROM images) i on i.id = product.preview_img WHERE product.sections_id = {$cat_id} ORDER BY product.id";
	$page = "trash/products_list.php";
}
else {
	$query = "SELECT DISTINCT a.id, a.name ,(SELECT COUNT(1) FROM product WHERE product.sections_id = a.sections_id) count FROM (SELECT sections.*, product.sections_id  FROM product INNER JOIN sections ON product.sections_id = sections.id) a ORDER BY count DESC" ;
	$page = "trash/categories.php";
}

$result = mysqli_query($link, $query);
if ($result == false) {
	print('NO');
}

$line = mysqli_fetch_all($result, 1);
if (count($line) == 0) {
	$page = "trash/404.php";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="trash/style.css">
	<link href="../lib/noty.css" rel="stylesheet">
	<script src="../lib/noty.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="trash/grid.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
	<header> 
		<nav>
			<?php 


			 ?>
			<a href="index.php" class="nav_main">На главную</a> 

		</nav>
		<hr>
	</header>
	<main>
		<?php include $page; ?>
	</main>
	<footer></footer>
</body>
</html>