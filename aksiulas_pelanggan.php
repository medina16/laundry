<?php
include("configbaru.php");

// cek apakah tombol edit sudah diklik atau blum?
if(isset($_POST['submit'])){

	var_dump($_POST);
	$idlau =  $_POST['idlau'];
	/*janlup id user*/
	$rating =  $_POST['rating'];
	$review =  $_POST['review'];
	
	$queryulasan = pg_query("INSERT INTO ulasan(idlau,iduser,rating,review,tanggal) VALUES($idlau,3,'$rating','$review',localtimestamp(0));");
	
	// apakah query berhasil?
    if( $queryulasan ){
        header("Location: page_infolaundry.php?idlau=".$idlau."&status_ulas=sukses");
    } else {
        //header('Location: daftarsiswa.php?status_edit=gagal');
		printf('aw men');
    }

} else {
	die("Akses dilarang...");
}
?>
