<?php
include 'koneksi.php';


// Data Siswa
$kode = $_GET['kode'];


$query_DataSiswa = mysqli_query($con, "DELETE FROM `data_siswa` WHERE `kode_pola` = '$kode' ");
$query_Penilaian = mysqli_query($con, "DELETE FROM `penilaian` WHERE `kode_pola` = '$kode' ");


if($query_DataSiswa)
{
	die("Delete Berhasil <a href ='../pages/tables/datasiswa.php'>kembali </a>");
}
else
{
	die("Delete Data Gagal <a href =\"javascript:history.back()\">kembali </a>");
}


?>