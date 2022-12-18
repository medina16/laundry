<!DOCTYPE html>
<html>
<head>
	<title>Laundry - Daftar Sebagai Pemilik Usaha</title>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body>
	<header>
		<div class="container">
			<h2>Pendaftaran Pemilik Usaha</h2>
		</div>
	</header>
	
	<div class="daptar">
	<form action="aksidaftar_pemilik.php" method="POST">
		<fieldset>

		<h4 style="text-align:center;">Data Pemilik</h4>
		
		<p> <label for="email">E-mail</label></br>
		<input type="text" name="email" placeholder="alamat e-mail" maxlength="255" required/></p>

		<p><label for="password">Kata Sandi</label></br>
		<input type="password" name="password" placeholder="password" maxlength="16" required/></p>

		<p><label for="nama">Nama Pemilik</label></br>
		<input type="text" name="nama" placeholder="nama lengkap" maxlength="64" required/></p>

		<p>
			<label for="jenis_kelamin">Jenis Kelamin</label></br>
			<label><input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki</label>
			<label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
		</p>
		<p>
			<label for="kontakpemilik">Kontak</label></br>
			<input type="text" name="kontakpemilik" placeholder="nomor telepon" maxlength="64" required/>
		</p>

		</br>
		<h4 style="text-align:center;">Data Usaha</h4>
		<p> 
			<label for="namaus">Nama Usaha</label></br>
			<input type="text" name="namaus" placeholder="nama usaha laundry" maxlength="255" required/>
		</p>
		<p>
			<label for="alamat">Alamat</label></br>
			<textarea name="alamat" placeholder="alamat usaha" maxlength="255" required></textarea>
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
			<label for="kontaklaundry">Kontak</label></br>
			<input type="text" name="kontaklaundry" placeholder="nomor telepon" maxlength="30" required/>
		</p>
		<p>
			<label for="tarif">Tarif Kiloan Minimum</label></br>
			<input type="number" name="tarif" placeholder="Rp/kg" required/>
		</p>
		<p>
			<label for="rincian">Rincian Harga</label></br>
			<textarea name="rincian" placeholder="daftar tarif laundry lengkap" maxlength="200" required></textarea>
		</p>
		<p>
			<input type="submit" value="Daftar" name="daftar" />
			<a class="button-putih" href="
					<?php if (isset($_SERVER['HTTP_REFERER'])) {
						echo "$_SERVER[HTTP_REFERER]";
					} else {
						echo "index.php";}?>
			">Batal
			</a>
		</p>
		

		</fieldset>
	</form>
	</div>

	</body>
</html>
