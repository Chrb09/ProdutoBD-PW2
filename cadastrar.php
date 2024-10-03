<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="css/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>


<body>

    <?php
    include("components/navbar.php")
        ?>
    <main>
        <div class="content">
            <h2>Cadastrar</h2>
            <form name="formProduto" method="POST" action="">
                <div class="linha">
                    <p>Nome:</p>
                    <input name="txtnome" type="text" maxlength="50" placeholder="Nome do produto..." required
                        autocomplete="off">
                </div>
                <div class="linha">
                    <p>Estoque:</p>
                    <input name="txtestoq" type="number" class="number" min="1" max="2147483647" placeholder=" 1"
                        required autocomplete="off">
                </div>
                <div class="linha"><button name="enviar" type="submit" class="button-outline">Cadastrar</button>
                    <button name="limpar" type="reset" class="button-outline">Limpar</button>
                </div>
            </form>
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($enviar)) {
                include_once 'produto.php';
                $pro = new Produto();
                $pro->setNome($txtnome);
                $pro->setEstoque($txtestoq);
                echo "<h2>" . $pro->salvar() . "</h2>";
            }
            ?>
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