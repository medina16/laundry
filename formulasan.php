<?php 
include ("configbaru.php");
if(isset($_POST['ulas'])){
    $idlau = $_POST['idlau'];
	$iduser = $_POST['iduser'];
    $query_laundryan = pg_query("SELECT * FROM laundryan WHERE idlau = $idlau");
    $isiquery_laundryan = pg_fetch_array($query_laundryan);

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
		<h3>Ulasan untuk <?php echo "$isiquery_laundryan[namaus]";?>
		</h3>
	</header>

	<form action="aksiulas_pelanggan.php" method="POST">
		<fieldset>
		<input type="hidden" name="idlau" value="<?=$idlau?>"/>
		<input type="hidden" name="iduser" value="<?=$iduser?>"/>
		<p>
			<label for="rating">Rating: </label>
			<label><input type="radio" name="rating" value="1"> 1/5</label>
			<label><input type="radio" name="rating" value="2"> 2/5</label>
			<label><input type="radio" name="rating" value="3"> 3/5</label>
			<label><input type="radio" name="rating" value="4"> 4/5</label>
			<label><input type="radio" name="rating" value="5"> 5/5</label>
		</p>
		<p>
			<label for="review">Review: </label>
			<textarea name="review" placeholder="penilaian terhadap jasa laundry"></textarea>
		</p>
		<p>
			<input type="submit" value="Submit" name="submit" />
		</p>
		

		</fieldset>
	</form>

	</body>
</html>
