<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img src="assets/img/uui.png" alt="Stanley">
					<h1>Selamat Datang</h1>
					<?php
            			$sq = mysqli_query($koneksi,"select status from tb_pengaturan where pengaturan='pengumuman'");
            			$st = mysqli_fetch_array($sq);
            			if($st['status']=="1"){
              				?><hr><h3><a href="pemumum.php">Pengumuman Pemenang</a></h3><hr><?php
            			}
          			?>
					
					<!-- <p>Silahkan Login sebagai mahasiswa, pimpinan dan LPPM untuk melakukan penilaian terhadap pelanggan peserta</p> -->

				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->