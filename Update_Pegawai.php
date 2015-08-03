<?php
	include ('konek.php');
	//echo $_POST[Tanggal_Lahir];var_dump($_FILES);
	$foto = file_get_contents($_FILES['foto']['tmp_name']);
	$query = oci_parse($conn, "update pegawai set 	Nama = '$_POST[Nama]',
									Alamat = '$_POST[Alamat]',
									Tanggal_Lahir = to_date('$_POST[Tanggal_Lahir]','yyyy-mm-dd'),
									Jenis_Kelamin = '$_POST[Jenis_Kelamin]',
									No_Telepon = '$_POST[No_Telepon]',
									Agama = '$_POST[Agama]',
									foto = empty_blob() where ID_Pegawai = '$_POST[ID_Pegawai]' returning foto into :foto1");
	$blob = oci_new_descriptor($conn, OCI_D_LOB);
	oci_bind_by_name($query, ':foto1', $blob, -1, OCI_B_BLOB);
	$res = oci_execute($query, OCI_DEFAULT);
	if ($blob->save($foto)) {
		oci_commit($conn);
	}
	$blob->free();
	//$db->exec($query);
	if($res)
	{
		header("Location:Admin_Pegawai_Update.php?status=ok");	
	}
	else
	{
		header("Location:Admin_Pegawai_Update.php?status=gagal");
	}
	
?>