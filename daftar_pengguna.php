<!DOCTYPE html>
<html>
<head>
	<title>Laundry - Daftar Sebagai Pengguna</title>
	<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
	<header>
		<div class="container">
			<h2>Pendaftaran Pengguna</h2>
		</div>
	</header>
	
	<div class="daptar">
	<form action="aksidaftar_pengguna.php" method="POST">
		<fieldset>
		<p>
			<label for="email">E-mail</label></br>
			<input type="text" name="email" placeholder="alamat e-mail" maxlength="255" required/>
		</p>
		<p>
			<label for="password">Kata Sandi</label></br>
			<input type="password" name="password" placeholder="password" maxlength="16" required/>
		</p>
		<p>
			<label for="nama">Nama Pengguna</label></br>
			<input type="text" name="nama" placeholder="nama lengkap" maxlength="64" required/>
		</p>
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
