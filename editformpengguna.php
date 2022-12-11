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
<title>Laundry - Edit Data</title>
</head>

<body>
	<header>
		<h3>Pengeditan Data</h3>
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
