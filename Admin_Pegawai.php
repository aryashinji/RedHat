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
            <li class="active">
              <a href="Admin_Pegawai.php">Pegawai</a>
            </li>
			<li >
              <a href="Admin_Pegawai_Update.php">Update</a>
            </li>
			<li >
              <a href="Admin_Pegawai_Delete.php">Delete</a>
            </li>
            <li>
              <a href="Admin_Menu.php">Menu</a>
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
          <form method="POST" action="Insert_Pegawai.php" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label">ID Pegawai</label>
              <div class="controls">
                <input class="form-control" type="text" name="ID_Pegawai">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Nama Pegawai</label>
              <div class="controls">
                <input class="form-control" type="text" name="Nama">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Alamat</label>
              <div class="controls">
                <input class="form-control" type="text" name="Alamat">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Tanggal Lahir</label>
              <div class="controls">
                <input class="form-control" type="date" name="Tanggal_Lahir">
              </div>
            </div>
			<div class="form-group">
              <label class="control-label">Jenis Kelamin</label>
              <div class="radio">
                <label>
                  <input type="radio" name="Jenis_Kelamin" value="Pria">Pria</label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="Jenis_Kelamin" value="Wanita">Wanita</label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">No Telepon</label>
                  <div class="controls">
                    <input class="form-control" type="text" name="No_Telepon" value="+62">
                  </div>
                </div>
				<div class="form-group">
              <label class="control-label">Agama</label>
              <div class="controls">
                <input class="form-control" type="text" name="Agama">
              </div>
			  <div class="form-group">
			  <label class="control-label">Foto</label>
			 <!-- <form enctype="multipart/form-data" action="upload_foto_pegawai.php" method="post"> !-->
				<input type="file" name="foto" />
			<!--	</form> !-->
				</div>
                <div class="pull-right">
                  <a class="btn btn-danger">Batal</a>
                  <input class="btn btn-success" type="Submit" value="Submit" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>