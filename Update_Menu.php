<?php
	include ('Oracle.php');
	$query = "update menu set 	Nama_Menu = '$_GET[Nama_Menu]',
									Harga = $_GET[Harga],
									Stok = $_GET[Stok]
			  where Nama_Menu = '$_GET[Nama_Menu]'";
	//echo $query;
	//$db->exec($query);
	if($db->exec($query))
	{
		header("Location:Admin_Menu_Update.php?status=ok");	
	}
	else
	{
		header("Location:Admin_Menu_Update.php?status=gagal");
	}
	
?>