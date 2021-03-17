<?php
require 'contato.class.php';

$contato = new Contato();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>

<a href="adicionar.php"> [ ADICIONAR ]</a>

<h1>CONTATOS</h1>
<Table border="1", width="500">
<tr>
<th>ID</th>
<th>NOME</th>
<th>E-MAIL</th>
<th>AÇÕES</th>
</tr>

<?php

$lista = $contato->getAll();
foreach($lista as $item):
?>
<tr>
<td><?php echo $item['id']; ?></td>
<td><?php echo $item['nome']; ?></td>
<td><?php echo $item['email']; ?></td>
<td><a href="editar.php?id=<?php echo $item['id']; ?>">[ EDITAR ]</a> -- 
<a href="excluir.php?id=<?php echo $item['id']; ?>">[ EXCLUIR ]</a></td>
</tr>

<?php endforeach; ?>


</table>




</body>
</html>