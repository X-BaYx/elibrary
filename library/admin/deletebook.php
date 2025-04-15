<?php
	include 'db.php';
	$id = $_GET['id'];
	$sql = "Delete from books where md5(id) = '$id'";
	if($db_link->query($sql) === true){
		echo "Sucessfully deleted data"or die("error".mysqli_errno($db_link));
		header('location:updatebooks.php');
	}else{
		echo "Oppps something error "or die("error".mysqli_errno($db_link));
	}
	$db_link->close();
?>