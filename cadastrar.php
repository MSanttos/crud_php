<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>
<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Login</title>
    </head>

    <body>
        <div class="corpo-formulario">
            <h1 class="titulo-formulario">Cadastrar</h1>
            <form method="post">
                <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
                <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
                <input type="email" name="email" placeholder="Usuário" maxlength="40">
                <input type="password" name="senha" id="" placeholder="Senha" maxlength="15">
                <input type="password" name="confirmasenha" id="" placeholder="Confirmar senha">
                <input type="submit" value="CADASTRAR">
            </form>
            <a href="index.php">Já tem Cadastro? <strong>Faça login!</strong></a>
        </div>

        <?php
            include ('processa.php');
        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js"></script>
    </body>

</html>
<script>
if (document.addEventListener) {
    document.addEventListener("contextmenu", function(e) {
        e.preventDefault();
        return false;
    });
} else { //Versões antigas do IE
    document.attachEvent("oncontextmenu", function(e) {
        e = e || window.event;
        e.returnValue = false;
        return false;
    });
}
</script>
