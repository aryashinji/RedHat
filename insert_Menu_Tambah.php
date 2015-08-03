<?php
	include ('Oracle.php');
	$query = "insert into pemesanan values('$_POST[ID_Transaksi]','$_POST[Nama_Menu]')";
	$kurang = "update menu 
				set Stok = (
				select sum(Stok - 1) as hasil
				from menu
				where Nama_Menu = '$_POST[Nama_Menu]'
				)
				where Nama_Menu = '$_POST[Nama_Menu]'";
	$db->exec($kurang);
	//echo $query;
	//echo $pesan;
	//$db->exec($query)
	if($db->exec($query))
	{
		header("Location:Pegawai_Menu.php?status=ok");	
	}
	else
	{
		header("Location:Pegawai_Menu.php?status=gagal");
	}
?>