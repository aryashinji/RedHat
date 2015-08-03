<?php
	include "Oracle.php";
	$query = "delete from menu where Nama_Menu = '$_GET[Nama_Menu]'";
	//echo $query;
	if($db->exec($query))
	{
		header("Location:Admin_Menu_Delete.php?status=ok");
	}
	else
	{
		header("Location:Admin_Menu_Delete.php?status=gagal");
	}
	
?>