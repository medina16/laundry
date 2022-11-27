<?php
include("configbaru.php");

// cek apakah tombol edit sudah diklik atau blum?
if(isset($_POST['edit'])){

	// ambil id dari query string
	$idpem = $_POST['idpem'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pw = $_POST['password'];
	$jk = $_POST['jenis_kelamin'];
	$notelp = $_POST['kontak'];

	$idlau = $_POST['idlau'];
	$namaus = $_POST['lname'];
	$alamat = $_POST['alamat'];
	$kelurahan = $_POST['kelurahan'];
	$tarif = $_POST['price'];
	$rincian = $_POST['deskripsi'];
	$kontakk = $_POST['kontakk'];

	var_dump($_POST);

	// buat query pengeditan
  	$query_pemilik = pg_query("UPDATE pemilik SET nama = '$nama', email = '$email', password = '$pw', sex = '$jk', kontak = '$notelp' WHERE idpem=$idpem");
	$query_laundryan = pg_query("UPDATE laundryan SET namaus = '$namaus', alamat = '$alamat', kelurahan = '$kelurahan', tarif = '$tarif', kontak = '$kontakk', rincian = '$rincian' WHERE idlau=$idlau");

	// apakah query berhasil?
    if( $query_pemilik && $query_laundryan){
		header("Location: page_pemilik.php?idpem=".$idpem."&idlau=".$idlau."&status_edit=sukses");
    } else {
		header("Location: page_pemilik.php?idpem=".$idpem."&idlau=".$idlau."&status_edit=gagal");
    }

} else {
	die("Akses dilarang...");
}
?>
