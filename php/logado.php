<?php 
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header("location: signin.php");
    }
?>


<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logado</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/loading.css">
</head>

<body>
    <main>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="content">
            <p>SESSÃO INICIADA.</p>

            <a href="sair.php"> TERMINAR SESSÃO</a>
        </div>
    </main>

    <footer>
        <script src="../assets/jquery.js"></script>
        <script src="../assets/app.js"></script>
    </footer>
</body>

</html>