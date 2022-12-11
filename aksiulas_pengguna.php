<?php
include("configbaru.php");

// cek apakah tombol submit sudah diklik
if(isset($_POST['submit'])){

	//ambil data ulasan dari form pengeditan
	$idlau =  $_POST['idlau'];
	$iduser =  $_POST['iduser'];
	$rating =  $_POST['rating'];
	$review =  $_POST['review'];
	
	//buat record baru di database ulasan sesuai data dari form
	$queryulasan = pg_query("INSERT INTO ulasan(idlau,iduser,rating,review,tanggal) VALUES($idlau,$iduser,'$rating','$review',localtimestamp(0));");
	
	// apakah query berhasil?
    if( $queryulasan ){
        header("Location: page_infolaundry.php?idlau=".$idlau."&status_ulas=sukses");
    } else {
		header("Location: page_infolaundry.php?idlau=".$idlau."&status_ulas=gagal");
    }

} else {
	die("Akses dilarang...");
}
?>
