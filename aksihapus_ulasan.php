<?php
include("configbaru.php");
if( isset($_POST['hapusulasan']) ){

    $idul = (int)$_POST['idul'];

    $loggedin_lau = pg_query("SELECT idlau FROM ulasan WHERE idul = $idul");
	$cariid_lau = pg_fetch_array($loggedin_lau);
	$idlau = $cariid_lau['idlau'];

    $hapusulasan = pg_query("DELETE FROM ulasan WHERE idul = $idul");

    if( $hapusulasan ){
        header("Location: page_infolaundry.php?idlau=".$idlau."&status_hapus=sukses");
    } else {
        header("Location: page_infolaundry.php?idlau=".$idlau."&status_hapus=gagal");
    }

} else {
    die("akses dilarang...");
}
?>
