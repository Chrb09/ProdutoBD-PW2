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
        <?php
        $txtid = $_POST["txtid"];
        include_once 'produto.php';
        $pro = new Produto();
        $pro->setId($txtid);
        $pro_bd = $pro->consultar("Id")
            ?>
        <div class="content">
            <h2>Alterar</h2>
            <form name="formProduto" method="POST" action="">
                <?php
                foreach ($pro_bd as $pro_mostrar) {

                    ?>
                    <div class="linha">
                        <p>Id:</p>
                        <input name="txtid" class="inputdisabled" type="text" value="<?php echo $pro_mostrar[0]; ?>"
                            maxlength="50" placeholder="ID do produto..." required autocomplete="off" tabindex="-1">
                    </div>
                    <div class="linha">
                        <p>Nome:</p>
                        <input name="txtnome" type="text" value="<?php echo $pro_mostrar[1]; ?>" maxlength="50"
                            placeholder="Nome do produto..." required autocomplete="off">
                    </div>
                    <div class="linha">
                        <p>Estoque:</p>
                        <input name="txtestoq" value="<?php echo $pro_mostrar[2]; ?>" type=" number" maxlength="11"
                            placeholder="1" required autocomplete="off">
                    </div>
                    <div class="linha"><button name="enviar" type="submit" class="button-outline">Alterar</button>
                    </div>
                    <?php
                }
                ?>
            </form>
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($enviar)) {
                include_once 'produto.php';
                $pro = new Produto();
                $pro->setNome($txtnome);
                $pro->setEstoque($txtestoq);
                $pro->setId($txtid);
                $sucesso = $pro->alterar();
                if ($sucesso == 1) {
                    header("location:alterar1.php");
                } else {
                    echo "<h2>" . $sucesso . "</h2>";
                }
            }
            ?>
            <button class="button-cor" onclick="location.href='menu.php'">Voltar</button>
        </div>
    </main>
</body>

</html>