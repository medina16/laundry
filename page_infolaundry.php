<?php include("configbaru.php"); 
	$idd = $_GET['idlau']; 
	$query = pg_query("SELECT * FROM laundryan WHERE idlau = $idd");
	$isiquery = pg_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<header>
	<?php echo "<h1>Info Laundry: ".$isiquery['namaus']."</h1>"; ?>
	</header>

	
	<table border="1">
	<tbody>
		<?php
		$querylau = pg_query("SELECT * FROM laundryan WHERE idlau=$idd");
		while($data_laundryan = pg_fetch_array($querylau)){

			echo "<tr>";
			echo "<td>Alamat</td>";
			echo "<td>".$data_laundryan['alamat']."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>Kelurahan</td>";
			echo "<td>".$data_laundryan['kelurahan']."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>Kontak Telepon</td>";
			echo "<td>".$data_laundryan['kontak']."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>Tarif Laundry Kiloan Minimum</td>";
			echo "<td>".$data_laundryan['tarif']."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>Rincian Harga</td>";
			echo "<td>".nl2br($data_laundryan['rincian'])."</td>";
			echo "</tr>";
			}
		?>
	</tbody>
	</table>
	
	</br>
	

	<h2>Ulasan Pengguna</h2>

	<?php 
	$penilaian = pg_query("SELECT ROUND(AVG(rating)::numeric,2) FROM ulasan WHERE idlau = $idd");
	$berapa = pg_fetch_array($penilaian);
	echo"<h4>Overall Rating: ".$berapa['round']."/5</h4>"
	?>

	<form action="formulasan.php" method="post">
        <input type="hidden" value="<?=$idd?>" name="idlau" />
		<!--di sini juga tambahin type hidden isi id user-->
        <input type="submit" value="Beri ulasan" name="ulas" />
    </form>
	</br>

	<table border="1">
	<tbody>
	<?php
		$queryulasan = pg_query("SELECT * FROM ulasan WHERE idlau=$idd ORDER BY tanggal DESC");
		while($ulasan = pg_fetch_array($queryulasan)){
			echo "<tr>";
			echo "<td>
					Ulasan dari <b>".$ulasan['iduser']."</b></br>
					".$ulasan['tanggal']."
				</td>";
			echo "<td> 
			<b>Rating:</b> ".$ulasan['rating']."/5</br>
			<b>Ulasan:</b></br>
			".nl2br($ulasan['review'])."
			</td>";
			echo "</tr>";
			}
		?>
	</tbody>
	</table>

	<?php if(isset($_GET['status'])): ?>
	<p>
		<?php
			if ($_GET['status'] == 'sukses'){
				echo "Pendaftaran siswa baru berhasil!";
			} else if ($_GET['status'] == 'gagal'){
				echo "Pendaftaran gagal!";
			} 
		?>
	</p>
	<?php endif; ?>

	</body>
</html>
