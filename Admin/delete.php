<?php
$delete_id=$_GET["delete_id"];
include("config.php");

$stmt = $conn->prepare("DELETE FROM items WHERE id=?");

$stmt->bind_param("i",$delete_id);

$stmt->execute();

header("Location:manageproduct.php");
?>

