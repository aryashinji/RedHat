<?php
	include "Oracle.php";
	$query = "delete from pegawai where ID_Pegawai = '$_GET[ID_Pegawai]'";
	//echo $query;
	if($db->exec($query))
	{
		header("Location:Admin_Pegawai_Delete.php?status=ok");
	}
	else
	{
		header("Location:Admin_Pegawai_Delete.php?status=gagal");
	}
	
?>