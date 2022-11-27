<?php 
include ("configbaru.php");
if(isset($_POST['editpemilik'])){
    $idpem = (int)$_POST['idpem'];
    $query_pemilik = pg_query("SELECT * FROM pemilik WHERE idpem = $idpem");
    $isiquery_pemilik = pg_fetch_array($query_pemilik);

    $query_laundryan = pg_query("SELECT * FROM laundryan WHERE idpem = $idpem");
    $isiquery_laundryan = pg_fetch_array($query_laundryan);
	$idlau = $isiquery_laundryan['idlau'];

} else {
	//header("Location: page_pemilik.php");
	die("Akses dilarang...");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Pengeditan Data</h3>
	</header>

	<form action="aksiedit_pemilik.php" method="POST">
		<fieldset>

		<h4>Data Pemilik</h4>
		<input type="hidden" name="idpem" value="<?=$idpem?>"/>
		<p>
			<label for="email">E-mail: </label>
			<input type="text" name="email" placeholder="alamat e-mail" value="<?=$isiquery_pemilik['email']?>"/>
		</p>
		<p>
			<label for="password">Kata Sandi: </label>
			<input type="password" name="password" placeholder="password" value="<?=$isiquery_pemilik['password']?>"/>
		</p>
		
		<p>
			<label for="nama">Nama Pemilik: </label>
			<input type="text" name="nama" placeholder='nama lengkap' value="<?=$isiquery_pemilik['nama']?>" />
		</p>
		<p>
			<label for="jenis_kelamin">Jenis Kelamin: </label>
			<?php if($isiquery_pemilik['sex']=='perempuan'){?> <!-- ini c nya ganti janlup -->
				<label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
				<label><input type="radio" name="jenis_kelamin" value="perempuan" checked> Perempuan</label>
			<?php } else {?>
				<label><input type="radio" name="jenis_kelamin" value="laki-laki" checked> Laki-laki</label>
				<label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
			<?php } ?>
		</p>
		<p>
			<label for="kontak">Kontak: </label>
			<input type="text" name="kontak" placeholder="nomor telepon" value="<?=$isiquery_pemilik['kontak']?>"/>
		</p>

		<h4>Data Usaha</h4>
		<input type="hidden" name="idlau" value="<?=$idlau?>"/>
		<p> 
			<label for="lname">Nama Usaha: </label>
			<input type="text" name="lname" placeholder="nama usaha laundry" value="<?=$isiquery_laundryan['namaus']?>" />
		</p>
		<p>
			<label for="alamat">Alamat: </label>
			<textarea name="alamat" placeholder="alamat usaha"><?php echo "$isiquery_laundryan[alamat]" ?></textarea>
		</p>
		<p>
			<label for="kelurahan">Kelurahan:</label>
			<select id="kelurahan" name="kelurahan">
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
		</p>
		<p>
			<label for="kontakk">Kontak: </label>
			<input type="text" name="kontakk" placeholder="nomor telepon" value="<?=$isiquery_laundryan['kontak']?>" />
		</p>
		<p>
			<label for="price">Tarif Laundry Kiloan Minimum: </label>
			<input type="text" name="price" placeholder="Rp/kg" value="<?=$isiquery_laundryan['tarif']?>"/>
		</p>
		<p>
			<label for="deskripsi">Rincian: </label>
			<textarea name="deskripsi" placeholder="deskripsi usaha laundry dan daftar tarif laundry lengkap"><?php echo "$isiquery_laundryan[rincian]" ?></textarea>
		</p>
			
		<p>
			<input type="submit" value="Edit" name="edit" />
		</p>
		

		</fieldset>
	</form>

	</body>
</html>
