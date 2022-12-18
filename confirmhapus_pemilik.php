<?php
include("configbaru.php");
session_start();
	if($_SESSION['idpem']!=NULL && $_SESSION['idlau']!=NULL){
		$idpem = $_SESSION['idpem']; 
	} else {
		header("Location:page_login.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Laundry - Konfirmasi</title>
    <link rel="stylesheet" href="stylesheet.css">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body>
<header>
		<div class=container> <h2>Konfirmasi</h2> </div>
</header>
<div class="daptar">
<form action="aksihapus_pemilik.php" method="POST">
        <fieldset>
            <h2>Apakah anda yakin ingin menghapus akun?</h2>
            <p>Semua data terkait data Anda sebagai pemilik usaha laundry dan data informasi usaha Anda akan dihapus dari sistem. Anda juga akan ter-log out secara otomatis.</p>
            <input type="hidden" value="<?=$idpem?>" name="idpem" />
            <input type="submit" value="Ya" name="hapuspemilik" />
            <a class="button-putih" href="
					<?php if (isset($_SERVER['HTTP_REFERER'])) {
						echo "$_SERVER[HTTP_REFERER]";
					} else {
						echo "page_pemilik.php";}?>
			">Tidak
			</a>
        </fieldset>
    </form>
</div>

	</body>
</html>
