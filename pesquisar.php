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
                $pro->setNome($txtnome);
                $pro->setEstoque($txtestoq);
                echo "<h2>" . $pro->salvar() . "</h2>";
            }
            ?>
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