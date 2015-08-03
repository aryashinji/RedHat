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
            <li >
              <a href="Pegawai_Transaksi.php">Transaksi</a>
            </li>
            <li class="active">
              <a href="Pegawai_Reservasi.php">Reservasi</a>
            </li>
			<li >
              <a href="Pegawai_Reservasi_Update.php">Update</a>
            </li>
			<li >
              <a href="Pegawai_Reservasi_Delete.php">Delete</a>
            </li>
			<li >
              <a href="Pegawai_Reservasi_List.php">List Reservasi</a>
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
		   else if(isset($_GET['status']) && $_GET['status']=="oke")
           {
            echo "<div class='alert alert-dismissable alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Maaf!</b> Tempat dan Waktu Sudah Dipesan...
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="gagal"){
            echo "<div class='alert alert-dismissable alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Gagal!</b> Data Gagal Dimasukkan...
            </div>";
           }
          ?>
          <form method="POST" action="insert_Reservasi2.php">
            <div class="form-group">
              <label class="control-label">ID Reservasi</label>
              <div class="controls">
                <input class="form-control" type="text" name="ID_Reservasi">
              </div>
            </div>
             <div class="form-group">
              <label class="control-label">ID Tempat</label>
              <select class="form-control" name='ID_Tempat'>
               <?php
                    include "Oracle.php";
                    $rows = $db->query("Select * from tempat ")->fetchAll(); // multiple rows
                    foreach((array)$rows as $row) {
                      $ID_Tempat = $row['ID_TEMPAT'];
					  
                      echo "<option ";
					  if(isset($_GET['ID_Tempat']))
							if($ID_Tempat == $_GET['ID_Tempat']) echo 'selected';
					  echo " value='$ID_Tempat'>"."$ID_Tempat"."</option>";
                    }
                    ?>
					</select>
            </div>
            <div class="form-group">
              <label class="control-label">Nama Pemesan</label>
              <div class="controls">
                <input class="form-control" type="text" name="Nama_Pemesan">
            </div>
            <div class="form-group">
              <label class="control-label">Tanggal</label>
              <div class="controls">
                <input class="form-control" type="date" name="Pemesanan">
            </div>
            <div class="form-group">
              <label class="control-label">Pesan Start</label>
              <div class="controls">
                <input class="form-control" type="text" name="Waktu_Pesan">
            </div>
            <div class="form-group">
              <label class="control-label">Jumlah Orang</label>
              <div class="controls">
                <input class="form-control" type="text" name="Jumlah_Orang">
            </div>
                <div class="pull-right">
                  <a class="btn btn-danger">Batal</a>
                  <input class="btn btn-success" type="submit" value="Submit"/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>