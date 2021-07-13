<?php

	include "../../koneksi.php";
	
	// $nim = $_SESSION['nim'];
	$id_dos = $_POST['no_pel'];

	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];

	// $rata = ($q1 + $q2 + $q3 + $q4 + $q5) / 5;


		$query = "update pelanggan set c1='$q1', c2='$q2', c3='$q3' where no_pel='$id_dos'";

	 $sql = mysqli_query($koneksi,$query);

	// $j_sql = mysqli_query($koneksi,"select * from nilai_mhs where id_dosen = '$id_dos'");
	// $jml = mysqli_num_rows($j_sql);
	// $sql_nilai = mysqli_query($koneksi,"select sum(avg) as avg from nilai_mhs where id_dosen = '$id_dos'");
	// $n = mysqli_fetch_array($sql_nilai);
	// $q1 = $n['avg'];

	// $c1 = $q1/$jml;

	// $ins = mysqli_query($koneksi,"update dosen_peserta set c1 = '$c1' where id_dosen = '$id_dos'");
	
	if ($sql) {
		echo "<script>alert('Data berhasil tersimpan');window.location = 'http://localhost/spk_wp/admin/?ap=nilai'; </script> ";
	}else {
		echo "<script>alert('Data gagal disimpan');document.location='index.php' </script> ";
	}

?>