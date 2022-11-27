<?php
include("configbaru.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['Login'])){

	// ambil data dari formulir
	$email = $_POST['email'];
	$password = $_POST['password'];

	// buat query
  	$loggedin_pem = pg_query("SELECT email, password, idpem FROM pemilik WHERE email='$email' AND password='$password'");
	$cariid_pem = pg_fetch_array($loggedin_pem);
	$idpem = $cariid_pem['idpem'];

	$loggedin_lau = pg_query("SELECT idlau FROM laundryan WHERE idpem = $idpem");
	$cariid_lau = pg_fetch_array($loggedin_lau);
	$idlau = $cariid_lau['idlau'];


	// apakah pasangan email dan password terdapat dalam database?
	if(pg_num_rows($loggedin_pem) == 0) {
		// kalau gagal alihkan ke halaman loginp.php dengan cek_owner=salah
		header('Location: page_login.php?cek_owner=salah');
	} else {
		// kalau berhasil alihkan ke halaman pemilikk.php
		header("Location: page_pemilik.php?idpem=".$idpem."&idlau=".$idlau."");
	}

} else {
	die("Akses dilarang...");
}
?>

