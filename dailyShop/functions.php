<?php include("config.php"); ?>
<?php

function get_products($min_limit,$max_limit)
{
	global $conn;
	//$id=1;

	$stmt = $conn->prepare("SELECT * FROM dailyshop LIMIT ?,?");
	//echo "string";
	if(false===$stmt)
	{
		return false;
	}

	$params=$stmt->bind_param('ii',$min_limit,$max_limit);
	//echo "string";
	if(false===$params)
	{
		return false;
	}

	//$id=$product_id;
	//echo $id;
	$stmt->bind_result($id2,$name2,$new_price2,$old_price2,$image2,$category2);
	$product=array();
	//print_r($product);
	$execute=$stmt->execute();
	//echo "string";
	if(false===$execute)
	{
		return false;
	}
	while($stmt->fetch())
	{
		$product[]=array("name"=>$name2,"new_price"=>$new_price2,"old_price"=>$old_price2,"category"=>$category2,"image"=>$image2,"id"=>$id2);
	}
	return $product;
	//print_r($product);
}

function count_products()
{
	global $conn;

	$stmt=$conn->prepare("SELECT count(*) FROM dailyshop");
	if(false===$stmt)
	{
		return false;
	}
	$stmt->bind_result($count);

	$execute=$stmt->execute();
	if(false===$execute)
	{
		return false;
	}
	while($stmt->fetch())
	{
		$total_records=$count;
	}
	return $total_records;
}

function category()
{
	global $conn;
	$parent_id=0;

	$stmt=$conn->prepare("SELECT category FROM categories WHERE parent_id=?");
	//echo "string2";
	if(false===$stmt)
	{	//echo "string";
		return false;
	}
	//echo "string1";
	$params=$stmt->bind_param("i",$parent_id);
	//echo "string";
	if(false===$params)
	{
		return false;
	}
	$stmt->bind_result($category1);

	$execute=$stmt->execute();
	if(false===$execute)
	{
		return false;
	}

	$dropdown = array();

	while($stmt->fetch())
	{
		$dropdown[] = array("category"=>$category1);
	}
	return $dropdown;
	//print_r($dropdown);
}
function count_category($check=array())
{
	global $conn;
	$query1=array();

	$s="SELECT count(*) FROM dailyshop ";
	$sql_cat="WHERE category IN (";
	foreach($check as $value)
	{
		$query1[]="'$value'";
	}
	$query2=implode(',', $query1);
	$sql_cat.=$query2.")";
	$s.=$sql_cat;
	//echo $s; die;
	$stmt=$conn->prepare($s);
	if(false===$stmt)
	{
		return false;
	}
	$stmt->bind_result($count_1);
	$execute=$stmt->execute();
	if(false===$execute)
	{
		return false;
	}
	while($stmt->fetch())
	{
		$count_2=$count_1;
	}
	//echo $count_2;
	return $count_2;
}

function multiple_category($check=array(),$min_limit,$max_limit)
{
	global $conn;
	$product_category = array();

	$query1=array();

		$sql="SELECT * FROM dailyshop ";
					
		$sql_cat="WHERE category IN (";
		foreach ($check as $value) 
		{
			$query1[] = "'$value'";
        }

        	$query2 = implode(',',$query1);
        	$sql_cat.=$query2.") LIMIT ?,?";
        	$sql.=$sql_cat;
            //echo $sql; die;
        	$stmt = $conn->prepare($sql);
        	if(false===$stmt)
        	{
        		return false;
        	}
        	$params=$stmt->bind_param("ii",$min_limit,$max_limit);
        	if(false===$params)
        	{
        		return false;
        	}
        	$stmt->bind_result($c_id,$c_name,$c_new_price,$c_old_price,$c_image,$c_category);
        	$execute = $stmt->execute();
        	if(false===$execute)
        	{
        		return false;
        	}
        	while($stmt->fetch())
        	{
        		$product_category[] = array("id"=>$c_id,"name"=>$c_name,"new_price"=>$c_new_price,"old_price"=>$c_old_price,"image"=>$c_image,"category"=>$c_category);
        	}
        	//print_r($product_category); die;
        	return $product_category;
}

function get_product($c_id)
{
	global $conn;
	$items = array();

	$stmt=$conn->prepare("SELECT id,name,new_price,old_price,image,category FROM dailyshop WHERE
		id=?");
	if(false===$stmt)
	{
		return false;
	}
	$params=$stmt->bind_param("i",$c_id);
	if(false===$params)
	{
		return false;
	}
	$stmt->bind_result($id_1,$name_1,$new_price_1,$old_price_1,$image_1,$category_1);
	$execute=$stmt->execute();
	if(false===$execute)
	{
		return false;
	}
	while($stmt->fetch())
	{
		$items[]=array("id"=>$id_1,"name"=>$name_1,"new_price"=>$new_price_1,"old_price"=>$old_price_1,"image"=>$image_1,"category"=>$category_1);
	}
	$_SESSION['total_price']+=$items[0]["new_price"];
	return $items;
	//print_r($items);die;
}

function product_Exists($c_id)
{
	if(isset($_SESSION['cart']))
	{
		$cart=$_SESSION['cart'];

		foreach ($cart as $key => $value)
		{
			if($value['id']==$c_id)
			{
				return true;
			}	
		}
		return false;
	}
}

function product_update($c_id)
{
	$cart=$_SESSION['cart'];

	foreach ($cart as $key => $value) 
	{
		if($value['id']==$c_id)
		{
			$cart[$key]['quantity'] +=1;
			break;
		}
	}
	return $cart;
}

 ?>