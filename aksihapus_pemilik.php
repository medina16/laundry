<?php
include("configbaru.php");
if( isset($_POST['hapuspemilik']) ){
    $idpem = $_POST['idpem'];
    $id_lau = $_POST['idlau'];
    $idul = $_POST['idul']

    $query1 = pg_query("DELETE FROM ulasan WHERE idul = $idul");
    $query2 = pg_query("DELETE FROM laundryan WHERE idlau = $id_lau");
    $query3 = pg_query("DELETE FROM pemilik WHERE idpem = $idpem");

    if( $query1 && $query2 && $query3 ){
        header('Location: page_pemilik.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}
?>
