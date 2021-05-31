<?php
require_once 'classes/usuarios.php';
$u = new Usuario;
//verificar se clicou no botao
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confirmasenha = addslashes($_POST['confirmasenha']);
	//verificar se esta preenchido
	if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmasenha))
	{
		$u->conectar("db_login", "localhost", "root", "");
		if($u->msgErro == "")// tudo certo
		{
			if($senha == $confirmasenha)
			{
				if($u->cadastrar($nome,$telefone,$email,$senha))
				{
					echo "Cadastrado com sucesso! Acesse para entrar";
				}
				else
				{ ?>
<div class="msg_erro">Email já cadastrado!<?php

				}
			}
			else
			{ ?>
    <div class="msg_erro">Senha e confirmar senha não correspondem</div>
    <?php
			}
			
		}
		else
		{
			echo "Erro: ".$u->msgErro;
		}
	}else
		{?>
    <div class="msg_erro">Preencha todos os campo!</div>
    <?php
	}
}
?>
