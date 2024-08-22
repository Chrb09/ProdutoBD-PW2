<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="css/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
</head>


<body>

    <?php
    include("components/navbar.php")
        ?>
    <main>
        <div class="content">
            <h2>Pesquisa</h2>
            <form name="formProduto" method="POST" action="">
                <div class="linha">
                    <p>Pesquisar na coluna:</p>
                    <select name="escolha" id="escolha-produto">
                        <option value="Id">Id</option>
                        <option value="Nome" selected>Nome</option>
                        <option value="Estoque">Estoque</option>
                    </select>
                </div>
                <div class="linha">
                    <p id="p-produto">Nome:</p>
                    <input name="txtpesquisar" id="txtpesquisa" type="text" maxlength="50"
                        placeholder="Nome do produto..." required autocomplete="off">
                </div>
                <div class="linha"><button name="enviar" type="submit" class="button-outline">Consultar</button>
                    <button name="limpar" type="reset" class="button-outline">Limpar</button>
                </div>
            </form>
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($enviar)) {
                include_once 'produto.php';
                $pro = new Produto();
                switch ($escolha) {
                    case 'Id':
                        $pro->setId($txtpesquisar);
                        break;
                    case 'Nome':
                        $pro->setNome($txtpesquisar);
                        break;
                    case 'Estoque':
                        $pro->setEstoque($txtpesquisar);
                        break;
                }
                $prod_bd = $pro->consultar($escolha);
            }
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
<script language="javascript">
    const escolha = document.getElementById("escolha-produto");
    const p = document.getElementById("p-produto")
    const pesquisa = document.getElementById("txtpesquisa")

    function mudar() {
        let valor = escolha.value;
        p.innerHTML = valor + ":";
        pesquisa.placeholder = valor + " do produto...";
    }

    escolha.addEventListener('change', function () {
        mudar()
    });
</script>

</html>