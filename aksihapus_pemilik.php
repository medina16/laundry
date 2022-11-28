<?php
include("configbaru.php");
if( isset($_POST['hapuspemilik']) ){
    $idpem = (int)$_POST['idpem'];

    $query = pg_query("DELETE FROM laundryan WHERE idpem = $idpem");

    if( $query ){
        header('Location: page_pemilik.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}
?>
