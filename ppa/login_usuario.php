<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
//session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script defer src="script.js"></script>
  <title>Login</title>
</head>

<body>
  <main class="login">
    <div class="login__container">
      <h1 class="login__title">Login</h1>
      <form class="login__form" method="POST" action="coorHelper.php">

        <input type="text" style="display:none" name='tipo' value="login">
        <input class="login__input" type="email" name="email" required placeholder="e-mail" />
        <span class="login__input-border"></span>
        <input class="login__input" type="password" name="senha" required placeholder="senha" />
        <span class="login__input-border"></span>
        <button class="login__submit">Login</button>
        <!--<a class="login__reset" href="#">Esqueceu a senha?</a>-->
      </form>
      <p>

        <?php  /*
              //Recuperando o valor da variável global, os erro de login.
              if(isset($_SESSION['loginErro'])){
                  echo $_SESSION['loginErro'];
                  unset($_SESSION['loginErro']);
              } */
        ?>
      </p>
      <p>
        <?php  /*
			        //Recuperando o valor da variável global, deslogado com sucesso.
              if(isset($_SESSION['logindeslogado'])){
                  echo $_SESSION['logindeslogado'];
                  unset($_SESSION['logindeslogado']);
              }*/
        ?>
      </p>
    </div>
  </main>
</body>

</html>