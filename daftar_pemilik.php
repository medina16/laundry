<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Pendaftaran Pemilik Usaha Laundry</h3>
	</header>

	<form action="aksidaftar_pemilik.php" method="POST">
		<fieldset>

		<h4>Data Pemilik</h4>
		<p>
			<label for="email">E-mail: </label>
			<input type="text" name="email" placeholder="alamat e-mail" />
		</p>
		<p>
			<label for="password">Kata Sandi: </label>
			<input type="password" name="password" placeholder="password" />
		</p>
		<p>
			<label for="nama">Nama Pemilik: </label>
			<input type="text" name="nama" placeholder="nama lengkap" />
		</p>
		<p>
			<label for="jenis_kelamin">Jenis Kelamin: </label>
			<label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
			<label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
		</p>
		<p>
			<label for="kontak">Kontak: </label>
			<input type="text" name="kontak" placeholder="nomor telepon" />
		</p>

		<h4>Data Usaha</h4>
		<p> 
			<label for="lname">Nama Usaha: </label>
			<input type="text" name="a" placeholder="nama usaha laundry" />
		</p>
		<p>
			<label for="alamat">Alamat: </label>
			<textarea name="b" placeholder="alamat usaha"></textarea>
		</p>
		<p>
			<label for="kelurahan">Kelurahan:</label>
			<select id="kelurahan" name="c">
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
			<label for="kontak">Kontak: </label>
			<input type="text" name="d" placeholder="nomor telepon" />
		</p>
		<p>
			<label for="price">Tarif Laundry Kiloan Minimum: </label>
			<input type="text" name="e" placeholder="Rp/kg" />
		</p>
		<p>
			<label for="deskripsi">Rincian: </label>
			<textarea name="f" placeholder="deskripsi usaha laundry dan daftar tarif laundry lengkap"></textarea>
		</p>
		<p>
			<input type="submit" value="Daftar" name="daftar" />
		</p>
		

		</fieldset>
	</form>

	</body>
</html>
