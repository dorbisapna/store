<?php
include("config.php");
if(isset($_POST['submit']))
{
$items = array();
$name = $_POST['pro_name'];
$price = $_POST['pro_price'];
$category = $_POST['pro_category'];
$filename ="";

		if($name=""|| $price=""|| $category="")
		{
			header("Location:addproducts.php?notification=0");
		}
		
        if(isset($_FILES['image']))
        {  // echo "doooo";

            if(move_uploaded_file($_FILES['image']['tmp_name'], "../Uploads/images/".$_FILES['image']['name']))
            {
                $filename = $_FILES['image']['name'];
            }
        }

        $stmt = $conn->prepare("INSERT INTO items (name , price , category, image) VALUES (?,?,?,?)");
	  	$stmt->bind_param("ssss",$name1 ,$price1 ,$category1, $image1);
	  	$name1 = $name;
	  	$price1 = $price;
	  	$category1 = $category;
	  	$image1 = $filename;
	  	$stmt->execute();
	  	header("Location:addproducts.php?notification=1");

	  }

?>