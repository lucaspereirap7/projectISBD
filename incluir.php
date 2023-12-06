<?php
include("./config.php");
$con = mysqli_connect($host, $login, $senha, $bd);
$idViacao = $_POST["idViacao"];
$cnpj = $_POST["cnpj"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$sql = "SELECT idViacao FROM viacao WHERE idViacao=?";

$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $_POST["idViacao"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) != 0) {
  $sql = "UPDATE viacao SET cnpj='" . $_POST["cnpj"] . "', nome='" . htmlspecialchars($nome) . "', email='" . htmlspecialchars($email) . "', logradouro='" . htmlspecialchars($logradouro) . "', numero=" . $numero . ", bairro='" . htmlspecialchars($bairro) . "', cidade='" . htmlspecialchars($cidade) . "', estado='" . htmlspecialchars($estado) . "', cep='" . htmlspecialchars($cep) . "' WHERE idViacao=" . $_POST["idViacao"];
} else {
  $sql = "INSERT INTO viacao (idViacao, cnpj, nome, email, logradouro, numero, bairro, cidade, estado, cep) VALUES (' ', '" . $_POST["cnpj"] . "', '" . htmlspecialchars($nome) . "', '" . htmlspecialchars($email) . "', '" . htmlspecialchars($logradouro) . "', " . $numero . ", '" . htmlspecialchars($bairro) . "', '" . htmlspecialchars($cidade) . "', '" . htmlspecialchars($estado) . "', '" . htmlspecialchars($cep) . "')";
}

mysqli_query($con, $sql);
mysqli_close($con);
header("location: ./index.php");
