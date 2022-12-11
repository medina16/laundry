<?php 
include ("configbaru.php");
if(isset($_POST['ulas'])){
	session_start();
	if($_SESSION['iduser']!=NULL){
		$iduser = $_SESSION["iduser"]; 
	} else {
		header("Location:page_login.php");
	}
    $idlau = $_POST['idlau'];
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
	<title>Laundry - Beri Ulasan</title>
	<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
	<header>
		<div class="container">
			<h2>Ulasan untuk: <i><?php echo "$isiquery_laundryan[namaus]";?></i></h2>
		</div>
	</header>

	<div class="daptar">
	<form action="aksiulas_pengguna.php" method="POST">
		<fieldset>
		<input type="hidden" name="idlau" value="<?=$idlau?>"/>
		<input type="hidden" name="iduser" value="<?=$iduser?>"/>
		<p>
			<label for="rating">Rating</label></br>
			<label><input type="radio" name="rating" value="1" required> 1/5</label>
			<label><input type="radio" name="rating" value="2"> 2/5</label>
			<label><input type="radio" name="rating" value="3"> 3/5</label>
			<label><input type="radio" name="rating" value="4"> 4/5</label>
			<label><input type="radio" name="rating" value="5"> 5/5</label>
		</p>
		<p>
			<label for="review">Review</label></br>
			<textarea name="review" placeholder="penilaian terhadap jasa laundry" maxlength="250"></textarea>
		</p>
		<p>
			<input type="submit" value="Submit" name="submit" />
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
