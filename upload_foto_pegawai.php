<?php
include ('Oracle.php');
echo "name : ". $_FILES ['file']['name']. "<br/>";
echo "size : ". $_FILES ['file']['size']. "bytes <br/>";
echo "temp name : ". $_FILES ['file']['tmp_name']. "<br/>";
echo "type : ". $_FILES ['file']['type']. "<br/>";
echo "error : ". $_FILES ['file']['error']. "<br/>";

if($_FILES['file']['type'] !="")
	{
		$source = $_FILES['file']['tmp_name'];
		$target = "file_dir/".$_FILES['file']['name'];
		
		
		move_uploaded_file($source, $target);
		
		echo"<img src='$target' width='300px' />";
	}







?>
