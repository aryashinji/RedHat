<?php
	include ('Oracle.php');
	$cari = $db->query("select count(ID_Reservasi) as data from reservasi 
			 where ID_Tempat = '$_POST[ID_Tempat]'
			 and   Pemesanan = to_date('$_POST[Pemesanan]','yyyy-mm-dd')
			 and   Waktu_Pesan = $_POST[Waktu_Pesan]")->fetch();
	
	$query = "insert into reservasi values('$_POST[ID_Reservasi]','$_POST[ID_Tempat]','$_POST[Nama_Pemesan]',to_date('$_POST[Pemesanan]','yyyy-mm-dd'),$_POST[Waktu_Pesan],'$_POST[Jumlah_Orang]')";
	$pesan = "update tempat  set Status = '1' where  ID_Tempat = '$_POST[ID_Tempat]'";
	$db->exec($pesan);
	//echo $cari['DATA'];
	//echo $query;
	//echo $pesan;
	//$db->exec($query)
	if($cari['DATA'] != 0)
	{
		//echo yes;
		header("Location:Index.php?status=oke");	
	}
	else
	{
		//echo no;
		if($db->exec($query))
		{
			header("Location:Index.php?status=ok");	
		}
		else
		{
			header("Location:Index.php?status=gagal");
		}
	}
	
?>