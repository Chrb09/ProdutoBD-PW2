<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="css/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <title>Pesquisar</title>
</head>


<body>

    <?php
    include ("components/navbar.php")
        ?>
    <main>
        <div class="content">
            <?php
            include_once 'produto.php';
            $a = new Produto();
            $liv_bd = $a->listar();
            ?>

            <h2>Pesquisar</h2>
            <button class="button-cor" onclick="location.href='menu.php'">Voltar</button>
        </div>
    </main>
</body>


</html>