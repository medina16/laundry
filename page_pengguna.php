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
            $querylau = pg_query("SELECT * FROM laundryan");
            while($data_laundryan = pg_fetch_array($querylau)){
                $penilaian = pg_query("SELECT ROUND(AVG(rating)::numeric,2) FROM ulasan WHERE idlau = $data_laundryan[idlau]");
		        $berapa = pg_fetch_array($penilaian);
                echo "<tr>";
                echo "<td>
                        </p>
                        <b>".$data_laundryan['namaus']."</b>
                        <p> <b>Rating: ".$berapa['round']."/5</b></br>
                        <b>Kelurahan</b>           : ".$data_laundryan['kelurahan']."</br>
                        <b>Tarif kiloan minimum</b>: ".$data_laundryan['tarif']."</br>
                        <form action=page_infolaundry.php?idlau=".$data_laundryan['idlau']." method=post>
                            <input type=hidden value=".$id." name=iduser />
                            <input type=submit value='Lihat info' name=ingpo />
                        </form>
                        </p>
                    </td>";
                echo "</tr>";
            }
		?>
	</tbody>
	</table>
	
	</br>

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
