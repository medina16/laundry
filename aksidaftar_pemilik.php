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
	
	// apakah query berhasil?
    if( $querypemilik && $querylaundryan ){
		printf('yoshhaaaa');
        //header('Location: daftarsiswa.php?status_edit=sukses');
    } else {
        //header('Location: daftarsiswa.php?status_edit=gagal');
		printf('aw men');
    }



} else {
	die("Akses dilarang...");
}
?>
