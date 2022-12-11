<?php
include("configbaru.php");
if( isset($_POST['hapuspengguna']) ){

    $iduser = (int)$_POST['iduser'];

    $hapusulasan = pg_query("DELETE FROM ulasan WHERE iduser = $iduser");
    $hapuspengguna = pg_query("DELETE FROM pengguna WHERE iduser = $iduser");

    if( $hapusulasan && $hapuspengguna ){
        session_start();
        session_destroy();
        header('Location: index.php?status_hapus=sukses');
    } else {
        session_start();
        header("Location: page_pengguna.php?status_hapus=gagal");
    }

} else {
    die("akses dilarang...");
}
?>
