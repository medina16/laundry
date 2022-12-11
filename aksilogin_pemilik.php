<?php
include("configbaru.php");
// cek apakah tombol 'Login_pemilik' sudah diklik
if(isset($_POST['Login_pemilik'])){
	session_start();
	session_destroy();

	// ambil data login pemilik
	$email = $_POST['email'];
	$password = $_POST['password'];

	// lihat apakah pasangan email dan password terdapat pada database dan mengambil idpem
  	$loggedin_pem = pg_query("SELECT email, password, idpem FROM pemilik WHERE email='$email' AND password='$password'");
	$cariid_pem = pg_fetch_array($loggedin_pem);
	$idpem = $cariid_pem['idpem'];

	// apakah pasangan email dan password terdapat dalam database?
	if(pg_num_rows($loggedin_pem) == 0) {
		// kalau tidak, alihkan ke halaman loginp.php dengan cek_owner=salah
		header('Location: page_login.php?cek_owner=salah');
	} else {
		// kalau ada, ambil idlau dari usaha laundry yang dimiliki pemilik
		$loggedin_lau = pg_query("SELECT idlau FROM laundryan WHERE idpem = $idpem");
		$cariid_lau = pg_fetch_array($loggedin_lau);
		$idlau = $cariid_lau['idlau'];

		//lalu mulai session, set idpem dan idlau, alihkan ke halaman page_pemilik.php
		session_start();
		$_SESSION["idpem"] = $idpem;
		$_SESSION["idlau"] = $idlau;
		header("Location: page_pemilik.php");
	}

} else {
	die("Akses dilarang...");
}
?>

