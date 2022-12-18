<?php include("configbaru.php");
	session_start();
	if($_SESSION['idpem']!=NULL && $_SESSION['idlau']!=NULL){

		$idpem = $_SESSION['idpem']; 
		$idlau = $_SESSION['idlau'];

		$querypem = pg_query("SELECT * FROM pemilik WHERE idpem = $idpem");
		$querylau = pg_query("SELECT * FROM laundryan WHERE idlau=$idlau");

		$data_pemilik = pg_fetch_array($querypem);
		$data_laundryan = pg_fetch_array($querylau);

	} else {
		header("Location:page_login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BogorBinatu - Beranda</title>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body>
	<header>
		<div class="container">
			<h2>Selamat datang <i><?php echo"$data_pemilik[nama]"?></i>!</h2>
		</div>
	</header>
	<div class="pojok">
		<a href="page_pemilik.php">BERANDA</a>
		<a href="aksilogout.php">LOGOUT</a>
	</div>

	<div class="konten">
		<h3>Data Pemilik</h3>
		<table>
		<tbody>
			<?php
				echo "<tr>";
				echo "<td class=ket>Email</td>";
				echo "<td class=isi>".$data_pemilik['email']."</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=ket>Nama Pemilik</td>";
				echo "<td class=isi>".$data_pemilik['nama']."</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=ket>Jenis Kelamin</td>";
				echo "<td class=isi>".$data_pemilik['sex']."</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=ket>Kontak</td>";
				echo "<td class=isi>".$data_pemilik['kontak']."</td>";
				echo "</tr>";
			?>
		</tbody>
		</table>
		</br></br>

		<h3>Data Usaha</h3>
		<table>
		<tbody>
			<?php
				echo "<tr>";
				echo "<td class=ket>Nama Usaha</td>";
				echo "<td class=isi>".$data_laundryan['namaus']."</td>";
				echo "</tr>";

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
				echo "<td class=isi>".nl2br($data_laundryan['rincian'])."</td>";
				echo "</tr>";
			?>
		</tbody>
		</table>
	
		</br>
		</br>
			<div class="aksi-akun">
				<a class="button-putih" href=editformpemilik.php>Edit akun</a>
				<a class="button-putih" href=confirmhapus_pemilik.php>Hapus akun</a>
			</div>
		</br>
		</br>
	</div>

	<div class="konten">

	<h3>Ulasan Pengguna</h3>

	<?php 
	$queryulasan = pg_query("SELECT * FROM ulasan WHERE idlau=$idlau ORDER BY tanggal DESC");
	if(pg_num_rows($queryulasan) == 0) {
		// kalo belom ada ulasan yha gausah tampilin apa2 selain ini
		echo "<p>Belum ada ulasan.</p>";
	} else {
		// kalo ada ulasan tampilin rata2 ulasan sama ulasan2nya
		$penilaian = pg_query("SELECT ROUND(AVG(rating)::numeric,2) FROM ulasan WHERE idlau = $idlau");
		$berapa = pg_fetch_array($penilaian);
		echo"<b>Overall Rating:</b> ".$berapa['round']."/5";
	?>
	
	<table >
	<tbody>
	<?php
		while($ulasan = pg_fetch_array($queryulasan)){
			$querynama = pg_query("SELECT nama FROM pengguna WHERE iduser = $ulasan[iduser]");
			$ambilnama = pg_fetch_array($querynama);
			$nama = $ambilnama['nama'];
			echo "<tr>";
			echo "<td class=ulasan>
					Ulasan dari </br><b>".$nama."</b></br>
					".$ulasan['tanggal']."
				</td>";
			echo "<td class=isiul> 
						<b>Rating:</b> ".$ulasan['rating']."/5</br>
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
