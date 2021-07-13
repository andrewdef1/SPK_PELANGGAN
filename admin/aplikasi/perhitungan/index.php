<?php
session_start();
if(!isset($_SESSION['admin'])){
	header("Location: ../../login.php");
}else{
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Administrator SPK Pelanggan Terbaik</title>

<link href="../../css/bootstrap.css" rel="stylesheet">
<link href="../../css/datepicker3.css" rel="stylesheet">
<link href="../../css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="../../datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../datatables/css/jquery.dataTables.css">

<!--Icons-->
<script src="../../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>SPK</span> Pemilihan PELANGGAN Terbaik </a>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
				<center><img src="../../../assets/img/uui.png" width="100px" height="100px"></center>
		</form>
		<ul class="nav menu">
			<li><a href="../../index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Beranda</a></li>
			<li><a href="../peserta/"><svg class="glyph stroked calendar"><use xlink:href="#stroked-male-user"></use></svg> Data Peserta</a></li>
			<li><a href="../kriteria/index.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-notepad"></use></svg> Data Kriteria</a></li>
			<li><a href="../hmp_kriteria/hmp_kriteria.php"><svg class="glyph stroked table"><use xlink:href="#stroked-open-folder"></use></svg> Himpunan Kriteria</a></li>
			<li><a href="../nilai/index.php"><svg class="glyph plus sign"><use xlink:href="#stroked-plus-sign"></use></svg> Input Nilai</a></li>
			<li><a href="index.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-calendar"></use></svg> Perhitungan</a></li>
			<li><a href="../pemenang/pemenang.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Email Pemenang</a></li>
			
			<!-- <li <?php if (isset($_GET['ap']) && $_GET['ap']=="laporan") echo "class='active'";?>><a href="?ap=laporan"><svg class="glyph stroked app-window"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Laporan</a></li> -->
			
			<li role="presentation" class="divider"></li>
			<li><a href="../../logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-lock"></use></svg> Sign Out</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<?php 
			include "../../koneksi.php";
		?>
<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Perhitungan</h3>
			</div>
		</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading">Data Pelanggan</div>
					<div class="panel-body">
					<table class="table table-striped table-bordered data">
						    <thead>
						    <tr>
						        <th>No</th>
								<th>No Pelanggan</th>
								<th>Nama</th>
								<th>Alamat</th>

								<?php
								for($i=1;$i<=3;$i++)
									echo "<th>C$i</th>";
								?>
								
						    </tr>
						    </thead>
						    <tbody>
						    <?php
						    include "../../koneksi.php";
						    $no=0;
							$query = "select * from pelanggan";
							$hasil = mysqli_query($koneksi,$query) or die("");
							while ($data = mysqli_fetch_array($hasil)) {
								$no++;
							?>
							<tr>
								<td><?php echo "".$no; ?></td>
								<td><?php echo $data['no_pel']; ?></td>
								<td><?php echo $data['nama']; ?></td>
								<td><?php echo $data['alamat']; ?></td>

								<?php
									for($c=1;$c<=3;$c++){
										$tb = "c" . $c;
										?><td><?php echo round($data[$tb],2); ?></td><?php
									}
								?>
							<?php
							}
							
							?>

							</tr>
							</tbody>
						</table>
					</div>
					<div class="panel-footer"><center><a href="?ap=hitung&proses=1" class= "btn btn-primary">Hitung</a></center></div>
				</div>
			</div>
</div>

<?php
	if (isset($_GET['proses'])){
		if ($_GET['proses'] == 1){
			?>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading">Perbaikan Bobot</div>
					<div class="panel-body">
						<table class="table">
							<thead>
						    <tr>
						    	<th>Bobot</th>
						<?php
						    include "../../koneksi.php";
							$query = "select * from tb_kriteria";
							$hasil = mysqli_query($koneksi,$query) or die("");
							while ($data = mysqli_fetch_array($hasil)) {

							?>
						    
								<th text-algin="center"><?php echo "$data[nama_kriteria]";?></th>
						    
						    <?php
							}
							?>
							</tr>
						    </thead>
						    <tbody>
						    <tr>
						    	<td>Bobot Awal</td>
						    	<?php
						    	$qr = "select * from tb_kriteria";
							$b = mysqli_query($koneksi,$qr) or die("");
							while ($r = mysqli_fetch_array($b)) {

							?>
						    
								<td align="center"><?php echo "$r[bobot]";?></td>
						    
						    <?php
							}
							?>
							</tr>

							<tr>
						    	<td>Bobot Baru</td>
						    	<?php
						    	$arBB = array();
						    	$i=0;
						    	$sumB = mysqli_query($koneksi,"SELECT SUM(bobot) AS sum FROM tb_kriteria");
						    	$quB = mysqli_fetch_array($sumB);
    							$jml_bobot = $quB['sum'];
						    	$qr = "select * from tb_kriteria";
							$b = mysqli_query($koneksi,$qr) or die("");
							while ($r = mysqli_fetch_array($b)) {
								$bb = $r['bobot']/$jml_bobot;
								$arBB[$i]=$bb;
							?>
						    	
								<td align="center"><?php echo round($bb,4);?></td>
						    
						    <?php
						    $i++;
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
	$ps = mysqli_query($koneksi,"select * from pelanggan");
	while ($rps=mysqli_fetch_array($ps)){
		$vkt_s = 1;
		for($c=1;$c<=3;$c++){
			$tb = "c" . $c;
			$ab = $c-1;
			$pgkt = pow($rps[$tb], $arBB[$ab]);
			//echo $rps[$tb] . " dipangkat " . $arBB[$ab] . " = " . $pgkt . "<br>";
			$vkt_s = $vkt_s * $pgkt;
		}
		$upd = mysqli_query($koneksi,"update pelanggan set vektor_s = '$vkt_s' where no_pel = '$rps[no_pel]'");
	}

	$v = mysqli_query($koneksi,"select sum(vektor_s) as all_vk from pelanggan");
	$vk = mysqli_fetch_array($v);
	$all_vk = $vk['all_vk'];
	
	$ps = mysqli_query($koneksi,"select no_pel, vektor_s from pelanggan");
	while ($rps=mysqli_fetch_array($ps)){
		$vk_v = $rps['vektor_s']/$all_vk;
		$up_v = mysqli_query($koneksi,"update pelanggan set vektor_v = '$vk_v' where no_pel='$rps[no_pel]'");
	}

	$period = mysqli_query($koneksi,"select * from pelanggan order by vektor_v desc LIMIT 10");
						    		
                                    while ($data=mysqli_fetch_array($period)) {
										$curYear = date('Y'); 
                                        $tambah = mysqli_query($koneksi, "INSERT INTO periode_pemenang (id, id_peserta_pelanggan, no_pel, tahun_periode) VALUES ('', $data[id_peserta_pelanggan], $data[no_pel], '$curYear')");
                                    }

?>
<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading">Hasil Seleksi</div>
					<div class="panel-body">
					<table class="table table-striped table-bordered data">
							<thead>
								<tr>
									<th>Ranking</th>
									<th>Nama</th>
									<th>Vektor_S</th>
									<th>Vektor_V</th>
								</tr>
						    </thead>
						    <tbody>
						    	<?php
						    		$rk = 1;
						    		$pr = mysqli_query($koneksi,"select nama, vektor_s, vektor_v from pelanggan order by vektor_v desc");
						    		
						    		while ($dt=mysqli_fetch_array($pr)){
						    			echo "<tr>";
						    			echo "<td>$rk</td>";
						    			echo "<td>$dt[nama]</td>";
						    			echo "<td>" . round($dt['vektor_s'], 4) . "</td>";
						    			echo "<td>" . round($dt['vektor_v'], 4) . "</td>";
						    			echo "</tr>";
						    			$rk++;
						    		}
									
						    	?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
</div>
			<?php
			// for($a=0;$a<10;$a++){
			// 	echo round($arBB[$a],4) . "<br>";
			// }
		}else{
			echo "adasda";
		}
	}
?>

</div>	<!--/.main-->



	<script src="../../js/jquery-1.11.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/chart.min.js"></script>
	<script src="../../js/chart-data.js"></script>
	<script src="../../js/easypiechart.js"></script>
	<script src="../../js/easypiechart-data.js"></script>
	<script src="../../js/bootstrap-datepicker.js"></script>
	<script src='../../js/jquery.min.js'></script>
	  <script src="js/index.js"></script>
<script src="../../datatables/js/jquery.dataTables.min.js"></script>
<script src="../../datatables/js/dataTables.bootstrap4.min.js"></script>

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
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
<?php
}
?>