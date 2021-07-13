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
    <link rel="stylesheet" href="admin/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="admin/datatables/css/jquery.dataTables.css">
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
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
				
					<div class="row mt">
				<form action="" method="POST">
						<div class="col-lg-8 col-lg-offset-2">
							<form role="form">
						<div class="form-group">
							<select class="form-control" id="exampleInputEmail1" name="pilih">
							<option value = ""> -- Pilih Periode Pemenang -- </option>
									<?php
											include "koneksi.php";
											$sql = "select tahun_periode from periode_pemenang GROUP BY tahun_periode";
											$query = mysqli_query($koneksi,$sql);
											while($row = mysqli_fetch_array($query)){
											echo "<option value = '$row[tahun_periode]'>$row[tahun_periode]</option>";
											}
									?>
							</select>
				  </div>
				  <input type="submit" name="submit" class="btn btn-primary" value="Pilih">
				</form>    			
			</div>
			</form>
		</div><!-- /row -->
	
						
						
					</div>
				</div>
			</div>
</div>

<?php
	if(isset($_POST['submit'])){
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Periode <?php $nm=$_POST['pilih']; echo "".$nm;  ?></div>
					<div class="panel-body">
					<table class="table table-striped table-bordered data">
						    <thead>
						    <tr>
                <th>Ranking</th>
								<th>No Pelanggan</th>
								<th>Nama</th>
								<th>Alamat Email</th>
								<th>Total Score</th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php
							include "koneksi.php";
							$no=0;
							$nama=$_POST['pilih'];
              
							$query = "select * from pelanggan 
              JOIN periode_pemenang ON pelanggan.no_pel = periode_pemenang.no_pel
              where tahun_periode='$nama' order by vektor_v desc limit 10";
							$hasil = mysqli_query($koneksi,$query) or die("");
							while ($data = mysqli_fetch_array($hasil)) {
								$no++;
							?>
							<tr>
              <td><?php echo "".$no; ?></td>
								<td><?php echo $data['no_pel']; ?></td>
								<td><?php echo $data['nama']; ?></td>
								<td><?php echo $data['email']; ?></td>
								<td><?php echo $data['vektor_v']; ?></td>
							<?php
							}
							
			
							?>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
</div>
<?php
	}
?>
				</div>	

	</div><!-- /ww -->
	
	<!-- +++++ Footer Section +++++ -->
	
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="admin/js/index.js"></script>
<script src="admin/datatables/js/jquery.dataTables.min.js"></script>
<script src="admin/datatables/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        "language":{
          "order": [[ 1, "desc" ]],
          "decimal":        "",
          "emptyTable":     "Tidak ada data pada tabel ini",
          "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
          "infoEmpty":      "Menampilkan 0 hingga 0 dari 0 data",
          "infoFiltered":   "( Disaring dari _MAX_ total data)",
          "infoPostFix":    "",
          "thousands":      ",",
          "lengthMenu":     "Tampilkan _MENU_ data",
          "loadingRecords": "Memuat...",
          "processing":     "Memproses...",
          "search":         "Cari:",
          "zeroRecords":    "Tidak ada data yang ditemukan",
          "paginate": {
              "first":      "Pertama",
              "last":       "Terakhir",
              "next":       "Selanjutnya",
              "previous":   "Sebelumnya"
          },
          "aria": {
              "sortAscending":  ": activate to sort column ascending",
              "sortDescending": ": activate to sort column descending"
          }
      }
      });
  });
  </script>
  </body>
</html>
