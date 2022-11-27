<?php
include("configbaru.php");

// cek apakah tombol edit sudah diklik atau blum?
if(isset($_POST['daftar'])){

	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pw = $_POST['password'];
	$jk = $_POST['jenis_kelamin'];
	$notelp = $_POST['kontak'];

  	$querypemilik = pg_query("INSERT INTO pemilik (email, password, nama, sex, kontak) VALUES ('$email','$pw','$nama', '$jk', '$notelp')");
	$ambilidpem = pg_query("SELECT idpem, email FROM pemilik WHERE email = '$email'");
	$ambilidpem2 = pg_fetch_array($ambilidpem);

	$namaus = $_POST['a'];
	$alamat = $_POST['b'];
	$kelurahan = $_POST['c'];
	$kontak = $_POST['d'];
	$tarif = $_POST['e'];
	$rincian = $_POST['f'];
	$idpem = $ambilidpem2['idpem'];

	$querylaundryan = pg_query("INSERT INTO laundryan (namaus, alamat, kelurahan, kontak, tarif, rincian, idpem) VALUES ('$namaus','$alamat','$kelurahan', '$kontak', '$tarif', '$rincian', $idpem)");
	$ambilidlau = pg_query("SELECT idlau FROM laundryan WHERE idpem = '$idpem'");
	$ambilidlau2 = pg_fetch_array($ambilidlau);
	$idlau = $ambilidlau2['idlau'];

	// apakah query berhasil?
    if( $querypemilik && $querylaundryan ){
		header("Location: page_pemilik.php?idpem=".$idpem."&idlau=".$idlau."&status_daftar=sukses");
    } else {
		header("Location: index.php?status_daftar=gagal");
    }



} else {
	die("Akses dilarang...");
}
?>
