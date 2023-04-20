<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Meu Redirect</title>

    <meta http-equiv="refresh" content="3; URL='./'"/>
</head>
<body>
</body>
</html>

<?php

include_once("conexao.php");

$user = $_POST['gituser'];
$imagem = $_POST['imagem'];
$data_registro = $_POST['data_registro'];
$quantidade_repositorio = $_POST['quantidade_repositorio'];


$sql = "INSERT INTO usuarios (usuario, imagem, data_registro, quantidade_repositorio) VALUES ('$user', '$imagem', '$data_registro', '$quantidade_repositorio')";


if (mysqli_query($conexao, $sql)){
    echo $user . "gravado com sucesso! Redirecionando a página inicial!";
} else {
    echo "Não gravou " . mysqli_error(($conexao));
    echo "<br>Retornando para página inicial!";
}

mysqli_close($conexao);

?>