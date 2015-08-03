<?php
$username="username"; //Nama user sama dengan skema di oracle
$password="password"; 
$database="localhost/XE"; //localhost bisa di isi dengan IP adress 

$conn=oci_connect($username,$password,$database);
?>