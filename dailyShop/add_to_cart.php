<?php
session_start();
include("config.php");
include("functions.php");

$cart = array();

if(isset($_GET['id']))
{
	$id = $_GET['id'];

	$items = get_product($id);

	foreach ($items as $key => $value) 
	{
		if($value['id']==$id)
		{
			if(product_Exists($id))
			{
				$cart = product_update($id);
				$_SESSION['cart']=$cart;
			}
			else
			{
				if(isset($_SESSION['cart']))
				{
					$cart=$_SESSION['cart'];
				}
				$value['quantity'] = 1;
				$cart[]=$value;
				$_SESSION['cart']=$cart;
			}
		}	
	}

}
//print_r($_SESSION['cart']);

if(isset($_GET['delete_id']))
{
	$delete_id=$_GET['delete_id'];
	$cart=$_SESSION['cart'];

	foreach ($cart as $key => $value) 
	{
		if($value['id']==$delete_id)
		{
			unset($cart[$key]);

			$cart = array_values($cart);
			
			$_SESSION['cart'] = $cart;
		}
	}
}



header("Location:product.php");

if($_GET['index_no']=="cart.php")
{
	header("Location:cart.php");
}

?>