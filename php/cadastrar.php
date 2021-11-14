<?php
require_once 'usuarios.php';
$u = new Usuario;

?>

<?php
// Verificar se clicou no botão

if (isset($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['password']);

    // Verificar se está vazio
    if (!empty($nome) && !empty($email) && !empty($senha)) {
        $u->conectar("dados_usuario", "localhost", "root", "");

        if ($u->msgErro == "") { // Sem erro 

            if ($u->cadastrar($nome, $email, $senha)) {

?>
                <link rel="stylesheet" href="../css/style.css">
                <link rel="stylesheet" href="../css/sign_style.css">

                <main>
                    <p>Cadastrado com Sucesso!👨‍💻</p>
                    <form class="form">
                        <div class="buttons">
                            <a href="../entrar.html">Entrar</a>
                        </div>
                    </form>
                </main>
            <?php

            } else {
            ?><link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../css/sign_style.css">

            <main>
                <p>Email já Cadastrado</p>
                <form class="form">
                    <div class="buttons">
                        <a href="../entrar.html">Entrar</a>
                    </div>
                </form>
            </main>
            <?php
            }
        } else {
            ?>
            <div class="msg-erro">
                <?php echo "Ero: " . $msgErro; ?>
            </div>
        <?php
        }
    } else {
        ?><link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/sign_style.css">

        <main>
            <p>Preencha todos os campos</p>
        </main>
<?php
    }
}

?>