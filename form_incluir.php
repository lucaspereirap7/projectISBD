<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
	<link type="text/css" rel="stylesheet" href="estilos.css" />
	<title>Incluir/Editar uma Viação.</title>
</head>

<body>
	<form id="form_viacao" method="post" action="incluir.php">
		<div id="cabecalho">
			<?php
			if (isset($_GET["idViacao"])) {
				include("./config.php");
				$con = mysqli_connect($host, $login, $senha, $bd);
			?>
				<h2>Editar Viação</h2>
				<?php
				$sql = "SELECT * FROM viacao WHERE idViacao=" . $_GET['idViacao'];
				$result = mysqli_query($con, $sql);
				$vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
				mysqli_close($con);
				?>
				<input type="hidden" name="idViacao" value="<?php echo $_GET['idViacao']; ?>" />
			<?php
			} else {
			?>
				<h2>Cadastrar Nova viação</h2>
			<?php
			}
			if (!isset($vetor)) {
				$vetor['cnpj'] = '';
				$vetor['nome'] = '';
				$vetor['email'] = '';
				$vetor['logradouro'] = '';
				$vetor['numero'] = '';
				$vetor['bairro'] = '';
				$vetor['cidade'] = '';
				$vetor['estado'] = '';
				$vetor['cep'] = '';
			}
			?>
		</div>
		<div id="principal">
			<table>
				<tr>
					<td class="celula">Cnpj:</td>
					<td>
						<input type="text" name="cnpj" value="<?php echo $vetor['cnpj']; ?>" maxlength="14" size="15" />
					</td>
				</tr>
				<tr>
					<td class="celula">Nome:</td>
					<td>
						<input type="text" name="nome" value="<?php echo $vetor['nome']; ?>" maxlength="80" size="81" />
					</td>
				</tr>
				<tr>
					<td class="celula">Email:</td>
					<td>
						<input type="text" name="email" value="<?php echo $vetor['email']; ?>" maxlength="30" size="31" />
					</td>
				</tr>
				<tr>
					<td class="celula">Logradouro:</td>
					<td>
						<input type="text" name="logradouro" value="<?php echo $vetor['logradouro']; ?>" maxlength="40" size="41" />
					</td>
				</tr>
				<tr>
					<td class="celula">Numero:</td>
					<td>
						<input type="text" name="numero" value="<?php echo $vetor['numero']; ?>" maxlength="11" size="12" />
					</td>
				</tr>
				<tr>
					<td class="celula">Bairro:</td>
					<td>
						<input type="text" name="bairro" value="<?php echo $vetor['bairro']; ?>" maxlength="30" size="31" />
					</td>
				</tr>
				<tr>
					<td class="celula">Cidade:</td>
					<td>
						<input type="text" name="cidade" value="<?php echo $vetor['cidade']; ?>" maxlength="30" size="31" />
					</td>
				</tr>
				<tr>
					<td class="celula">Estado:</td>
					<td>
						<input type="text" name="estado" value="<?php echo $vetor['estado']; ?>" maxlength="2" size="3" />
					</td>
				</tr>
				<tr>
					<td class="celula">Cep:</td>
					<td>
						<input type="text" name="cep" value="<?php echo $vetor['cep']; ?>" maxlength="8" size="9" />
					</td>
				</tr>
			</table>
			<p class="centralizado">
				<input type="button" value="Cancelar" onclick="location.href='index.php'" />
				<input type="submit" value="Gravar" />
			</p>
		</div>
	</form>
</body>

</html>