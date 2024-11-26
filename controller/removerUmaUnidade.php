<?php
if (isset($_POST['produto_nome'])) {
    $produtoNome = $_POST['produto_nome'];
    

    $carrinho = isset($_COOKIE['carrinho']) ? json_decode($_COOKIE['carrinho'], true) : [];

    
    foreach ($carrinho as $index => $item) {
        if ($item['Nome'] === $produtoNome) {
            $carrinho[$index]['Quantidade'] -= 1;

            
            if ($carrinho[$index]['Quantidade'] <= 0) {
                unset($carrinho[$index]);
            }
            break;
        }
    }

  
    $carrinho = array_values($carrinho);
    setcookie('carrinho', json_encode($carrinho), time() + (7 * 24 * 60 * 60), "/");
}

header("Location: ../view/carrinho.php");
exit;
?>
