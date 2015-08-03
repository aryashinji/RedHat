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
              <a href="Pegawai_Transaksi_Update.php">Update Transaksi</a>
            </li>
            <li >
              <a href="Pegawai_Reservasi.php">Reservasi</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
	<form method="GET" action="Update_Transaksi.php">
	 <div class="row" style="padding-top:100px;">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 align="center">Daftar pembayaran</h3>
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">ID Transaksi</th>
                  <th style="text-align:center;">ID Tempat</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include "Oracle.php";
				  session_start();
				  $_SESSION['id_transaksi']=$_GET['ID_Transaksi'];
				  $ID_Transaksi = $_GET['ID_Transaksi'];
                  $rows = $db->query("select * from transaksi where ID_Transaksi = '$ID_Transaksi'")->fetchAll(); // multiple rows
                  foreach((array)$rows as $row) {
                    $ID_Transaksi = $row['ID_TRANSAKSI'];
                    $ID_Tempat = $row['ID_TEMPAT'];
                    echo "<tr><td>"."$ID_Transaksi"."</td>";
                    echo "<td>"."$ID_Tempat"."</td></tr>";
                  }
                ?>
              </tbody>
            </table>
			<table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">Nama Makanan</th>
                  <th style="text-align:center;">Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include "Oracle.php";
				  //session_start();
				  $_SESSION['id_transaksi']=$_GET['ID_Transaksi'];
				  $ID_Transaksi = $_GET['ID_Transaksi'];
				  //echo "select * from transaksi , kerusakan, denda where ID_Transaksi = '$ID_Transaksi' and transaksi.ID_Transaksi = kerusakan.ID_Transaksi and kerusakan.Nama_Properti = denda.Nama_Properti";
                  $rows = $db->query("select * from transaksi , pemesanan, menu 
										where transaksi.ID_Transaksi = '$ID_Transaksi' and transaksi.ID_Transaksi = pemesanan.ID_Transaksi and pemesanan.Nama_Menu = menu.Nama_Menu")->fetchAll(); // multiple rows
                  
				  foreach((array)$rows as $row) {
                    $Nama_Menu = $row['NAMA_MENU'];
                    $Harga = $row['HARGA'];
                    echo "<tr><td>"."$Nama_Menu"."</td>";
                    echo "<td>"."$Harga"."</td></tr>";
                  }
                ?>
              </tbody>
            </table>
			<table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">Nama Denda</th>
                  <th style="text-align:center;">Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include "Oracle.php";
				  //session_start();
				  $_SESSION['id_transaksi']=$_GET['ID_Transaksi'];
				  $ID_Transaksi = $_GET['ID_Transaksi'];
				  //echo "select * from transaksi , kerusakan, denda where ID_Transaksi = '$ID_Transaksi' and transaksi.ID_Transaksi = kerusakan.ID_Transaksi and kerusakan.Nama_Properti = denda.Nama_Properti";
                  $rows = $db->query("select * from transaksi , kerusakan, denda 
										where transaksi.ID_Transaksi = '$ID_Transaksi' and transaksi.ID_Transaksi = kerusakan.ID_Transaksi and kerusakan.Nama_Properti = denda.Nama_Properti")->fetchAll(); // multiple rows
                  
				  foreach((array)$rows as $row) {
                    $Nama_Properti = $row['NAMA_PROPERTI'];
                    $Denda = $row['DENDA'];
                    echo "<tr><td>"."$Nama_Properti"."</td>";
                    echo "<td>"."$Denda"."</td></tr>";
                  }
                ?>
              </tbody>
            </table>
			<table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">Total Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include "Oracle.php";
				  //session_start();
				  $_SESSION['id_transaksi']=$_GET['ID_Transaksi'];
				  $ID_Transaksi = $_GET['ID_Transaksi'];
                  $rows = $db->query("select sum(m.harga) as HARGA
									  from transaksi t, pemesanan p, menu m
									  where t.id_transaksi = '$ID_Transaksi'
									  and   t.id_transaksi = p.id_transaksi
									  and   p.nama_menu = m.nama_menu")->fetch(); // multiple rows
				  $nilai = $db->query("select sum(d.denda) as HASIL_NILAI
									  from transaksi t, kerusakan k, denda d
								      where t.id_transaksi = '$ID_Transaksi'
									  and   t.id_transaksi = k.id_transaksi
									  and   k.nama_properti = d.nama_properti")->fetch(); // multiple rows
					
					$hasil =  $nilai['HASIL_NILAI']+$rows['HARGA'];
					
                  foreach((array)$hasil as $row) {
                    echo "<tr><td>"."$hasil"."</td></tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
	<div class="pull-right">
                <input class="btn btn-primary" type="submit" value="Bayar"/>
              </div>
         </form>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>