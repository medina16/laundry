<?php
    session_start();
    if(isset($_SESSION['idpem']) && isset($_SESSION['idlau'])){
		header("Location:page_pemilik.php");
	} else if(isset($_SESSION['iduser'])){
		header("Location:page_pengguna.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laundry - Login</title>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body>
	
	<header>
		<div class="container">
			<h2>Login</h2>
		</div>
	</header>

		<div class="wrapper-login">
			<div class="container">
				<div class="tipe-login">
					<h3>Pengguna</h3>
					<form action="aksilogin_pengguna.php" method="POST">
						<fieldset>
						<?php if (isset($_GET['cek_user'])==FALSE){ echo "</br>";}?>
						<p>
							<label for="email">E-mail</label>
						</br>
							<input type="text" name="email" />
						</p>
						
						<p>
							<label for="password">Kata Sandi</label>
						</br>
							<input type="password" name="password" />
						</p>
						
							<?php if(isset($_GET['cek_user'])): ?>
					<p>
						<?php
							if ($_GET['cek_user'] == 'salah'){
								echo "<div class=salahcuy> E-mail atau kata sandi salah!</div>";
							} 
						?>
					</p>
					<?php endif; ?>
						<p>
							<input type="submit" value="Login" name="Login_user" />
							&emsp;Belum punya akun? <a href="daftar_pengguna.php">Daftar </a>
						</p>
						</fieldset>
					</form>
				</div>
				
				<div class="tipe-login">
					<h3>Pemilik Usaha</h3>
					<form action="aksilogin_pemilik.php" method="POST">
						<fieldset>
						<?php if (isset($_GET['cek_owner'])==FALSE){ echo "</br>";}?>
						<p>
							<label for="email">E-mail</label>
						</br>
							<input type="text" name="email" />
						</p>
						<p>
							<label for="password">Kata Sandi</label>
						</br>
							<input type="password" name="password" />
						</p>

						<?php if(isset($_GET['cek_owner'])): ?>
						<p>
							<?php
								if ($_GET['cek_owner'] == 'salah'){
									echo "<div class=salahcuy>E-mail atau kata sandi salah!</div>";
								} 
							?>
						</p>
						<?php endif; ?>
							<input type="submit" value="Login" name="Login_pemilik" />
							&emsp;Belum punya akun? <a href="daftar_pemilik.php">Daftar </a>
						</p>

						</fieldset>
					</form>
				</div>
			</div>
		</div>
	

</body>

</html>
