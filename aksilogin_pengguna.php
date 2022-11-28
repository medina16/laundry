<?php
include("configbaru.php");
// cek apakah tombol login sudah diklik atau blum?
if(isset($_POST['Login_user'])){

	// ambil data dari formulir
	$email = $_POST['email'];
	$password = $_POST['password'];

	// buat query
  	$loggedin_user = pg_query("SELECT email, password, iduser FROM pengguna WHERE email='$email' AND password='$password'");
	$cariid_user = pg_fetch_array($loggedin_user);
	$iduser = $cariid_user['iduser'];

	// apakah pasangan email dan password terdapat dalam database?
	if(pg_num_rows($loggedin_user) == 0) {
		// kalau gagal alihkan ke halaman loginp.php dengan cek_owner=salah
		header('Location: page_login.php?cek_user=salah');
	} else {
		// kalau berhasil alihkan ke halaman pemilikk.php
		header("Location: page_pengguna.php?iduser=".$iduser."");
	}

} else {
	die("Akses dilarang...");
}
?>
