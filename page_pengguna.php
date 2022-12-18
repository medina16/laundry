<?php include("configbaru.php"); 
	session_start();
	if($_SESSION['iduser']!=NULL){
		$iduser = $_SESSION["iduser"]; 
	} else {
		header("Location:page_login.php");
	}
	$querypengguna = pg_query("SELECT * FROM pengguna WHERE iduser = $iduser");
	$data_pengguna = pg_fetch_array($querypengguna);
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laundry - Beranda</title>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body>
	<header>
		<div class="container">
		<h2>Selamat datang <i><?php echo"$data_pengguna[nama]"?></i>!</h2>
		</div>
	</header>
	
	<div class="pojok">
		<a href="page_pengguna.php">BERANDA</a>
		<a href="aksilogout.php">LOGOUT</a>
	</div>
	<div class="konten">
	<h3>Data Pengguna</h3>
	<table>
	<tbody>
		<?php

			echo "<tr>";
			echo "<td class=ket>Email</td>";
			echo "<td class=isi>".$data_pengguna['email']."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td class=ket>Nama Pengguna</td>";
			echo "<td class=isi>".$data_pengguna['nama']."</td>";
			
			
		?>
	</tbody>
	</table>

		</br>
		</br>
			<div class="aksi-akun">
				<a class="button-putih" href=editformpengguna.php>Edit akun</a>
				<a class="button-putih" href=confirmhapus_pengguna.php>Hapus akun</a>
			</div>

	</div>

	<body>
	<div class="konten">
	<h3>Cari Laundry</h3>
	<div class="cari">
		<form action="searchlaundry.php" method="POST">
			<input type="text" name="tarif" placeholder="Tarif mulai dari ...">
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

	<div class="listlaundry">
	<table>
	<tbody>
		<?php
            $querylau = pg_query("SELECT * FROM laundryan");
            while($data_laundryan = pg_fetch_array($querylau)){
                $penilaian = pg_query("SELECT ROUND(AVG(rating)::numeric,2) FROM ulasan WHERE idlau = $data_laundryan[idlau]");
		        $berapa = pg_fetch_array($penilaian);
                echo "
				<tr>
                	<td>
                        <p>
                        <h4>".$data_laundryan['namaus']."</h4>";
								if($berapa['round']!=NULL){
									echo"<p> <b>Rating: </b> ".$berapa['round']."/5</br>";
								} else {
									echo"<p> <b>Rating: </b> Belum ada </br>";
								}
                echo"
                        <b>Kelurahan: </b>".$data_laundryan['kelurahan']."</br>
                        <b>Tarif kiloan minimum:</b> Rp".$data_laundryan['tarif']."/kg
						
						<a class=button-putih href=page_infolaundry.php?idlau=".$data_laundryan['idlau'].">Lihat info</a>
						</p>
						</br>
                    </td>
                </tr>";
            }
		?>
	</tbody>
	</table>
	</div>

	</div>
	</body>
</html>
