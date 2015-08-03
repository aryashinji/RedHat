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
            <li >
              <a href="Pegawai_Reservasi.php">Reservasi</a>
            </li>
			<li >
              <a href="Pegawai_Reservasi_Update.php">Update</a>
            </li>
			<li >
              <a href="Pegawai_Reservasi_Delete.php">Delete</a>
            </li>
			<li class="active">
              <a href="Pegawai_Reservasi_List.php">List Reservasi</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
	 <div class="row" style="padding-top:100px;">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 align="center">Daftar Reservasi</h3>
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">ID Reservasi</th>
                  <th style="text-align:center;">ID Tempat</th>
                  <th style="text-align:center;">Nama Pemesan</th>
                  <th style="text-align:center;">Pemesanan</th>
				  <th style="text-align:center;">Waktu Pesan</th>
                  <th style="text-align:center;">Jumlah Orang</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include "Oracle.php";
                  $rows = $db->query("select * from reservasi")->fetchAll(); // multiple rows
                  foreach((array)$rows as $row) {
                    $ID_Reservasi = $row['ID_RESERVASI'];
                    $ID_Tempat = $row['ID_TEMPAT'];
                    $Nama_Pemesan = $row['NAMA_PEMESAN'];
                    $Pemesanan = $row['PEMESANAN'];
                    $Waktu_Pesan = $row['WAKTU_PESAN'];
					$Jumlah_Orang = $row['JUMLAH_ORANG'];
                    echo "<tr><td>"."$ID_Reservasi"."</td>";
                    echo "<td>"."$ID_Tempat"."</td>";
                    echo "<td>"."$Nama_Pemesan"."</td>";
                    echo "<td>"."$Pemesanan"."</td>";
                    echo "<td>"."$Waktu_Pesan"."</td>";
					echo "<td>"."$Jumlah_Orang"."</td></tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>