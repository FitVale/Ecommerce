<?php

if (isset($_POST['produto_nome'])) {
    $produtoNome = $_POST['produto_nome'];
    
   
    $carrinho = isset($_COOKIE['carrinho']) ? json_decode($_COOKIE['carrinho'], true) : [];

    
    $carrinhoAtualizado = array_filter($carrinho, function($item) use ($produtoNome) {
        return $item['Nome'] !== $produtoNome;
    });

 
    $carrinhoAtualizado = array_values($carrinhoAtualizado);


    setcookie('carrinho', json_encode($carrinhoAtualizado), time() + (7 * 24 * 60 * 60), "/");
}


header("Location: ../view/carrinho.php");
exit;
?>
