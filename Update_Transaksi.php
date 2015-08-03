<?php
	include ('Oracle.php');
	
	session_start();
	$ID_Transaksi = $_SESSION['id_transaksi'];
	echo $ID_Transaksi;
	$query = "update transaksi set 	Status_Transaksi = '1'
			  where ID_Transaksi = '$ID_Transaksi'";
	$pesan = "update tempat set status = '0' where id_tempat=(select id_tempat from transaksi where id_transaksi = '$ID_Transaksi')";
	$db->exec($pesan);
	//echo $query;
	//echo $pesan;
	//$db->exec($query);
	if($db->exec($query))
	{
		header("Location:Pegawai_Transaksi_Update.php?status=ok");	
	}
	else
	{
		header("Location:Pegawai_Transaksi_Update.php?status=gagal");
	}
	
?>