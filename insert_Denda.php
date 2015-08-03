<?php
	include ('Oracle.php');
	$query = "insert into kerusakan values('$_POST[ID_Transaksi]','$_POST[Nama_Properti]')";
	//echo $query;
	//$db->exec($query)
	if($db->exec($query))
	{
		header("Location:Pegawai_Transaksi_Denda.php?status=ok");	
	}
	else
	{
		header("Location:Pegawai_Transaksi_Denda.php?status=gagal");
	}
?>