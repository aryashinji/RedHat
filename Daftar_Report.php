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
	<div class="row" style="padding-top:100px;">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-body">
		  <form method="GET" action="Report.php">
				<div class="form-group">
					<label class="control-label">Bulan</label>
					<div class="controls">
						<input class="form-control" type="text" name="Bulan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Tahun</label>
					<div class="controls">
						<input class="form-control" type="text" name="Tahun" required>
					</div>
				</div>
				
				<div class="pull-right">
					<input class="btn btn-primary" type="submit" value="Lihat"/>
				</div>
			</form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>