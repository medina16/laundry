<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<header>
		<h1>Laundry</h1>
		<h3>Laundry di Kabupaten Bogor</h3>
	</header>

	<h4>Daftar</h4>
	<nav>
		<ul>
			<li><a href="daftar_pengguna.php">Daftar sebagai pengguna</a></li>
			<li><a href="daftar_pemilik.php">Daftar sebagai pemilik</a></li>
		</ul>
	</nav>

	<h4>Login</h4>
	<nav>
		<ul>
			<li><a href="page_login.php">Login</a></li>
		</ul>
	</nav>


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
