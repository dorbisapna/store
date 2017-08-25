<?php
	$links = "";
	$page_id = $_GET['page_id'];
	$max_limit=5;
	$min_limit=($page_id-1) * $max_limit;

	$table = array();
	include("config.php");

	$stmts = $conn->prepare("SELECT count(*) FROM items");
	$stmts->bind_result($t_records);
	$stmts->execute();

	while ($stmts->fetch())
	 {
	 	$t1_records=$t_records;
	 }
	 $records=ceil($t1_records/$max_limit);

	 if($page_id < 1 || $page_id > $records)
	 {
	 	header("Location:manageproduct.php?page_id=1");
	  }

		$table = array();
		$stmt = $conn->prepare("SELECT name,price,category,image,id FROM items LIMIT ?,?");
		$stmt->bind_param("ii",$min_limit,$max_limit);
		$stmt->bind_result($name2,$price2,$category2,$image2,$id2);
		$stmt->execute();
		
		while($stmt->fetch())
		{
		$table[]=array("name"=>$name2,"price"=>$price2,"category"=>$category2,"image"=>$image2,"id"=>$id2);
		}
	
?>