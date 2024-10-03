<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/icon.png" />
  <link rel="stylesheet" href="css/styles.css" />
  <title>Login</title>
  <style>
    body {
      padding-top: 10rem;
      height: 100vh;
      overflow-y: hidden;
    }

    main {
      width: fit-content;
    }
  </style>
</head>

<body>
  <main>
    <div class="content">
      <h1>Login</h1>
      <form name="formProduto" method="POST" action="">
        <div class="linha">
          <p>Usuario:</p>
          <input name="txtusuario" type="text" maxlength="5" placeholder="Usuario..." required autocomplete="off">
        </div>
        <div class="linha">
          <p>Senha:</p>
          <input name="txtsenha" id="senha" type="password" min="1" max="2147483647" placeholder="Senha..." required
            autocomplete="off">
        </div>
        <div class="linha"><button name="enviar" type="submit" class="button-outline">Logar</button>
        </div>
      </form>
      <?php
      extract($_POST, EXTR_OVERWRITE);
      if (isset($enviar)) {
        include_once 'usuario.php';
        $usuario = new Usuario();
        $usuario->setUsuario($txtusuario);
        $usuario->setSenha($txtsenha);
        $usuario_bd = $usuario->logar();

        $existe = false;
        foreach ($usuario_bd as $usuario_mostrar) {
          $existe = true;
          ?>
          <?php echo "<div>Bem vindo  <b>$usuario_mostrar[0]</b></div>";
          ?>
          <button class="button-cor" onclick="location.href='menu.php'">Entrar</button>
          <?php
        }
        if ($existe == false) {
          header("location:logininvalido.php");
        }
      }
      ?>
    </div>
  </main>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script>
  $("#senha").mask("0000000000");

</script>

</html>