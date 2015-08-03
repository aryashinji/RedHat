<?php
	include ('Oracle.php');
	$rows = $db->query("Select Stok from menu where Nama_Menu = '$_GET[Nama_Menu]'")->fetch();
	$ambil = $rows['STOK'];
	$query = "update menu set Stok = $ambil + $_GET[Stok]						
			  where Nama_Menu = '$_GET[Nama_Menu]'";
	//echo $query;
	//$db->exec($query);
	if($db->exec($query))
	{
		header("Location:Admin_Menu_Tambah.php?status=ok");	
	}
	else
	{
		header("Location:Admin_Menu_Tambah.php?status=gagal");
	}
	
?>