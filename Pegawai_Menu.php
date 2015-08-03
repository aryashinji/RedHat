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
            <li>
              <a href="index.php">Home</a>
            </li>
            <li class="active">
              <a href="Pegawai_Transaksi.php">Transaksi</a>
            </li>
			<li >
              <a href="Pegawai_Transaksi_Update.php">Update Transaksi</a>
            </li>
			<li >
              <a href="Pegawai_Transaksi_Denda.php">Catat Denda</a>
            </li>
            <li >
              <a href="Pegawai_Reservasi.php">Reservasi</a>
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
            <b>Berhasil!</b> Data Telah Dimasukkan...
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="gagal"){
            echo "<div class='alert alert-dismissable alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Gagal!</b> Data Gagal Dimasukkan...
            </div>";
           }
          ?>
		  
          <form method="POST" action="insert_Menu_Tambah.php">
            <div class="form-group">
              <label class="control-label">ID Transaksi</label>
              <select class="form-control" name='ID_Transaksi'>
               <?php
                    include "Oracle.php";
                    $rows = $db->query("Select * from transaksi where Status_Transaksi = 0")->fetchAll(); // multiple rows
                    foreach((array)$rows as $row) {
                      $ID_Transaksi = $row['ID_TRANSAKSI'];
					  
                      echo "<option ";
					  if(isset($_GET['ID_Transaksi']))
							if($ID_Transaksi == $_GET['ID_Transaksi']) echo 'selected';
					  echo " value='$ID_Transaksi'>"."$ID_Transaksi"."</option>";
                    }
                    ?>
					</select>
            </div>
            <div class="form-group">
              <label class="control-label">Nama_Menu</label>
              <select class="form-control" name='Nama_Menu'>
               <?php
                    include "Oracle.php";
                    $rows = $db->query("Select * from menu where Stok != 0")->fetchAll(); // multiple rows
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
                <div class="pull-right">
                  <input class="btn btn-success" type="submit" value="Submit"/>
                </div>
              </form>
			  <form method="POST" action="Pegawai_Transaksi.php">
			   <div class="pull-right">
                  <input class="btn btn-success" type="submit" value="Done"/>
                </div>
				 </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>