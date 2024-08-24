<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="css/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <style>
        #continuar {
            display: block;
        }

        #excluir {
            display: none;
        }

        .continuar #continuar {
            display: none;
        }

        .continuar #excluir {
            display: block;
        }
    </style>
</head>


<body>

    <?php
    include("components/navbar.php")
        ?>
    <main>
        <div class="content">
            <h2>Excluir</h2>
            <form name="formProduto" id="formProduto" method="POST" action="">
                <div class="linha">
                    <p>Id:</p>
                    <input name="txtid" onchange="saveId()" id="produtoid" type="text" maxlength="50"
                        placeholder="Id do produto..." required autocomplete="off">
                </div>
                <div class="linha" id="linha-pesquisar">
                    <button name="pesquisar" id="pesquisar" type="submit" class="button-outline">Pesquisar</button>
                    <button name="continuar" id="continuar" type="button" class="button-outline">Excluir</button>
                    <button name="excluir" type="submit" id="excluir" class="button-outline">Confirmar?</button>
                </div>
                <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($pesquisar)) {
                    include_once 'produto.php';
                    $pro = new Produto();
                    $pro->setId($txtid);
                    $prod_bd = $pro->consultar("Id");
                    ?>
                    <table id="table">
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
                }
                ?>
                </table>
                <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($excluir)) {
                    include_once 'produto.php';
                    $pro = new Produto();
                    $pro->setId($txtid);
                    echo '<h2>' . $pro->exclusao() . '</h2>';
                }
                ?>
            </form>

            <button class="button-cor" onclick="location.href='menu.php'">Voltar</button>
        </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    const idproduto = document.getElementById("produtoid")
    const linhapesquisar = document.getElementById("linha-pesquisar")
    const continuar = document.getElementById("continuar")
    const excluir = document.getElementById("excluir")

    continuar.addEventListener("click", () => {
        linhapesquisar.classList.toggle('continuar');
    })
    excluir.addEventListener("click", () => {
        linhapesquisar.classList.toggle('continuar');
    })

    $(idproduto).change(function (event) {
        var Id = $(this).val();
        sessionStorage.setItem("idproduto", Id);
    });

    $(idproduto).attr('value', sessionStorage.getItem('idproduto'));
</script>

</html>