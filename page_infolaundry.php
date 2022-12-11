<?php include("configbaru.php"); 
	$idlau = $_GET['idlau']; 
	$query = pg_query("SELECT * FROM laundryan WHERE idlau = $idlau");
	$isiquery = pg_fetch_array($query);
	
	session_start();
	if($_SESSION['iduser']!=NULL){
		$iduser = $_SESSION["iduser"]; 
	} else {
		header("Location:page_login.php");
	}

	$querynamauser = pg_query("SELECT nama FROM pengguna WHERE iduser = $iduser");
	$ambilnamauser = pg_fetch_array($querynamauser);

	$querylau = pg_query("SELECT * FROM laundryan WHERE idlau=$idlau");
    $data_laundryan = pg_fetch_array($querylau);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Laundry - <?php echo"$data_laundryan[namaus]"?></title>
	<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
	<header>
		<?php echo "<div class=container> <h2>Info Laundry: <i>".$data_laundryan['namaus']."</i></h2> </div>"; ?>
	</header>

	<div class="pojok">
		<a href="page_pengguna.php">BERANDA</a>
		<a href="aksilogout.php">LOGOUT</a>
	</div>

	<div class="konten">
	<h3>Rincian</h3>
	<table>
	<tbody>
		<?php

			echo "<tr>";
			echo "<td class=ket>Alamat</td>";
			echo "<td class=isi>".$data_laundryan['alamat']."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td class=ket>Kelurahan</td>";
			echo "<td class=isi>".$data_laundryan['kelurahan']."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td class=ket>Kontak Telepon</td>";
			echo "<td class=isi>".$data_laundryan['kontak']."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td class=ket>Tarif Kiloan Minimum</td>";
			echo "<td class=isi>Rp".$data_laundryan['tarif']."/kg</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td class=ket>Rincian Harga</td>";
			echo "<td class=isiterakhir>".nl2br($data_laundryan['rincian'])."</td>";
			echo "</tr>";

		?>
	</tbody>
	</table>
	
	
	</div>
	
	<div class="konten">
	<h3>Ulasan Pengguna</h3>
	
	<?php 
	$ulasansanguser = pg_query("SELECT * FROM ulasan WHERE iduser=$iduser AND idlau=$idlau");
    $apaulasanuser = pg_fetch_array($ulasansanguser);
	//kalo user belom pernah ngasih ulasan, tampilin tombol "beri ulasan"
	if(pg_num_rows($ulasansanguser) == 0) { echo"
	<div class=tombolulas>
		<form action=formulasan.php method=post>
			<input type=hidden value=".$idlau." name=idlau />
			<input type=submit value='Beri ulasan' name=ulas />
		</form>
	</div>";
	}
	?>

	<?php
	$queryulasan = pg_query("SELECT * FROM ulasan WHERE idlau=$idlau ORDER BY tanggal DESC");
    if (pg_num_rows($queryulasan) == 0) {
	    // kalo belom ada ulasan yha gausah tampilin apa2 selain ini
    	echo "</br>Belum ada ulasan.";
    }
	?>

	<?php 
	$queryulasan = pg_query("SELECT * FROM ulasan WHERE idlau=$idlau ORDER BY tanggal DESC");
	if(pg_num_rows($queryulasan) != 0) {
		// kalo ada ulasan tampilin rata2 ulasan sama ulasan2nya
		$penilaian = pg_query("SELECT ROUND(AVG(rating)::numeric,2) FROM ulasan WHERE idlau = $idlau");
		$berapa = pg_fetch_array($penilaian);
		echo"<p></br><b>Overall Rating:</b> ".$berapa['round']."/5</p>";}
	?>
	
	
	<table>
	<tbody>
		<?php if(pg_num_rows($ulasansanguser)!=0) { echo"
		<tr>
			<td class=ulasan> Ulasan dari</br><b>".$ambilnamauser['nama']."</b> (Anda)</br>
			".$apaulasanuser['tanggal']."
				<form action=editformulasan.php method=post>
        			<input type=hidden value=".$idlau." name=idlau />
					<input type=hidden value=".$iduser." name=iduser />
        			<input type=submit value='Edit' name=editulasan />
    			</form>
				<form action=confirmhapus_ulasan.php method=post>
        			<input type=hidden value=".$idlau." name=idlau />
					<input type=hidden value=".$iduser." name=iduser />
        			<input type=submit value='Hapus' name=hapusulasan />
    			</form>
			</td>
			<td class=isiul>
					<p><b>Rating:</b> ".$apaulasanuser['rating']."/5</br>
					<b>Ulasan:</b>";
						if($apaulasanuser['review']!=NULL){
							echo"</br>" . nl2br($apaulasanuser['review']) . "";
						} else {
							echo" -";
						} echo"
					</td>
					</tr>
		";}?>
	<?php
		while($ulasan = pg_fetch_array($queryulasan)){
			$querynama = pg_query("SELECT nama FROM pengguna WHERE iduser = $ulasan[iduser]");
			$ambilnama = pg_fetch_array($querynama);
			$nama = $ambilnama['nama'];
				if ($nama != $ambilnamauser['nama']) {
					echo "<td class=ulasan>
						Ulasan dari </br><b>" . $nama . "</b></br>
						" . $ulasan['tanggal'] . "";
					echo "</td>";
					echo "<td class=isiul> 
						<b>Rating:</b> " . $ulasan['rating'] . "/5</br>
						<b>Ulasan:</b>";
						if($ulasan['review']!=NULL){
							echo"</br>" . nl2br($ulasan['review']) . "";
						} else {
							echo" -";
						} echo"
					</td>
					</tr>";
				}
		}
		?>
	</tbody>
	</table>
	</div>


</body>

</html>
