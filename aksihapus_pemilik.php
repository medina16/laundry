<?php
include("configbaru.php");
if( isset($_POST['hapuspemilik']) ){

    $idpem = (int)$_POST['idpem'];

    $loggedin_lau = pg_query("SELECT idlau FROM laundryan WHERE idpem = $idpem");
	$cariid_lau = pg_fetch_array($loggedin_lau);
	$idlau = $cariid_lau['idlau'];

    $hapusulasan = pg_query("DELETE FROM ulasan WHERE idlau = $idlau");
    $hapuslaundryan = pg_query("DELETE FROM laundryan WHERE idpem = $idpem");
    $hapuspemilik = pg_query("DELETE FROM pemilik WHERE idpem = $idpem");

    if( $hapusulasan && $hapuslaundryan && $hapuspemilik ){
        header('Location: index.php?status_hapus=sukses');
    } else {
        header("Location: page_pemilik.php?idpem=".$idpem."&idlau=".$idlau."&status_hapus=gagal");
    }

} else if(isset($_POST['gadeng'])){

    $idpem = (int)$_POST['idpem'];
    
    $loggedin_lau = pg_query("SELECT idlau FROM laundryan WHERE idpem = $idpem");
	$cariid_lau = pg_fetch_array($loggedin_lau);
	$idlau = $cariid_lau['idlau'];

    header("Location: page_pemilik.php?idpem=".$idpem."&idlau=".$idlau."");

} else {
    die("akses dilarang...");
}
?>
