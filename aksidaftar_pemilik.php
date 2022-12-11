<?php
include("configbaru.php");

// cek apakah tombol 'daftar' sudah diklik
if(isset($_POST['daftar'])){
	session_start();
	session_destroy();
	var_dump($_POST);

	//ambil data pemilik
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pw = $_POST['password'];
	$jk = $_POST['jenis_kelamin'];
	$kontakp = $_POST['kontakpemilik'];

	//buat record baru di database pemilik, lalu ambil id pemilik
  	$querypemilik = pg_query("INSERT INTO pemilik (email, password, nama, sex, kontak) VALUES ('$email','$pw','$nama', '$jk', '$kontakp')");
	$ambilidpem = pg_query("SELECT idpem, email FROM pemilik WHERE email = '$email'");
	$ambilidpem2 = pg_fetch_array($ambilidpem);

	//ambil data usaha laundry
	$namaus = $_POST['namaus'];
	$alamat = $_POST['alamat'];
	$kelurahan = $_POST['kelurahan'];
	$kontakl = $_POST['kontaklaundry'];
	$tarif = $_POST['tarif'];
	$rincian = $_POST['rincian'];
	$idpem = $ambilidpem2['idpem'];

	if (in_array(NULL, $_POST) == FALSE) {
		//buat record baru di database laundry dgn id pemilik di atas
		$querylaundryan = pg_query("INSERT INTO laundryan (namaus, alamat, kelurahan, kontak, tarif, rincian, idpem) VALUES ('$namaus','$alamat','$kelurahan', '$kontakl', '$tarif', '$rincian', $idpem)");
		$ambilidlau = pg_query("SELECT idlau FROM laundryan WHERE idpem = '$idpem'");
		$ambilidlau2 = pg_fetch_array($ambilidlau);
		$idlau = $ambilidlau2['idlau'];
	}

	// apakah query berhasil?
    if( $querypemilik && $querylaundryan ){
		//jika berhasil, mulai session, set idpem dan idlau untuk session, lalu alihkan ke page_pemilik.php
		session_start();
		$_SESSION["idpem"] = $idpem;
		$_SESSION["idlau"] = $idlau;
		header("Location: page_pemilik.php?status_daftar=sukses");
    } else {
		header("Location: gagaldaftar.php");
    }

} else {
	die("Akses dilarang...");
}
?>
