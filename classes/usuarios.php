<?php
    class Usuario
    {
        private $pdo;
        public $msgError = "";
        
        public function conectar($dbnome, $host, $usuario, $senha)
        {
        global $pdo;
        global $msgErro;
            try {
                $pdo = new PDO("mysql:dbname=".$dbnome.";host=".$host,$usuario,$senha);
            } catch (PDOException $e){
                $msgError = $e->getMessage();
            }
        }

        public function cadastrar($nome, $telefone, $email, $senha)
        {
        global $pdo;
        global $msgErro;
        //verificar se já existe o email cadsatrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        
        if ($sql->rowCount() > 0)
        {
            return false; //ja está cadastrada
        }else{
            //caso não, Cadastrar!
            $sql = $pdo->prepare("INSERT INTO usuario (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql ->bindValue(":n", $nome);
            $sql ->bindValue(":t", $telefone);
            $sql ->bindValue(":e", $email);
            $sql ->bindValue(":s", md5($senha));
            $sql->execute();

            return true;// cadastrado com sucesso
        }
        }
        
        public function logar($email, $senha)
        {
         global $pdo;
         global $msgErro; 
         //verificar se o email e senha estão cadastrados, se sim 
        $sql = $pdo->prepare("SELECT id_usuario , nome FROM usuario WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //entrar no sistema(sessao)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'] = $dado['nome'];
            return true;//logado com sucesso
        }else{
            return false;//nao foi possivel logar
        }
         
        }
    }
?>
