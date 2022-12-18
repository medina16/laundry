<?php
include("configbaru.php");

// cek apakah tombol 'edit' sudah diklik
if(isset($_POST['edit'])){

	//ambil data pengguna dari form pengeditan
	$iduser = $_POST['iduser'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pw = $_POST['password'];
	
	//lakukan update pada record di database pengguna sesuai data dari form
  	$query_pengguna = pg_query("UPDATE pengguna SET nama = '$nama', email = '$email', password = '$pw' WHERE iduser=$iduser");

	// apakah query berhasil?
    if( $query_pengguna){
		header("Location: page_pengguna.php?status_edit=sukses");
    } else {
		header("Location: page_pengguna.php?status_edit=gagal");
    }

} else {
	die("Akses dilarang...");
}
?>
