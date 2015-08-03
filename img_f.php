<?php
	if (!isset($_GET['id'])) {
		header('Status: 404 Not Found');
		die();
	}
	else {
		$c = oci_pconnect('username','password','localhost/XE');
		$s = oci_parse($c, 'select foto from pegawai where ID_Pegawai = :bv_id');
		oci_bind_by_name($s, ':bv_id', $_GET['id']);
		oci_execute($s);
		$row = oci_fetch_row($s);
		if ($row && $row[0]) {
			$img = $row[0]->load();
			header('Content-type: image/jpeg');
			print $img;
		}
		else {
			header('Status: 404 Not Found');
		}
	}
?>