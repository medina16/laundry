<?php include("configbaru.php"); 
	$id = $_GET['iduser']; 
	$query = pg_query("SELECT * FROM pengguna WHERE iduser = $id");
	$isiquery = pg_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<header>
		<h1>Selamat Datang Pengguna!</h1>
		<h3>Silahkan Berikan Ulasanmu untuk Laundry di Kabupaten Bogor</h3>
	</header>
	

	<h3>Data Pengguna</h3>
	<table border="1">
	<tbody>
		<?php
		$querypengguna = pg_query("SELECT * FROM pengguna WHERE iduser = $id");
		while($data_pengguna = pg_fetch_array($querypengguna)){
			echo "<tr>";
			echo "<td>Email</td>";
			echo "<td>".$data_pengguna['email']."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>Nama Pengguna</td>";
			echo "<td>".$data_pengguna['nama']."</td>";
			
			}
		?>
	</tbody>
	</table>

	
	</br>
	<form action="editformpengguna.php" method="post">
        <input type="hidden" value="<?=$id?>" name="iduser" />
        <input type="submit" value="Edit Data" name="editpengguna" />
    </form>

	<?php include("configbaru.php"); ?>

	<h3>Ulasan Pengguna</h3>
	<?php 
		$penilaian = pg_query("SELECT ROUND(AVG(rating)::numeric,2) FROM ulasan WHERE idlau = $idd");
		$berapa = pg_fetch_array($penilaian);
		echo"<h4>Overall Rating: ".$berapa['round']."/5</h4>";
	?>

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
