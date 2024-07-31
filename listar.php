<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="css/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <title>Listar</title>
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
            <button class="button-cor" onclick="location.href='menu.php'">Voltar</button>
            <!--<form name="form" method="POST" action="">

                <button name="au" type="submit">bruh</button>


            </form>
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($au)) {
                echo '
<script type="text/javascript">

$(document).ready(function(){

  Swal.fire({
    title: "Enviado com sucesso",
        icon: "success",
        confirmButtonColor: "#574dbd",
  })
});

</script>
';
            }
            ?>
            -->
        </div>
    </main>
</body>


</html>