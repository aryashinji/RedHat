<?php
	include ('Oracle.php');
	$query = "update reservasi set  ID_Reservasi = '$_GET[ID_Reservasi]',
									ID_Tempat = '$_GET[ID_Tempat]',
									Nama_Pemesan = '$_GET[Nama_Pemesan]',
									Pemesanan = to_date('$_GET[Pemesanan]','yyyy-mm-dd'),
									Waktu_Pesan = $_GET[Waktu_Pesan],
									Jumlah_Orang = '$_GET[Jumlah_Orang]'
			  where ID_Reservasi = '$_GET[ID_Reservasi]'";
	//echo $query;
	//$db->exec($query);
	if($db->exec($query))
	{
		header("Location:Pegawai_Reservasi_Update.php?status=ok");	
	}
	else
	{
		header("Location:Pegawai_Reservasi_Update.php?status=gagal");
	}
	
?>