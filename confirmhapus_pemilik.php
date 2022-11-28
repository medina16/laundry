<?php
include("configbaru.php");
if( isset($_POST['hapuspemilik']) ){
    $idpem = (int)$_POST['idpem'];
    var_dump($_POST);
} else {
    die("akses dilarang...");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>

    <form action="aksihapus_pemilik.php" method="POST">
        <fieldset>
            <h2>Apakah anda yakin ingin menghapus akun?</h2>
            <p>Semua data terkait data Anda sebagai pemilik usaha laundry dan data informasi usaha Anda akan dihapus dari sistem. Anda juga akan ter-log out secara otomatis.</p>
            <input type="hidden" value="<?=$idpem?>" name="idpem" />
            <input type="submit" value="Ya" name="hapuspemilik" />
            <input type="submit" value="Tidak" name="gadeng" />
        </fieldset>
    </form>

	</body>
</html>
