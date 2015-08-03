<!DOCTYPE html>
<html lang="en" class="no-js">
<title>SIBea ITS</title>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Sistem Informasi Beasiswa ITS</title>
		<meta name="description" content="Fullscreen Pageflip Layout with BookBlock" />
		<meta name="keywords" content="fullscreen pageflip, booklet, layout, bookblock, jquery plugin, flipboard layout, sidebar menu" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.custom.css" />
		<link rel="stylesheet" type="text/css" href="css/bookblock.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<link rel="stylesheet" type="text/css" href="css/plus.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<script src="js/modernizr.custom.79639.js"></script>
	</head>
	<body>
		<div id="container" class="container">	

			<div class="menu-panel">
				<h3>Menu</h3>
				<nav id="menu-toc" class="menu-toc">
					<a href="Daftar.html" class="icon-home">Daftar</a>
					<a href="Beasiswa.html" class="icon-news">Beasiswa</a>
					<a href="Sponsor.html" class="icon-image">Sponsor</a>
					<a href="index4.html" class="icon-star">Pengumuman</a>
					<a href="index5.html" class="icon-lock">Status Dana</a>
				</nav>
			</div>

			<div class="bb-custom-wrapper">
				<div id="bb-bookblock" class="bb-bookblock">
					<div class="bb-item" id="item1">
						<div class="content">
							<div class="scroller">
								<h2>Daftar</h2>
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
              </tbody>
            </table>
			<table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">Total Harga</th>
                </tr>
              </thead>
              <tbody>
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

				<span id="tblcontents" class="menu-button">Table of Contents</span>

			</div>
				
		</div><!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquery.mousewheel.js"></script>
		<script src="js/jquery.jscrollpane.min.js"></script>
		<script src="js/jquerypp.custom.js"></script>
		<script src="js/jquery.bookblock.js"></script>
		<script src="js/page.js"></script>
		<script>
			$(function() {

				Page.init();

			});
		</script>
	</body>
</html>
