<?php include("config.php") ?>
<?php
if(isset($_POST['submit']))
{
	$category_info = array();
	$name = $_POST['cat_name'];

	$stmt=$conn->prepare("INSERT INTO categories (category) VALUES (?)");
	$stmt->bind_param("s",$name1);
	$name1=$name;
	$stmt->execute();
	header("Location:create_category.php");
}
?>