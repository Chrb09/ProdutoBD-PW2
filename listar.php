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
    <header>
        <h1>BD Produtos</h1>
        <p>Listar</p>
    </header>
    <main>
        <ul>
            <?php
            include_once 'produto.php';
            $a = new Produto();
            $liv_bd = $a->listar();
            ?>
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
                foreach ($liv_bd as $liv_mostrar) {
                    ?>
                        <tr>
                            <td>
                                <b>
                                    <?php echo $liv_mostrar[0]; ?>
                                </b>
                            </td>
                            <td>
                                <?php echo $liv_mostrar[1]; ?>
                            </td>
                            <td>
                                <?php echo $liv_mostrar[2]; ?>
                            </td>
                        </tr>
                        <?php

                }
                ?>
            </table>
            <br> <button onclick="location.href='menu.html'">Voltar</button>
            <br>
        </ul>
    </main>
</body>

</html>