<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/icon.png" />
  <link rel="stylesheet" href="css/styles.css" />
  <title>Manutenção</title>
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
      <h2>Acesso Inválido</h2>
      <button class="button-cor" onclick="location.href='login.php'">Voltar</button>
    </div>
  </main>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script>
  $("#senha").mask("00000000000");

</script>

</html>