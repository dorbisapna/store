<?php

		include("config.php");
		
		$product=array();
		$name3=$_POST["p_name"];
		$price3=$_POST["p_price"];
		$category3=$_POST["p_category"];
		$id3= $_POST["p_id"];
		
		$filename="";

		if(isset($_FILES['image']))
			{
	           if(move_uploaded_file($_FILES['image']['tmp_name'], "../Uploads/images/".$_FILES['image']['name']))
	           {
	                $filename = $_FILES['image']['name'];
	           }
	        }
		$stmt = $conn->prepare("UPDATE items SET name=?,price=?,category=?,image=? WHERE id=?");
		$stmt->bind_param("ssssi",$t_name,$t_price,$t_category,$t_image,$t_id);
		$t_name=$name3;
		$t_price=$price3;
		$t_category=$category3;
		$t_image=$filename;
		$t_id=$id3;
		
		$stmt->execute();

		header("Location:manageproduct.php");
?>