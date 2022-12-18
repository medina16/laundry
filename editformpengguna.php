<?php 
include ("configbaru.php");

	session_start();
	if($_SESSION['iduser']!=NULL){
		$iduser = $_SESSION["iduser"]; 
	} else {
		header("Location:page_login.php");
	}

    $query_pengguna = pg_query("SELECT * FROM pengguna WHERE iduser = $iduser");
    $isiquery_pengguna = pg_fetch_array($query_pengguna);

?>

<!DOCTYPE html>
<html>
<head>
	<title>BogorBinatu - Edit Data</title>
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
	<form action="aksiedit_pengguna.php" method="POST">
		<fieldset>
		<h4>Data Pengguna</h4>
		<input type="hidden" name="iduser" value="<?=$iduser?>"/>
		<p>
			<label for="email">E-mail</label></br>
			<input type="text" name="email" placeholder="alamat e-mail" maxlength="255" required value="<?=$isiquery_pengguna['email']?>"/>
		</p>
		<p>
			<label for="password">Kata Sandi</label></br>
			<input type="password" name="password" placeholder="password" maxlength="16" required value="<?=$isiquery_pengguna['password']?>"/>
		</p>
		<p>
			<label for="nama">Nama Pengguna</label></br>
			<input type="text" name="nama" placeholder="nama lengkap" maxlength="64" required value="<?=$isiquery_pengguna['nama']?>"/>
		</p>
		<p>
			<input type="submit" value="Edit" name="edit" />
			<a class="button-putih" href="
					<?php if (isset($_SERVER['HTTP_REFERER'])) {
						echo "$_SERVER[HTTP_REFERER]";
					} else {
						echo "page_pengguna.php";}?>">Batal
			</a>
		</p>
		</fieldset>
	</form>
	</div>

	</body>
</html>
