<?php
if(isset($_POST['email']))
{
    $email = addslashes($_post['email']);
    $senha = addslashes($_post['senha']);

    if(!empty($email) && !empty($senha))
    {
        $u->conectar("db_login", "localhost", "root", "");
        if($u->msgErro == "")
        {
            if($u->logar($email,$senha)){
                header('location:AreaPrivada.php');
            }else{
                echo "Email e/ou senha estão incorretos!";
            }
        }else{
            echo "Erro: ".$u->msgErro;
        }
    }else{
        echo "Preencha todos os campos!";
    }
}
?>
