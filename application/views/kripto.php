<html>
<head>

</head>
<bodu>
<h1>This is Cryptographi!</h1>
<?php if(isset($arrChipper)){
	$link = "encrypt";
}else{
	$link = "kriptograph/encrypt";
} ?>
<form name="Encript" method="POST" action="<?php echo $link; ?>">
<label>Masukkan Plain Text :</label>
<input type="text" name="plainTxt">
<label>Masukkan Kata Kunci :</label>
<input type="text" name="key">
<input type="submit" name="submitted" value="Encrypt!" >
<br><br>
<hr>

<?php if(isset($arrChipper)){?>

	<label> Chipper Text : <?php echo implode($arrChipper)?></label>

<?php } ?>
</form>
</bodu>
</html>