<?php
include'../koneksi.php';
$id=$_GET['id'];

mysqli_query($db,
	"DELETE FROM tbarsip
	WHERE id='$id'"
);

header("location:../index.php?p=arsip");
?>