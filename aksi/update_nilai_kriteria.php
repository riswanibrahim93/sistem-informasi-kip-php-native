<?php
include 'koneksi.php';


// Data Siswa
$kode = $_POST['kode'];
$nama = $_POST['nama'];


$query_DataSiswa = mysqli_query($con, "UPDATE `data_siswa` SET`nama_siswa`='$nama' WHERE `kode_pola` = '$kode' ");

// Kriteria
$tanggungan = $_POST['tanggungan'];
$penghasilan = $_POST['penghasilan'];
$pekerjaan = $_POST['pekerjaan'];
$keadaan = $_POST['keadaan'];

// $tanggungan = '1 anak';
// $penghasilan = '500.000-1.000.000';
// $pekerjaan = 'Wiraswasta';
// $keadaan = 'Ibu meninggal';


$sub_kriteria = array();
$sub_kriteria[0] = $tanggungan;
$sub_kriteria[1] = $penghasilan;
$sub_kriteria[2] = $pekerjaan;
$sub_kriteria[3] = $keadaan;

for ($i=0; $i < count($sub_kriteria); $i++) { 
	$query_select = mysqli_query($con, "SELECT `skala`.`value`,`sub_kriteria`.`id_kriteria`,`sub_kriteria`.`id_subkriteria` FROM `kriteria`,`sub_kriteria`,`skala` WHERE `sub_kriteria`.`nm_kriteria` = '$sub_kriteria[$i]' AND `sub_kriteria`.`id_skala` = `skala`.`id_skala` LIMIT 1");

	$row = mysqli_fetch_array($query_select);

	$id_subkriteria = $row['id_subkriteria'];
	$id_kriteria = $row['id_kriteria'];
	$nilai = $row['value'];


	$query_Penilaian = mysqli_query($con, "UPDATE `penilaian` SET `id_subkriteria`= $id_subkriteria,`nilai`= $nilai WHERE `id_kriteria` = $id_kriteria AND `kode_pola`= '$kode'");
}

if($query_DataSiswa)
{
	die("Update Berhasil <a href ='../pages/tables/datasiswa.php'>kembali </a>");
}
else
{
	die("Update Data Gagal <a href =\"javascript:history.back()\">kembali </a>");
}


?>