<?php 

include 'koneksi.php';

$query = mysqli_query($con, "SELECT * FROM `data_siswa`");


while ($row = mysqli_fetch_array($query)) {

	$kode_pola = $row['kode_pola'];

	// mencari bobot preferensi
	$query_sum = mysqli_query($con, "SELECT SUM(nilai_normalisasi) AS nilai_total FROM normalisasi WHERE kode_pola = '$kode_pola'");

	$row_sum = mysqli_fetch_array($query_sum);

	$nilai_total = $row_sum['nilai_total'];


	$insert = mysqli_query($con, "INSERT INTO `nilai_total`(`kode_pola`, `Nilai_Total`) VALUES ('$kode_pola',$nilai_total)");

}


 ?>