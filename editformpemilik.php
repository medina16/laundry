<?php 
include ("configbaru.php");
session_start();
	if($_SESSION['idpem']!=NULL && $_SESSION['idlau']!=NULL){
		
		$idpem = $_SESSION['idpem']; 
		$idlau = $_SESSION['idlau']; 
		
    	$query_pemilik = pg_query("SELECT * FROM pemilik WHERE idpem = $idpem");
    	$isiquery_pemilik = pg_fetch_array($query_pemilik);

    	$query_laundryan = pg_query("SELECT * FROM laundryan WHERE idpem = $idpem");
    	$isiquery_laundryan = pg_fetch_array($query_laundryan);
	

	} else {
		header("Location:page_login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Laundry - Edit Data</title>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body>
	<header>
		<div class="container">
			<h2>Pengeditan Data</h2>
		</div>
	</header>
	
	<div class="daptar">
	<form action="aksiedit_pemilik.php" method="POST">
		<fieldset>

		<h4 style="text-align:center;">Data Pemilik</h4>

		<input type="hidden" name="idpem" value="<?=$idpem?>"/>
		
		<p> <label for="email">E-mail</label></br>
		<input type="text" name="email" placeholder="alamat e-mail" maxlength="255" required value="<?=$isiquery_pemilik['email']?>"/></p>

		<p><label for="password">Kata Sandi</label></br>
		<input type="password" name="password" placeholder="password" maxlength="16" required value="<?=$isiquery_pemilik['password']?>"/></p>

		<p><label for="nama">Nama Pemilik</label></br>
		<input type="text" name="nama" placeholder="nama lengkap" maxlength="64" required value="<?=$isiquery_pemilik['nama']?>"/></p>

		<p>
			<label for="jenis_kelamin">Jenis Kelamin</label></br>
			<?php if($isiquery_pemilik['sex']=='perempuan'){?> <!-- ini c nya ganti janlup -->
				<label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
				<label><input type="radio" name="jenis_kelamin" value="perempuan" checked> Perempuan</label>
			<?php } else {?>
				<label><input type="radio" name="jenis_kelamin" value="laki-laki" checked> Laki-laki</label>
				<label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
			<?php } ?>
		</p>
		<p>
			<label for="kontak">Kontak</label></br>
			<input type="text" name="kontak" placeholder="nomor telepon" maxlength="64" required value="<?=$isiquery_pemilik['kontak']?>"/>
		</p>

		</br>
		<h4 style="text-align:center;">Data Usaha</h4>
		<input type="hidden" name="idlau" value="<?=$idlau?>"/>
		<p> 
			<label for="lname">Nama Usaha</label></br>
			<input type="text" name="lname" placeholder="nama usaha laundry" maxlength="255" required value="<?=$isiquery_laundryan['namaus']?>"/>
		</p>
		<p>
			<label for="alamat">Alamat</label></br>
			<textarea name="alamat" placeholder="alamat usaha" maxlength="255" required><?php echo "$isiquery_laundryan[alamat]" ?></textarea>
		</p>
		<p>
			<label for="kelurahan">Kelurahan</label></br>
			<select id="kelurahan" name="kelurahan" required>
				<option value="" disabled selected hidden>Kelurahan</option>
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
			<label for="kontakk">Kontak</label></br>
			<input type="text" name="kontakk" placeholder="nomor telepon" maxlength="30" required value="<?=$isiquery_laundryan['kontak']?>"/>
		</p>
		<p>
			<label for="price">Tarif Minimum</label></br>
			<input type="number" name="price" placeholder="Rp/kg" placeholder="Rp/kg" value="<?=$isiquery_laundryan['tarif']?>"required/>
		</p>
		<p>
			<label for="deskripsi">Rincian</label></br>
			<textarea name="deskripsi" placeholder="daftar tarif laundry lengkap" maxlength="200" required><?php echo "$isiquery_laundryan[rincian]" ?></textarea>
		</p>
		<p>
			<input type="submit" value="Edit" name="edit" />
			<a class="button-putih" href="
					<?php if (isset($_SERVER['HTTP_REFERER'])) {
						echo "$_SERVER[HTTP_REFERER]";
					} else {
						echo "page_pemilik.php";}?>
			">Batal
			</a>
		</p>
		

		</fieldset>
	</form>
	</div>

	</body>
</html>
