<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Formulário de Cadastro </title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/register-style.css" rel="stylesheet">

</head>
<body class="d-flex align-items-center py-4 h-100">
    
    <main class="w-100 m-auto form-container">
        <div class="container mt-4">
            <div class="row align-items-center">
                <div class="col-md-10 mx-auto col-lg-5">
                    <?php 
                        if(isset($_SESSION['register_status'])):
                    ?>
                    <div class="alert alert-success" role="alert">
                        <div>
                            Cadastro efetuado! <br>
                            Faça login informando o seu usuário e senha <a href="index.php">aqui</a>
                        </div>
                    </div> 
                    <?php 
                        endif;
                        unset($_SESSION['register_status']);
                    ?>
                    <?php 
                        if(isset($_SESSION['user_exists'])):
                    ?>
                    <div class="alert alert-primary" role="alert">
                        <div>
                            O usuário escolhido já existe. Informe outro e tente novamente.
                        </div>
                    </div>
                    <?php 
                        endif;
                        unset($_SESSION['user_exists']);
                    ?>
                    <form action="./auth/register.php" method="POST" class="p-4 p-md-5 border rounded-3 bg-light">

                        <h1 class="h3 mb-3"> Por favor, faça seu cadastro </h1>

                        <div class="form-floating mb-3">
                            <input type="text" name="nome" class="form-control" id="inputName" placeholder="Nome" required>
                            <label for="inputNome"> Nome </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="usuario" class="form-control" id="inputUsuario" placeholder="Usuário" required>
                            <label for="inputUsuario"> Usuário </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="senha" class="form-control" id="inputSenha" placeholder="Senha" required>
                            <label for="inputSenha"> Senha </label>
                        </div>

                        <button type="submit" class="w-100 btn btn-lg btn-primary"> Entrar </button>

                        <div class="mt-3 text-decoration-none">
                            <a href="index.php" class="text-decoration-none"> Voltar </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>