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

	<body>
	<header>
	<h3>Data Laundry yang Tersedia di Kabupaten Bogor</h3>
	<table border="1">
	<tbody>
		<?php
		$querylau = pg_query("SELECT * FROM laundryan WHERE idlau=$idlau");
		while($data_laundryan = pg_fetch_array($querylau)){
			echo "<tr>";
			echo "<td>Nama Usaha</td>";
			echo "<td>".$data_laundryan['namaus']."</td>";
			echo "</tr>";

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
	<form action="formulasan.php" method="post">
        <input type="hidden" value="<?=$idpem?>" name="idpem" />
        <input type="submit" value="Beri Ulasan" name="ulasan" />
    </form>

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
