<?php
include("configbaru.php");
// cek apakah tombol 'Login_user' sudah diklik
if(isset($_POST['Login_user'])){
	session_start();
	session_destroy();

	// ambil data login pengguna
	$email = $_POST['email'];
	$password = $_POST['password'];

	// lihat apakah pasangan email dan password terdapat pada database dan mengambil idpem
  	$loggedin_user = pg_query("SELECT email, password, iduser FROM pengguna WHERE email='$email' AND password='$password'");
	$cariid_user = pg_fetch_array($loggedin_user);
	$iduser = $cariid_user['iduser'];

	// apakah pasangan email dan password terdapat dalam database?
	if(pg_num_rows($loggedin_user) == 0) {
		// kalau tidak, alihkan ke halaman loginp.php dengan cek_owner=salah
		header('Location: page_login.php?cek_user=salah');
	} else {
		// kalau ada, mulai sesi, set iduser, alihkan ke halaman pengguna.php
		session_start();
		$_SESSION["iduser"] = $iduser;
		header("Location: page_pengguna.php");
	}

} else {
	die("Akses dilarang...");
}
?>
