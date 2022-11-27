<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Pendaftaran Pengguna</h3>
	</header>

	<form action="prosespendaftaran.php" method="POST">
		<fieldset>

		<p>
			<label for="email">E-mail: </label>
			<input type="text" name="email" placeholder="alamat e-mail" />
		</p>
		<p>
			<label for="password">Kata Sandi: </label>
			<input type="password" name="password" placeholder="password" />
		</p>
		<p>
			<label for="nama">Nama Pengguna: </label>
			<input type="text" name="nama" placeholder="nama lengkap" />
		</p>
			<input type="submit" value="Daftar" name="daftar" />
		</p>
		

		</fieldset>
	</form>

	</body>
</html>
