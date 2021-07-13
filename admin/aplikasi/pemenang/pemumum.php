<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 centered">
					<h4>Pemenang Pemilihan Pelanggan</h4>
					<hr>
				</div>

				<div class="row mt">	
					<div class="col-lg-8 col-lg-offset-2">
						<table class="table" border='1'>
							<tr>
								<th>Ranking</th>
								<th>No Pelanggan </th>
								<th>Nama </th>
								
								
							</tr>

							<?php
								$sql = mysqli_query($koneksi,"select * from pelanggan order by vektor_v desc limit 10");
								$i = 1;
								while ($row = mysqli_fetch_array($sql)){
									echo "<tr>
											<td> $i </td>
											<td> $row[no_pel] </td>
											<td> $row[nama] </td>"
											?>
								
											
											</tr>
											<?php
									$i++;
								}
							?>
						</table>
					</div>
				</div>	
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->