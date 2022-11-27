<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Login Pengguna</h3>
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
			<?php if(isset($_GET['cek_user'])): ?>
	<p>
		<?php
			if ($_GET['cek_user'] == 'salah'){
				echo "E-mail atau kata sandi salah!";
			} 
		?>
	</p>
	<?php endif; ?>
		</p>
			<input type="submit" value="login" name="login" />
		</p>
		</fieldset>
	</form>


	<h3>Login Pemilik Usaha</h3>
	<form action="aksilogin_pemilik.php" method="POST">
		<fieldset>

		<p>
			<label for="email">E-mail: </label>
			<input type="text" name="email" placeholder="alamat e-mail" />
		</p>
		<p>
			<label for="password">Kata Sandi: </label>
			<input type="password" name="password" placeholder="password" />
		</p>

		<?php if(isset($_GET['cek_owner'])): ?>
		<p>
			<?php
				if ($_GET['cek_owner'] == 'salah'){
					echo "E-mail atau kata sandi salah!";
				} 
			?>
		</p>
		<?php endif; ?>
			<input type="submit" value="Login" name="Login" />
		</p>

		</fieldset>
	</form>

	</body>
</html>
