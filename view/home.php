<?php
session_start();
include("../controller/produtoController.php"); // Ajuste o caminho conforme necessário
include("./blades/top.php"); // Inclui o cabeçalho


$produtos = obterProdutos();
?>

<div style="background-color: #EEF1F8; width: 100%; height: 600px; position: relative;">
    
    <div style="background-color: #fff; width: 100%; height: 60px; position: relative; display: flex; align-items: center;"> 
        <Text style="position: absolute; left: 50%; transform: translateX(-50%); font-weight: bold; font-size: 18px;">Stride</Text>
       
        <a href="./carrinho.php" style="margin-left: auto; margin-right: 20px;">
            <img src="./imgs/Vector.png" style="width: 25px; height: 25px; cursor: pointer;">
        </a>
    </div>

    
    <Text style="color: #54A391; font-size: 60px; position: absolute; top: 50%; left: 25%; transform: translate(-50%, -50%); font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
        STRIDE CALÇADOS
    </Text>
    <Text style="color: #000; font-size: 15px; position: absolute; top: 57%; left: 25%; transform: translate(-50%, -50%);">A melhor loja de calçados do Vale do Ribeira</Text>

   
    <img src="./imgs/TenisCapa.png" style="position: absolute; top: 50%; right: 05%; transform: translateY(-50%) rotate(-20deg); width: 514px; height: 300px;">
</div>

<div style="margin: 20px;">




    <!-- Parte dos produtos -->
    <?php if (!empty($produtos)) : ?>
    <ul style="list-style: none; padding: 0; display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        <?php foreach ($produtos as $produto) : ?>
            <li style="border: 1px solid #ccc; padding: 20px; width: 300px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px; display: flex; flex-direction: column; align-items: center;">
                <img src="<?php echo($produto['Imagem'])?>" style="width: 210px; height: 140px; object-fit: cover; margin-bottom: 10px;">
                <div>
                    <strong><?php echo htmlspecialchars($produto['Nome']); ?></strong>
                    <br>Preço: R$<?php echo number_format($produto['Valor'], 2, ',', '.'); ?>
                </div>

                <!-- adicionar no carrinho -->
                <form method="post" action="../controller/adicionarAoCarrinho.php" style="margin-top: 10px;">
                    <input type="hidden" name="nome" value="<?php echo htmlspecialchars($produto['Nome']); ?>">
                    <input type="hidden" name="valor" value="<?php echo $produto['Valor']; ?>">
                    <input type="hidden" name="imagem" value="<?php echo $produto['Imagem']; ?>"> <!-- Adicionando imagem -->
                    <button type="submit" style="padding: 10px; background-color: #54A391; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        Adicionar ao Carrinho
                    </button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Nenhum produto encontrado.</p>
<?php endif; ?>

</div>

<?php include("./blades/footer.php"); ?>
