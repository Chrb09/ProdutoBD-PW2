<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="css/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
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

            <h2>Excluir</h2>
            <button class="button-cor" onclick="location.href='menu.php'">Voltar</button>
        </div>
    </main>
</body>


</html>