<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="css/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>

<body>

    <?php
    include("components/navbar.php")
        ?>
    <main>
        <div class="content">
            <h2>Alterar</h2>
            <form name="formProduto" id="formProduto" method="POST" action="alterar2.php">
                <div class="linha">
                    <p>Id:</p>
                    <input name="txtid" type="number" class="number" maxlength="10" placeholder="Id do produto..."
                        required autocomplete="off">
                </div>
                <div class="linha">
                    <button name="pesquisar" type="submit" class="button-outline">Pesquisar</button>
                    <button name="limpar" type="reset" class="button-outline">Limpar</button>
                </div>
            </form>

            <button class="button-cor" onclick="location.href='menu.php'">Voltar</button>
        </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script>
    $(".number").mask("0000000000");
</script>

</html>