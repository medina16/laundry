<?php 
include ("configbaru.php");
if(isset($_POST['editulasan'])){
	session_start();
    $idlau = $_POST['idlau'];
	$iduser = $_SESSION['iduser'];

    $query_laundryan = pg_query("SELECT * FROM laundryan WHERE idlau = $idlau");
    $isiquery_laundryan = pg_fetch_array($query_laundryan);

	$query_ulasan = pg_query("SELECT * FROM ulasan WHERE idlau = $idlau AND iduser = $iduser");
    $isiquery_ulasan = pg_fetch_array($query_ulasan);

} else {
	//header("Location: page_pemilik.php");
	die("Akses dilarang...");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laundry - Edit Ulasan</title>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body>
	<header>
		<div class="container">
			<h2>Mengedit Ulasan untuk: <i><?php echo "$isiquery_laundryan[namaus]";?></i></h2>
		</div>
	</header>

	<div class="daptar">
	<form action="aksieditulasan_pengguna.php" method="POST">
		<fieldset>
		<input type="hidden" name="idlau" value="<?=$idlau?>"/>
		<input type="hidden" name="iduser" value="<?=$iduser?>"/>
		<?php if($isiquery_ulasan['rating']=='1'){?>
			<label for="rating">Rating</label></br>
			<label><input type="radio" name="rating" value="1" checked> 1/5</label>
			<label><input type="radio" name="rating" value="2"> 2/5</label>
			<label><input type="radio" name="rating" value="3"> 3/5</label>
			<label><input type="radio" name="rating" value="4"> 4/5</label>
			<label><input type="radio" name="rating" value="5"> 5/5</label>
		<?php } else if($isiquery_ulasan['rating']=='2'){?>
			<label for="rating">Rating</label></br>
			<label><input type="radio" name="rating" value="1"> 1/5</label>
			<label><input type="radio" name="rating" value="2" checked> 2/5</label>
			<label><input type="radio" name="rating" value="3"> 3/5</label>
			<label><input type="radio" name="rating" value="4"> 4/5</label>
			<label><input type="radio" name="rating" value="5"> 5/5</label>
		<?php } else if($isiquery_ulasan['rating']=='3'){?>
			<label for="rating">Rating</label></br>
			<label><input type="radio" name="rating" value="1"> 1/5</label>
			<label><input type="radio" name="rating" value="2"> 2/5</label>
			<label><input type="radio" name="rating" value="3" checked> 3/5</label>
			<label><input type="radio" name="rating" value="4"> 4/5</label>
			<label><input type="radio" name="rating" value="5"> 5/5</label>
		<?php } else if($isiquery_ulasan['rating']=='4'){?>
			<label for="rating">Rating</label></br>
			<label><input type="radio" name="rating" value="1"> 1/5</label>
			<label><input type="radio" name="rating" value="2"> 2/5</label>
			<label><input type="radio" name="rating" value="3"> 3/5</label>
			<label><input type="radio" name="rating" value="4" checked> 4/5</label>
			<label><input type="radio" name="rating" value="5"> 5/5</label>
		<?php } else if($isiquery_ulasan['rating']=='5'){?>
			<label for="rating">Rating</label></br>
			<label><input type="radio" name="rating" value="1"> 1/5</label>
			<label><input type="radio" name="rating" value="2"> 2/5</label>
			<label><input type="radio" name="rating" value="3"> 3/5</label>
			<label><input type="radio" name="rating" value="4"> 4/5</label>
			<label><input type="radio" name="rating" value="5" checked> 5/5</label>
		<?php } ?>
		<p>
			<label for="review">Review</label></br>
			<textarea name="review" placeholder="penilaian terhadap jasa laundry" maxlength="250"><?php echo "$isiquery_ulasan[review]" ?></textarea>
		</p>
		<p>
			<input type="submit" value="Edit" name="edit" />
			<a class="button-putih" href="
					<?php if (isset($_SERVER['HTTP_REFERER'])) {
						echo "$_SERVER[HTTP_REFERER]";
					} else {
						echo "page_pengguna.php";}?>
			">Batal
			</a>
		</p>
		

		</fieldset>
	</form>
</div>

	</body>
</html>
