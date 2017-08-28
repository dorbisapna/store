<?php
$delete_category=$_GET["delete_category"];
include("config.php");

$stmt1 = $conn->prepare("DELETE FROM categories WHERE id=?");

$stmt1->bind_param("i",$delete_category);

$stmt1->execute();

header("Location:manage_category.php");
?>