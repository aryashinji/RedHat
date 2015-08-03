<?php
	$db_username = "username"; // username
	$db_password = "password"; // password
	$db_name = "oci:RedHat=XE"; // interface_yang_digunakan:nama database:sid
	$db = new PDO($db_name,$db_username,$db_password); // instansiasi object database
?>