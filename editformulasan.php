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
</head>

<body>
	<header>
		<h3>Ulasan untuk <?php echo "$isiquery_laundryan[namaus]";?>
		</h3>
	</header>

	<form action="aksieditulasan_pengguna.php" method="POST">
		<fieldset>
		<input type="hidden" name="idlau" value="<?=$idlau?>"/>
		<input type="hidden" name="iduser" value="<?=$iduser?>"/>
		<p>
		<?php if($isiquery_ulasan['rating']=='1'){?>
			<label for="rating">Rating: </label>
			<label><input type="radio" name="rating" value="1" checked> 1/5</label>
			<label><input type="radio" name="rating" value="2"> 2/5</label>
			<label><input type="radio" name="rating" value="3"> 3/5</label>
			<label><input type="radio" name="rating" value="4"> 4/5</label>
			<label><input type="radio" name="rating" value="5"> 5/5</label>
		<?php } else if($isiquery_ulasan['rating']=='2'){?>
			<label for="rating">Rating: </label>
			<label><input type="radio" name="rating" value="1"> 1/5</label>
			<label><input type="radio" name="rating" value="2" checked> 2/5</label>
			<label><input type="radio" name="rating" value="3"> 3/5</label>
			<label><input type="radio" name="rating" value="4"> 4/5</label>
			<label><input type="radio" name="rating" value="5"> 5/5</label>
		<?php } else if($isiquery_ulasan['rating']=='3'){?>
			<label for="rating">Rating: </label>
			<label><input type="radio" name="rating" value="1"> 1/5</label>
			<label><input type="radio" name="rating" value="2"> 2/5</label>
			<label><input type="radio" name="rating" value="3" checked> 3/5</label>
			<label><input type="radio" name="rating" value="4"> 4/5</label>
			<label><input type="radio" name="rating" value="5"> 5/5</label>
		<?php } else if($isiquery_ulasan['rating']=='4'){?>
			<label for="rating">Rating: </label>
			<label><input type="radio" name="rating" value="1"> 1/5</label>
			<label><input type="radio" name="rating" value="2"> 2/5</label>
			<label><input type="radio" name="rating" value="3"> 3/5</label>
			<label><input type="radio" name="rating" value="4" checked> 4/5</label>
			<label><input type="radio" name="rating" value="5"> 5/5</label>
		<?php } else if($isiquery_ulasan['rating']=='5'){?>
			<label for="rating">Rating: </label>
			<label><input type="radio" name="rating" value="1"> 1/5</label>
			<label><input type="radio" name="rating" value="2"> 2/5</label>
			<label><input type="radio" name="rating" value="3"> 3/5</label>
			<label><input type="radio" name="rating" value="4"> 4/5</label>
			<label><input type="radio" name="rating" value="5" checked> 5/5</label>
		<?php } ?>
		</p>
		<p>
			<label for="review">Review: </label>
			<textarea name="review" placeholder="penilaian terhadap jasa laundry"><?php echo "$isiquery_ulasan[review]" ?></textarea>
		</p>
		<p>
			<input type="submit" value="Edit" name="edit" />
		</p>
		

		</fieldset>
	</form>

	</body>
</html>
