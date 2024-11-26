<?php include("./blades/top.php"); ?>
<!-- Inclui o cabeçalho do site -->




<div class="page">
    <div class="container mt-5 bg-white p-5 rounded">
        
        <form action="../controller/funcao-login.php" method="post" class="formLogin">
            
            <h1>Login</h1>
            
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            

            <label for="email" class="form-label pt-5">Usuário</label>
            
            <input type="email" name="campo_email" class="form-control" placeholder="Digite seu e-mail" autofocus="true">
            

            <label for="password" class="form-label pt-3">Senha</label>
            
            <input type="password" name="campo_senha" class="form-control" placeholder="Digite sua senha">
            

            <a href="/">Esqueci minha senha</a>
            

            <div class="container mt-5 d-flex justify-content-end">
                
                <input type="submit" value="Entrar" class="btn btn-primary">
                
            </div>
        </form>
    </div>
</div>

<?php include("blades/footer.php"); ?>

