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
            <h2>Pesquisar</h2>
            <form name="formProduto" method="POST" action="">
                <div class="linha">
                    <p>Pesquisar na coluna:</p>
                    <select name="escolha" id="escolha-produto">
                        <option value="Id">Id</option>
                        <option value="Nome" selected>Nome</option>
                        <option value="Estoque">Estoque
                        </option>
                    </select>
                </div>
                <div class="linha">
                    <p id="p-produto">Nome:</p>
                    <input name="txtpesquisar" id="txtpesquisa" type="text" maxlength="50"
                        placeholder="Nome do produto..." required autocomplete="off">
                </div>
                <div class="linha"><button name="enviar" type="submit" class="button-outline"
                        id="botao-enviar">Consultar</button>
                    <button name="limpar" id="limpar" type="button" class="button-outline">Limpar</button>
                </div>
            </form>
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($enviar)) {
                include_once 'produto.php';
                $prod = new Produto();
                switch ($escolha) {
                    case 'Id':
                        $prod->setId($txtpesquisar);
                        break;
                    case 'Nome':
                        $prod->setNome($txtpesquisar);
                        break;
                    case 'Estoque':
                        $prod->setEstoque($txtpesquisar);
                        break;
                }
                $produto_bd = $prod->consultar($escolha);
                if (count($produto_bd) === 0) {
                    echo "<h2>Nenhum Registro com $escolha $txtpesquisar </h2>";
                } else {
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
                        foreach ($produto_bd as $prod_mostrar) {
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
            }
            ?>
            </table>
            <button class="button-cor" onclick="location.href='menu.php'">Voltar</button>
        </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    const escolha = document.getElementById("escolha-produto");
    const p = document.getElementById("p-produto")
    const pesquisa = document.getElementById("txtpesquisa")
    const limpar = document.getElementById("limpar")
    const enviar = document.getElementById("botao-enviar")


    function mudar() {
        let valor = escolha.value;
        if (valor == "Id") {
            $("#txtpesquisa").replaceWith(
                '<input name="txtpesquisar" id="txtpesquisa" type="number" min="1" max="2147483647"' +
                'placeholder="ID do produto..." required autocomplete="off">'
            )
        }
        else if (valor == "Estoque") {
            $("#txtpesquisa").replaceWith(
                '<input name="txtpesquisar" id="txtpesquisa" type="number" min="1" max="2147483647"' +
                'placeholder="Estoque do produto..." required autocomplete="off">'
            )
        } else {
            $("#txtpesquisa").replaceWith(
                '<input name="txtpesquisar" id="txtpesquisa" type="text" maxlength="50"' +
                'placeholder="Nome do produto..." required autocomplete="off">'
            )
        }
        p.innerHTML = valor + ":";
        pesquisa.placeholder = valor + " do produto...";
    }

    escolha.addEventListener("change", () => {
        mudar()
    });

    limpar.addEventListener("click", () => {
        escolha.value = "Nome";
        var selectedcategory = $(this).children("option:selected").val();
        sessionStorage.setItem("itemName", selectedcategory);
        mudar()
    });


    $('#escolha-produto').change(function (event) {
        var selectedcategory = $(this).children("option:selected").val();
        sessionStorage.setItem("itemName", selectedcategory);
    });

    $('select').find('option[value=' + sessionStorage.getItem('itemName') + ']').attr('selected', 'selected');

    window.onload(mudar())
    $(".number").mask("0000000000");

</script>

</html>