<!doctype html>

<html>
<head>
  <title>RedHat Restaurant</title>
  <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
  <div class="container">
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">RedHat Restaurant</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li >
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="Admin_Pegawai.php">Pegawai</a>
            </li>
            <li >
              <a href="Admin_Menu.php">Menu</a>
            </li>
			<li class="active">
              <a href="Admin_Menu_Update.php">Update</a>
            </li>
			<li >
              <a href="Admin_Menu_Delete.php">Delete</a>
            </li>
			<li >
              <a href="Admin_Menu_Tambah.php">Tambah Stok</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row" style="padding-top:100px;">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-body">
            <?php
            if(isset($_GET['status']) && $_GET['status']=="ok")
            {
              echo "<div class='alert alert-dismissable alert-success'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              <b>Berhasil!</b> Data Telah Diupdate...
              </div>";
            }
            else if (isset($_GET['status']) && $_GET['status']=="gagal") {
              echo "<div class='alert alert-dismissable alert-danger'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              <b>Gagal!</b> Data Gagal Diupdate...
              </div>";
            }
            ?>
             <form method="GET" action="Update_Menu.php">
              <div class="form-group">
                <label class="control-label">Nama Menu</label>
                <div class="controls">
                  <select class="form-control" name='Nama_Menu'>
					<?php
                    include "Oracle.php";
                    $rows = $db->query("Select * from menu")->fetchAll(); // multiple rows
                    foreach((array)$rows as $row) {
                      $Nama_Menu = $row['NAMA_MENU'];
					  
                      echo "<option ";
					  if(isset($_GET['Nama_Menu']))
							if($Nama_Menu == $_GET['Nama_Menu']) echo 'selected';
					  echo " value='$Nama_Menu'>"."$Nama_Menu"."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			   <div class="form-group">
                  <label class="control-label">Harga</label>
                  <div class="controls">
                    <input class="form-control" type="text" name="Harga">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Stok</label>
                  <div class="controls">
                    <input class="form-control" type="text" name="Stok">
                  </div>
                </div>
                  <div class="pull-left">
                    <input class="btn btn-success" value="Update" type="submit">
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>