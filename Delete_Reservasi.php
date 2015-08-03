<?php
	include "Oracle.php";
	$query = "delete from reservasi where ID_Reservasi = '$_GET[ID_Reservasi]'";
	//echo $query;
	if($db->exec($query))
	{
		header("Location:Pegawai_Reservasi_Delete.php?status=ok");
	}
	else
	{
		header("Location:Pegawai_Reservasi_Delete.php?status=gagal");
	}
	
?>