<?php
require_once 'usuarios.php';

$usuario = new Usuario;
?>

<?php
// Verificar se clicou no botão

if (isset($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['password']);

    // Verificar se está vazio
    if (!empty($email) && !empty($senha)) {

        $usuario->conectar("dados_usuario", "localhost", "root", "");

        if ($usuario->msgErro == "") {
            if ($usuario->entrar($email, $senha)) {
                header("location: logado.php");
            } else { ?>
                <link rel="stylesheet" href="../css/style.css">

                <main>
                    <p>Email Ou Senha Incorrecto/a</p>>
                    </form>
                </main>
        <?php
            }
        } else {
            echo "Erro: " . $usuario->msgErro;
        }
    } else {
        ?>
        <link rel="stylesheet" href="../css/style.css">

        <main>
            <p>Preencha todos os campos</p>
        </main>
<?php
    }
}
?>