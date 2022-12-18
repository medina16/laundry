<?php
include("configbaru.php");

// cek apakah tombol 'edit' sudah diklik
if(isset($_POST['edit'])){

	//ambil data ulasan dari form pengeditan
	$idlau =  $_POST['idlau'];
	$iduser =  $_POST['iduser'];
	$rating =  $_POST['rating'];
	$review =  $_POST['review'];
	
	//lakukan update pada record di database ulasan sesuai data dari form
	$queryulasan = pg_query("UPDATE ulasan SET rating = '$rating', review = '$review', tanggal = localtimestamp(0) WHERE iduser = $iduser AND idlau = $idlau;");
	
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
