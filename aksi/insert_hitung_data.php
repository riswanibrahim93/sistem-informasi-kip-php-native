<?php 
include 'koneksi.php';

$query = mysqli_query($con, "SELECT * FROM `penilaian`");


while ($row = mysqli_fetch_array($query)) {

	$id_kriteria = $row['id_kriteria'];

	// mencari bobot preferensi
	$query_bobot = mysqli_query($con, "SELECT `bobot_preferensi`.`bobot_preferensi` FROM `bobot_preferensi`, `kriteria` WHERE `bobot_preferensi`.`id_kriteria` = `kriteria`.`id_kriteria` AND `kriteria`.`id_kriteria` = $id_kriteria");

	$row_bobot = mysqli_fetch_array($query_bobot);

	// mencari banyaknya Subkriteria pada kriteria
	$query_value = mysqli_query($con, "SELECT COUNT(nm_kriteria) AS value FROM sub_kriteria WHERE `id_kriteria` = $id_kriteria");

	$row_value = mysqli_fetch_array($query_value);

	// menentukan nilai normalisasi
	$nilai = ($row['nilai']/$row_value['value'])*$row_bobot['bobot_preferensi'];


	// insert tabel normalisasi
	$id_nilai = $row['id_nilai'];
	$id_subkriteria = $row['id_subkriteria'];
	$kode_pola = $row['kode_pola'];

	$insert = mysqli_query($con, "INSERT INTO `normalisasi`(`id_nilai`, `id_subkriteria`, `kode_pola`, `nilai_normalisasi`) VALUES ($id_nilai,$id_subkriteria,'$kode_pola',$nilai)");

}

$query = mysqli_query($con, "SELECT * FROM `data_siswa`");

$kondisi = false;

while ($row = mysqli_fetch_array($query)) {

	$kode_pola = $row['kode_pola'];

	// mencari bobot preferensi
	$query_sum = mysqli_query($con, "SELECT SUM(nilai_normalisasi) AS nilai_total FROM normalisasi WHERE kode_pola = '$kode_pola'");

	$row_sum = mysqli_fetch_array($query_sum);

	$nilai_total = $row_sum['nilai_total'];


	$insert = mysqli_query($con, "INSERT INTO `nilai_total`(`kode_pola`, `Nilai_Total`) VALUES ('$kode_pola',$nilai_total)");

	$kondisi = true;

}

if($kondisi)
{
	die("Input Berhasil <a href =\"javascript:history.back()\">kembali </a>");
}
else
{
	die("Input Data Gagal <a href =\"javascript:history.back()\">kembali </a>");
}

 ?>