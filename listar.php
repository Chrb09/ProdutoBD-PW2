<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="css/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>


<body>

    <?php
    include("components/navbar.php")
        ?>
    <main>
        <div class="content">
            <?php
            include_once 'produto.php';
            $a = new Produto();
            $prod_bd = $a->listar();
            ?>

            <h2>Listar</h2>
            <table>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Nome
                    </th>
                    <th>
                        Estoque
                    </th>
                </tr>
                <?php
                foreach ($prod_bd as $prod_mostrar) {
                    ?>
                    <tr>
                        <td>
                            <b>
                                <?php echo $prod_mostrar[0]; ?>
                            </b>
                        </td>
                        <td>
                            <?php echo $prod_mostrar[1]; ?>
                        </td>
                        <td>
                            <?php echo $prod_mostrar[2]; ?>
                        </td>
                    </tr>
                    <?php

                }
                ?>
            </table>
            <button class="button-cor" onclick="location.href='menu.php'">Voltar</button>
        </div>
    </main>
</body>


</html>