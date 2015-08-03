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
            <li >
              <a href="Daftar_List_Pegawai.php">List Pegawai</a>
            </li>
            <li class="active">
              <a href="Daftar_List_Menu.php">List Menu</a>
            </li>
			<li>
              <a href="Daftar_List_Meja.php">List Meja Kosong</a>
            </li>
			<li>
              <a href="Daftar_List_Denda.php">List Denda</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
	 <div class="row" style="padding-top:100px;">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 align="center">Daftar Menu</h3>
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">Nama Menu</th>
                  <th style="text-align:center;">Harga</th>
                  <th style="text-align:center;">Stok</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include "Oracle.php";
                  $rows = $db->query("select * from menu")->fetchAll(); // multiple rows
                  foreach((array)$rows as $row) {
                    $Nama_Menu = $row['NAMA_MENU'];
                    $Harga = $row['HARGA'];
                    $Stok = $row['STOK'];
                    echo "<tr><td>"."$Nama_Menu"."</td>";
                    echo "<td>"."$Harga"."</td>";
                    echo "<td>"."$Stok"."</td></tr>";
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