<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Pemilihan Pelanggan Terbaik </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/hover.zoom.js"></script>
    <script src="assets/js/hover.zoom.conf.js"></script>
    <?php
    	include "koneksi.php";
    ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Pemilihan Pelanggan Terbaik</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <?php
            $sq = mysqli_query($koneksi,"select status from tb_pengaturan where pengaturan='pengumuman'");
            $st = mysqli_fetch_array($sq);
            if($st['status']=="1"){
              ?><li><a href="pemumum.php">Pengumuman Pemenang</a></li><?php
            }
          ?>

            <li><a href="admin/login.php">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- +++++ Welcome Section +++++ -->
	<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 centered">
					<h4>Pemenang Pemilihan Pelanggan</h4>
					<hr>
				</div>


          <table class="table table-striped table-bordered data">
						    <thead>
						    <tr>
						        <th>Ranking</th>
								<th>No Pelanggan</th>
								<th>Nama</th>
								<th>Alamat Email</th>
								<th>Total Score</th>
								<th>Action </th>
								

								<!-- <th>Aksi</th> -->
						    </tr>
						    </thead>
						    <tbody>
						    <?php
						    include "koneksi.php";
							$sql = mysqli_query($koneksi,"select * from pelanggan order by vektor_v desc limit 10");
							$i = 0;
							while ($row = mysqli_fetch_array($sql)){
								$i++;
								
							?>
							<tr>
								<td><?php echo "".$i; ?></td>
								<td><?php echo $row['no_pel']; ?></td>
								<td><?php echo $row['nama']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['vektor_v']; ?></td>
								<td>
				<a class="edit" href="sendmail.php?id=<?php echo $row['no_pel']; ?>" target="_blank">Kirim Email</a></td>
<!-- 
								<td><button class="btn btn-info btn-sm" id="btn-todo">Edit</button> 
									<button class="btn btn-warning btn-sm" id="btn-todo">Hapus</button></td> -->
							<?php
							}
							
							?>

							</tr>
							</tbody>
						</table>
					</div>
				</div>	

	</div><!-- /ww -->
	
	<!-- +++++ Footer Section +++++ -->
	
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
