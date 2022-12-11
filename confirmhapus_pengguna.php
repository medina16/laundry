<?php
include("configbaru.php");
session_start();
	if($_SESSION['iduser']!=NULL){
		$iduser = $_SESSION["iduser"]; 
	} else {
		header("Location:page_login.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Laundry - Konfirmasi</title>
	<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <header>
        <div class=container> <h2>Konfirmasi</h2> </div>
    </header>
    <div class="daptar">
        <form action="aksihapus_pengguna.php" method="POST">
            <fieldset>
                <h2>Apakah anda yakin ingin menghapus akun?</h2>
                <p>Semua data terkait akun Anda termasuk ulasan-ulasan yang Anda buat akan dihapus dari sistem. Anda juga akan ter-log out secara otomatis.</p>
                <input type="hidden" value="<?=$iduser?>" name="iduser" />
                <input type="submit" value="Ya" name="hapuspengguna" />
                <a class="button-putih" href="
                        <?php if (isset($_SERVER['HTTP_REFERER'])) {
                            echo "$_SERVER[HTTP_REFERER]";
                        } else {
                            echo "page_pengguna.php";}?>
                ">Tidak
                </a>
            </fieldset>
        </form>
    </div>
    </body>
</html>
