<?php
    include("configbaru.php");
    if(isset($_POST['cari'])){
        session_start();
        if($_SESSION['iduser']!=NULL){
            $iduser = $_SESSION["iduser"]; 
        } else {
            header("Location:page_login.php");
        }

    if (isset($_POST['tarif']) && is_numeric($_POST['tarif'])) {
        $tarif = $_POST['tarif'];
    } else {
        $tarif = NULL;
    }

    if (isset($_POST['kelurahan'])) {
        $kelurahan = $_POST['kelurahan'];
    } else {
        $kelurahan = NULL;
    }

    if (isset($_POST['rating'])) {
        $rating = $_POST['rating'];
    } else {
        $rating = NULL;
    }

    } else {
        die("Akses dilarang...");
    }

    $base_tanparating = "SELECT idlau, namaus, tarif, kelurahan FROM laundryan ";
    $base = "SELECT laundryan.idlau, namaus, tarif, round, kelurahan FROM laundryan join (SELECT idlau,ROUND(AVG(rating)::numeric,2) FROM ulasan GROUP BY idlau) AS rating ON rating.idlau=laundryan.idlau ";
    if (isset($_POST['rating'])) $carirating = "round>=$rating";
    if (isset($_POST['kelurahan'])) $carikelurahan = "kelurahan='$kelurahan'";
    if (isset($_POST['tarif'])) $caritarif = "tarif<=$tarif";

    //search tarif, rating, kelurahan
    if (($tarif!=NULL) && ($rating!=NULL) && ($kelurahan!=NULL)) {
        $syntax = ($base . "WHERE " . $caritarif . " AND " . $carirating . " AND " . $carikelurahan . ";");
        $querylau = pg_query("$syntax");
        $jumlah = pg_num_rows($querylau);
    }

    //search tarif, kelurahan
    else if (($tarif!=NULL) && ($rating==NULL) && ($kelurahan!=NULL)) {
        $syntax = ($base_tanparating . "WHERE " . $caritarif . " AND " . $carikelurahan . ";");
        $querylau = pg_query("$syntax");
        $jumlah = pg_num_rows($querylau);
    }

    //search tarif, rating
    else if (($tarif!=NULL) && ($rating!=NULL) && ($kelurahan==NULL)) {
        $syntax = ($base . "WHERE " . $caritarif . " AND " . $carirating . ";");
        $querylau = pg_query("$syntax");
        $jumlah = pg_num_rows($querylau);
    }

    //search rating, kelurahan
    else if (($tarif==NULL) && ($rating!=NULL) && ($kelurahan!=NULL)) {
        $syntax = ($base . "WHERE " . $carikelurahan . " AND " . $carirating . ";");
        $querylau = pg_query("$syntax");
        $jumlah = pg_num_rows($querylau);
    }

    //search rating
    else if (($tarif==NULL) && ($rating!=NULL) && ($kelurahan==NULL)) {
        $syntax = ($base . "WHERE " . $carirating . ";");
        $querylau = pg_query("$syntax");
        $jumlah = pg_num_rows($querylau);
    }

    //search kelurahan
    else if (($tarif==NULL) && ($rating==NULL) && ($kelurahan!=NULL)) {
        $syntax = ($base_tanparating . "WHERE " . $carikelurahan . ";");
        $querylau = pg_query("$syntax");
        $jumlah = pg_num_rows($querylau);
    }

    //search tarif
    else if (($tarif!=NULL) && ($rating==NULL) && ($kelurahan==NULL)) {
        $syntax = ($base_tanparating . "WHERE " . $caritarif . ";");
        $querylau = pg_query("$syntax");
        $jumlah = pg_num_rows($querylau);
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laundry - Pencarian</title>
	<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
	<header>
		<div class="container">
		<h2>Hasil Pencarian</h2>
		</div>
	</header>

    <div class="pojok">
		<a href="page_pengguna.php">BERANDA</a>
		<a href="aksilogout.php">LOGOUT</a>
	</div>
    
<div class="konten">
    <div class="cari">
		<form action="searchlaundry.php" method="POST">
			<input type="text" name="tarif" placeholder="Tarif mulai dari ...">
			<!--<input type="text" name="rating" placeholder="Rating minimum">-->
			<select id="rating" name="rating">
					<option value="" disabled selected hidden>Rating minimal ...</option>
					<option value="">(Bebas)</option>
					<option value="1">1/5</option>
					<option value="2">2/5</option>
					<option value="3">3/5</option>
					<option value="4">4/5</option>
					<option value="5">5/5</option>
			</select>
			<select id="kelurahan" name="kelurahan">
					<option value="" disabled selected hidden>Di Kelurahan ...</option>
					<option value="">(Bebas)</option>
					<option value="Cicadas">Cicadas</option>
					<option value="Cibanteng">Cibanteng</option>
					<option value="Ciawi">Ciawi</option>
					<option value="Bojong Rangkas">Bojong Rangkas</option>
					<option value="Ciomas">Ciomas</option>
					<option value="Babakan">Babakan</option>
					<option value="Dramaga">Dramaga</option>
					<option value="Ciherang">Ciherang</option>
					<option value="Cikarawang">Cikarawang</option>
					<option value="Neglasari">Neglasari</option>
					<option value="Petir">Petir</option>
					<option value="Purwasari">Purwasari</option>
					<option value="Sinar Sari">Sinar Sari</option>
					<option value="Sukadamai">Sukadamai</option>
					<option value="Sukawening">Sukawening</option>
			</select>
			<input type="submit" value="Cari" name="cari" />
		</form>
	</div>

    <?php
    if (($_POST['tarif'] == NULL) && ($rating == NULL) && ($kelurahan == NULL)) {
        echo "</br>Silakan masukkan kriteria laundry sesuai kebutuhan Anda.";
    } else {
        if (is_numeric($_POST['tarif']) == FALSE && $_POST['tarif']!=NULL) {
            $jumlah = 0;
        }
        echo "</br>Terdapat <b>" . $jumlah . "</b> laundry yang cocok dengan kriteria Anda.</br></br>";

    ?>

<div class="listlaundry">
	<table>
	<tbody>
		<?php
        if(!is_numeric($_POST['tarif']) && ($_POST['tarif']!=NULL)){
            echo "Pastikan Anda tidak memasukkan karakter apapun selain angka di kolom pencarian tarif.";
        } else {
            while ($data_laundryan = pg_fetch_array($querylau)) {
                $penilaian = pg_query("SELECT ROUND(AVG(rating)::numeric,2) FROM ulasan WHERE idlau = $data_laundryan[idlau]");
                $berapa = pg_fetch_array($penilaian);
                echo "
                    <tr>
                        <td>
                            <p>
                            <h4>" . $data_laundryan['namaus'] . "</h4>";

                            if ($berapa['round'] != NULL) {
                                echo "<p> <b>Rating: </b> " . $berapa['round'] . "/5</br>";
                            } else {
                                echo "<p> <b>Rating: </b> Belum ada </br>";
                            }
                echo "
                            <b>Kelurahan:</b> " . $data_laundryan['kelurahan'] . "</br>
                            <b>Tarif kiloan minimum:</b> Rp" . $data_laundryan['tarif'] . "/kg
                            
                            <a class=button-putih href=page_infolaundry.php?idlau=" . $data_laundryan['idlau'] . ">Lihat info</a>
                            </p>
                            </br>
                        </td>
                    </tr>";
            }
        }
    }
		?>
	</tbody>
	</table>
	</div>

</div>

</body>
</html>
