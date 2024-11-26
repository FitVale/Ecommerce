<?php
    // Conecta ao banco de dados usando os parâmetros: servidor, usuário, senha
    $conexao = mysqli_connect("127.0.0.1","root","");

    // Seleciona o banco de dados 'projeto_crud_php_t1'
    mysqli_select_db($conexao,"lojinha");

    // Define o conjunto de caracteres como UTF-8
    mysqli_set_charset($conexao,"UTF8");
?>
