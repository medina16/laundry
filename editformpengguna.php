<?php 
include ("configbaru.php");
if(isset($_POST['editpengguna'])){
    $iduser = (int)$_POST['iduser'];
    $query_pengguna = pg_query("SELECT * FROM pengguna WHERE iduser = $iduser");
    $isiquery_pengguna = pg_fetch_array($query_pengguna);


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
		<h3>Pengeditan Data Pengguna</h3>
	</header>

	<form action="aksiedit_pengguna.php" method="POST">
		<fieldset>

		<h4>Data Pengguna</h4>
		<input type="hidden" name="iduser" value="<?=$iduser?>"/>
		<p>
			<label for="email">E-mail: </label>
			<input type="text" name="email" placeholder="alamat e-mail" value="<?=$isiquery_pengguna['email']?>"/>
		</p>
		<p>
			<label for="password">Kata Sandi: </label>
			<input type="password" name="password" placeholder="password" value="<?=$isiquery_pengguna['password']?>"/>
		</p>
		
		<p>
			<label for="nama">Nama Pengguna: </label>
			<input type="text" name="nama" placeholder='nama lengkap' value="<?=$isiquery_pengguna['nama']?>" />
		</p>
			
		<p>
			<input type="submit" value="Edit" name="edit" />
		</p>
		

		</fieldset>
	</form>

	</body>
</html>
