<?php
include("Data.php");

$id = $_GET['id'];

$sql = "UPDATE list SET status = 1 WHERE id = $id";
mysqli_query($Data, $sql) or die("query failed");

header("Location: index.php");
