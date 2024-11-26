<?php
session_start();
include("../controller/produtoController.php"); 
include("./blades/top.php"); 


$carrinho = isset($_COOKIE['carrinho']) ? json_decode($_COOKIE['carrinho'], true) : [];
?>
<div style="background-color: #fff; width: 100%; height: 60px; position: relative; display: flex; align-items: center; margin-left: 35px;">
    <Text style="font-weight: bold; font-size: 18px; color: #54A391">Stride</Text>
    
  
    <div style="height: 25px; width: 1px; background-color: #54A391; margin: 0 10px;"></div>

    <Text style="font-weight: bold; font-size: 18px; color: #54A391">Carrinho de Compras</Text>
</div>

<div style="background-color: #EEF1F8; width: 100%; height: 600px; position: relative;">

    
    <a href="home.php" style="text-decoration: none;">
        <img src="./imgs/voltar.png" style="width: 30px; height: 30px; margin-left: 35px; margin-top: 25px;">
    </a>

    <?php if (!empty($carrinho)) : ?>
    <ul style="list-style: none; padding: 25px;">
        <?php foreach ($carrinho as $index => $item) : ?>
            <li style="margin-bottom: 15px; border-bottom: 1px solid #ccc; padding-bottom: 10px; display: flex; align-items: center; justify-content: space-between;">
                
                <div style="flex: 1; display: flex; justify-content: space-between;">
                    <div>
                        <strong><?php echo htmlspecialchars($item['Nome']); ?></strong>
                    </div>
                    <div>
                        Preço Unitário: R$<?php echo number_format($item['Valor'], 2, ',', '.'); ?>
                    </div>
                    <div>
                        Quantidade: <?php echo $item['Quantidade']; ?>
                    </div>
                    <div>
                        Valor Total: R$<?php echo number_format($item['Valor'] * $item['Quantidade'], 2, ',', '.'); ?>
                    </div>
                </div>

                
                <form action="../controller/removerUmaUnidade.php" method="post" style="margin-top: 10px; margin-left: 10px">
                    <input type="hidden" name="produto_nome" value="<?php echo htmlspecialchars($item['Nome']); ?>">
                    <button type="submit">Remover uma unidade</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <div style="display: flex; justify-content: center; align-items: center; height: 70vh; text-align: center;">
        <p>Seu carrinho está vazio.</p>
    </div>
<?php endif; ?>


</div>

<?php include("./blades/footer.php");  ?>
