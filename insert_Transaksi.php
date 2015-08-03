<?php
	include ('Oracle.php');
	$query = "insert into transaksi values('$_POST[ID_Transaksi]','$_POST[ID_Pegawai]','$_POST[ID_Tempat]',to_date('$_POST[Tanggal]','yyyy-mm-dd'),'0')";
	$pesan = "update tempat  set Status = '1' where  ID_Tempat = '$_POST[ID_Tempat]'";
	$db->exec($pesan);
	//echo $query;
	//echo $pesan;
	//$db->exec($query)
	if($db->exec($query))
	{
		header("Location:Pegawai_Menu.php?status=ok");	
	}
	else
	{
		header("Location:Pegawai_Transaksi.php?status=gagal");
	}
?>