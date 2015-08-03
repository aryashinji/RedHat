<?php
	include ('konek.php');
	//echo $_POST[Tanggal_Lahir];
	//echo $_POST[Foto];
	$foto = file_get_contents($_FILES['foto']['tmp_name']);
	$query = oci_parse($conn, "insert into pegawai values('$_POST[ID_Pegawai]',
								'$_POST[Nama]','$_POST[Alamat]',to_date('$_POST[Tanggal_Lahir]','yyyy-mm-dd'),
								'$_POST[Jenis_Kelamin]','$_POST[No_Telepon]','$_POST[Agama]',empty_blob()) returning foto into :bv_foto");
	$blob = oci_new_descriptor($conn, OCI_D_LOB);
	oci_bind_by_name($query, ':bv_foto', $blob, -1, OCI_B_BLOB);
	$res = oci_execute($query, OCI_DEFAULT);
	if ($blob->save($foto)) {
		oci_commit($conn);
	}
	$blob->free();
	
	//$db->exec($query);
	if($res)
	{
		header("Location:Admin_Pegawai.php?status=ok");	
	}
	else
	{
		header("Location:Admin_Pegawai.php?status=gagal");
	}
	
?>