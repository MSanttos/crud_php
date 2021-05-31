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
            <h1 class="titulo-formulario">Entrar</h1>
            <form method="post">
                <input type="email" name="email" placeholder="Usuário">
                <input type="password" name="senha" id="" placeholder="Senha">
                <input type="submit" value="ACESSAR">
                <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se</strong></a>
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js">
        </script>
        <?php
            if(isset($_POST['email']))
            {
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);

                if(!empty($email) && !empty($senha))
                {
                    $u->conectar("db_login", "localhost", "root", "");
                    if($u->msgErro == "")
                    {
                        if($u->logar($email,$senha)){
                            header("Location: AreaPrivada.php");
                        }else{
                            ?>
        <div class="msg_erro">
            Email e/ou senha estão incorretos!
        </div>
        <?php
                        }
                    }else{
                        ?>
        <div class="msg_erro">
            <?php echo "Erro: ".$u->msgErro; ?>
        </div>
        <?php
                    }
                }else{
                   ?>
        <div class="msg_erro">
            Preencha todos os campos!
        </div>
        <?php
                }
            }
            ?>
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
