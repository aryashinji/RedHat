<?php
	include ('oracle.php');
	$query = "insert into menu values('$_POST[Nama_Menu]',$_POST[Harga],$_POST[Stok])";
	//echo $query;
	if($db->exec($query))
	{
		header("Location:Admin_Menu.php?status=ok");	
	}
	else
	{
		header("Location:Admin_Menu.php?status=gagal");
	}
	
?>