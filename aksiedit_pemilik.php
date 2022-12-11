<?php
include("configbaru.php");

// cek apakah tombol 'edit' sudah diklik
if(isset($_POST['edit'])){

	//ambil data pemilik dari form pengeditan
	$idpem = $_POST['idpem'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pw = $_POST['password'];
	$jk = $_POST['jenis_kelamin'];
	$notelp = $_POST['kontak'];

	//ambil data usaha laundry dari form pengeditan
	$idlau = $_POST['idlau'];
	$namaus = $_POST['lname'];
	$alamat = $_POST['alamat'];
	$kelurahan = $_POST['kelurahan'];
	$tarif = $_POST['price'];
	$rincian = $_POST['deskripsi'];
	$kontakk = $_POST['kontakk'];

	//lakukan update pada record di database pemilik dan laundryan sesuai data dari form
  	$query_pemilik = pg_query("UPDATE pemilik SET nama = '$nama', email = '$email', password = '$pw', sex = '$jk', kontak = '$notelp' WHERE idpem=$idpem");
	$query_laundryan = pg_query("UPDATE laundryan SET namaus = '$namaus', alamat = '$alamat', kelurahan = '$kelurahan', tarif = '$tarif', kontak = '$kontakk', rincian = '$rincian' WHERE idlau=$idlau");

	// apakah query berhasil?
    if( $query_pemilik && $query_laundryan){
		header("Location: page_pemilik.php?status_edit=sukses");
    } else {
		header("Location: page_pemilik.php?status_edit=gagal");
    }

} else {
	die("Akses dilarang...");
}
?>
