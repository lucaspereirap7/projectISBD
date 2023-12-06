<?php
	include("./config.php");
	$con = mysqli_connect($host, $login, $senha, $bd);
	$sql = "DELETE FROM viacao WHERE idViacao=".$_GET["idViacao"];
	mysqli_query($con, $sql);
	header("location: ./index.php");
?>