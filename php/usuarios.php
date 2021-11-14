<?php

class Usuario
{

    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha) {

        global $pdo;

        try {
            $pdo = new PDO('mysql:host='.$host.';dbname='.$nome, $usuario, $senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $email, $senha)
    {

        global $pdo;
        // Verificar se já está cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;
        } else {
            // Senão cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();

            return true;
        }
    }

    public function entrar($email, $senha)
    {

        global $pdo;

        // Verificar se o usuário está cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            // Entrar no Sistema
            $dados = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dados['id_usuario'];

            return true;
        } else {
            return false;
        }
    }
}