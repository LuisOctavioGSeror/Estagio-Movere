<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Movere Vendas · Log in</title>
    <link rel="icon" href="icons/movereIcon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }

        .back{
            background-color: #ffffff; 
            background-image: url("https://www.transparenttextures.com/patterns/axiom-pattern.png");
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>
  <body class="text-center back">
    <form class="form-signin" method="post">
    <?php  //-------------------------------------php-login-----------------------------------
        if(isset($_POST['acao'])){
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $sql = BancoDeDados::conectar()->prepare("SELECT * FROM movere_vendas.tabela_usuarios WHERE usuario = ? AND senha = ?"); //interrogações no lugar do valor e execute depois protegem contra sql injection
            $sql->execute(array($usuario,$senha));
            if($sql->rowCount() == 1){
                $_SESSION['login'] = true;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;
                header('Location: '.INCLUDE_PATH_PAINEL);
                die();
            }
            else{
                echo '<h3 style="color: rgb(220, 53, 69);">Usuario ou senha incorretos!</h3>';
            } 
        }
   ?><!-------------------------------------------------------------------------------------->
  <img class="mb-4 rounded-circle" src="icons/movereIcon.png" width="150" height="150">
  <h1 class="h3 mb-3 font-weight-normal">Faça o login</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="text" id="inputEmail" name="usuario" class="form-control" placeholder="Nome do usuario" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>

  <button class="btn btn-danger btn-primary btn-block" type="submit" name="acao">Log in</button>
  <p class="mt-5 mb-3 text-muted">&copy; Movere 2021</p>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>