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
              <a href="Daftar_List.php">List</a>
            </li>
            <li class="active">
              <a href="Daftar_Report.php">Report</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
	
	<div class="container">
	<div class="row" style="padding-top:100px;">
      <div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3 align="center"><b>Penghasilan</b></h3></br>
				<table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">ID Transaksi</th>
                  <th style="text-align:center;">ID Tempat</th>
				  <th style="text-align:center;">Tanggal</th>
				  <th style="text-align:center;">Nama Menu</th>
				  <th style="text-align:center;">Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include "Oracle.php";
				  session_start();
				  $_SESSION['bulan']=$_GET['Bulan'];
				  $_SESSION['tahun']=$_GET['Tahun'];
				  $bulan = $_GET['Bulan'];
				  $tahun = $_GET['Tahun'];
                  $rows = $db->query("select * FROM transaksi T, pemesanan P, menu M 
								WHERE T.ID_Transaksi = P.ID_Transaksi
								and P.Nama_Menu = M.Nama_Menu and TO_NUMBER(TO_CHAR(TO_DATE(T.Tanggal,'DD-MM-YY'),'YYYY')) = $tahun 
								and TO_NUMBER(TO_CHAR(TO_DATE(T.Tanggal,'DD-MM-YY'),'MM')) =  $bulan 
								and T.Status_Transaksi = '1'")->fetchAll(); // multiple rows
                  foreach((array)$rows as $row) {
                    $ID_Transaksi = $row['ID_TRANSAKSI'];
                    $ID_Tempat = $row['ID_TEMPAT'];
					$Tanggal = $row['TANGGAL'];
					$Nama_Menu = $row['NAMA_MENU'];
					$Harga = $row['HARGA'];
                    echo "<tr><td>"."$ID_Transaksi"."</td>";
                    echo "<td>"."$ID_Tempat"."</td>";
					echo "<td>"."$Tanggal"."</td>";
					echo "<td>"."$Nama_Menu"."</td>";
					echo "<td>"."$Harga"."</td></tr>";
                  }
                ?>
              </tbody>
            </table>
			<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="text-align:center;">Jumlah</th>
							
						</tr>
					</thead>
					<tbody align="center">
						<?php
							include 'Oracle.php';
							if(isset($_GET['Bulan']))
							{	
								$bulan = $_GET['Bulan'];
								$tahun = $_GET['Tahun'];
								$query = "SELECT sum (M.Harga) as jumlah
								FROM transaksi T, pemesanan P, menu M
								WHERE T.ID_Transaksi = P.ID_Transaksi
								and P.Nama_Menu = M.Nama_Menu and TO_NUMBER(TO_CHAR(TO_DATE(T.Tanggal,'DD-MM-YY'),'YYYY')) = $tahun 
								and TO_NUMBER(TO_CHAR(TO_DATE(T.Tanggal,'DD-MM-YY'),'MM')) =  $bulan 
								and T.Status_Transaksi = '1'";
							}
							else
							{
								$tahun = $_GET['tahun'];
							}
							
							//echo $query;
							$rows = $db->query($query)->fetchAll();
			                foreach ((array)$rows as $row) {
			                	$penghasilan = $row['JUMLAH'];
			                	
			                	echo "
			                	<tr>
			                		<td>"."$penghasilan"."</td>
									
			                	</tr>
			                	";
			                }
			            ?>
			       	</tbody>
			    </table>
				<form method="POST" action="pdf.php">
			   <div class="pull-right">
                  <input class="btn btn-success" type="submit" value="Convert to PDF"/>
                </div>
				 </form>
			</div>
		</div>
	</div>
</body>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>