<?php
header("Content-Type: text/html; charset=UTF-8", true);
?>
<html>

<head>
  <meta charset="UTF-8">
  <title>Viação</title>
</head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> !-->

<body>
  <center>
    <h3>Viação</h3>
  </center>
  <form name="form1" method="POST" action="form_incluir.php">
    <table border="0" align="center" width="100%">
      <?php
      include("./config.php");
      $con = mysqli_connect($host, $login, $senha, $bd);
      $sql = "SELECT * FROM viacao ORDER BY idViacao";
      $tabela = mysqli_query($con, $sql);
      if (mysqli_num_rows($tabela) == 0) {
      ?>
        <tr>
          <td align="center">Não há nenhuma viação cadastrada.</td>
        </tr>
        <tr>
          <td align="center"><input type="submit" value="Inculir Viacao"></td>
        </tr>
      <?php
      } else {
      ?>
        <tr bgcolor="grey">
          <td width="10%">Cnpj</td>
          <td width="10%">Nome</td>
          <td width="10%">Email</td>
          <td width="10%">Logradouro</td>
          <td width="10%">Numero</td>
          <td width="10%">Bairro</td>
          <td width="10%">Cidade</td>
          <td width="10%">Estado</td>
          <td width="10%">Cep</td>
        </tr>
        <?php
        while ($dados = mysqli_fetch_row($tabela)) {
        ?>
          <tr>
            <td><?php echo $dados[1]; ?></td>
            <td><?php echo $dados[2]; ?></td>
            <td><?php echo $dados[3]; ?></td>
            <td><?php echo $dados[4]; ?></td>
            <td><?php echo $dados[5]; ?></td>
            <td><?php echo $dados[6]; ?></td>
            <td><?php echo $dados[7]; ?></td>
            <td><?php echo $dados[8]; ?></td>
            <td><?php echo $dados[9]; ?></td>
            <td align="center">
              <input type="button" value="Excluir" onclick="location.href='excluir.php?idViacao=<?php echo $dados[0]; ?>'">
              <input type="button" value="Editar" onclick="location.href='form_incluir.php?idViacao=<?php echo $dados[0]; ?>'">
            </td>
          </tr>
        <?php
        }
        ?>
        <tr bgcolor="grey">
          <td colspan="12" height="5"></td>
        </tr>
        <?php
        mysqli_close($con);
        ?>
        <tr>
          <td colspan="12" align="center"><input type="submit" value="Incluir Nova Viação"></td>
        </tr>
      <?php
      }
      ?>
    </table>
  </form>
</body>

</html>