<?php
include("configbaru.php");
if( isset($_POST['hapusulasan']) ){
    $iduser = (int)$_POST['iduser'];
    $idlau = (int)$_POST['idlau'];

    $cariulasan1 = pg_query("SELECT idul FROM ulasan WHERE iduser = $iduser AND idlau = $idlau");
	$cariulasan2 = pg_fetch_array($cariulasan1);
	$idul = $cariulasan2['idul'];
    
} else {
    die("akses dilarang...");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BogorBinatu - Konfirmasi</title>
	<link rel="stylesheet" href="stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class=container> <h2>Konfirmasi</h2> </div>
    </header>
    <div class="daptar">
        <form action="aksihapus_ulasan.php" method="POST">
            <fieldset>
                <p>Apakah anda yakin ingin menghapus ulasan?</p>
                <input type="hidden" value="<?=$idul?>" name="idul" />
                <input type="submit" value="Ya" name="hapusulasan" />
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
