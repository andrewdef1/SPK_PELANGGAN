<?php
include('../../../koneksi.php');
require '../../../vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 
if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 1;$i < count($sheetData);$i++)
	{
        $no_pel = $sheetData[$i]['0'];
        $nama = $sheetData[$i]['1'];
        $alamat = $sheetData[$i]['2'];
        $email = $sheetData[$i]['3'];
        $telp = $sheetData[$i]['4'];
        $c1 = $sheetData[$i]['5'];
        $c2 = $sheetData[$i]['6'];
        $c3 = $sheetData[$i]['7'];
        mysqli_query($koneksi,"insert into pelanggan (id_peserta_pelanggan,no_pel,nama,alamat,email,telp,c1,c2,c3) values ('','$no_pel','$nama','$alamat','$email','$telp','$c1','$c2','$c3')");
    }
    header("Location: index.php"); 
}
?>