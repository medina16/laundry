<?php
include("configbaru.php");

// cek apakah tombol 'daftar' sudah diklik
if(isset($_POST['daftar'])){
	session_start();
	session_destroy();

	if(($_POST['nama']!=NULL) && ($_POST['email']!=NULL) && ($_POST['password']!=NULL)){
		//ambil data pengguna
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$pw = $_POST['password'];
		$querypengguna = pg_query("INSERT INTO pengguna (email, password, nama) VALUES ('$email','$pw','$nama')");
	}

	//buat record baru di database pemilik, lalu ambil id pengguna
	$ambiliduser = pg_query("SELECT iduser, email FROM pengguna WHERE email = '$email'");
	$ambiliduser2 = pg_fetch_array($ambiliduser);
    $iduser = $ambiliduser2['iduser'];

	//apakah query berhasil?
    if( $querypengguna){
		//jika berhasil, mulai session, set iduser untuk session, alihkan ke page_pengguna.php
		session_start();
		$_SESSION["iduser"] = $iduser;
		header("Location: page_pengguna.php?status_daftar=sukses");
    } else {
		header("Location: gagaldaftar.php");
    }

} else {
	die("Akses dilarang...");
}
?>
