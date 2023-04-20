<?php
$nome_servidor = 'db';
$nome_usuario = "root";
$senha = "root";
$nome_banco = "users";
$conexao = mysqli_connect($nome_servidor, $nome_usuario, $senha, $nome_banco);

    if (mysqli_connect_error()){
    echo "Problemas com a conexão do Banco de Dados.". mysqli_connect_error();
}
?>