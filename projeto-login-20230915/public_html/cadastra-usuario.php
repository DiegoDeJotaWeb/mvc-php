<?php
include_once("../private/configs/global.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <title>Signup</title>
</head>

<body>
  <div id="form-login">
    <div class="grupo-form">
      <label for="user-name">Nome do usuário: </label>
      <input type="text" name="user-name" id="user-name" placeholder="Nome do usuário" required />
    </div>
    <div class="grupo-form">
      <label for="user-email">Digite o email: </label>
      <input type="text" name="user-email" id="user-email" placeholder="exemplo@mail.com" required />
    </div>
    <div class="grupo-form">
      <label for="user-pass">Digite a senha: </label>
      <input type="password" name="user-pass" id="user-pass" placeholder="***********" required />
    </div>
    <div class="grupo-form">
      <label for="user-conf-pass">Confirme a senha: </label>
      <input type="password" name="user-conf-pass" id="user-conf-pass" placeholder="***********" required />
    </div>
    <div class="grupo-form">
      <button onclick=actAddLogin()>Cadastrar usuário</button>
    </div>
    <span id="alertMsg"></span>
  </div>
  <script>
    function actAddLogin() {
      let userName = $("#user-name").val();
      let userEmail = $("#user-email").val();
      let userPass = $("#user-pass").val();
      let userConfPass = $("#user-conf-pass").val();

      $.ajax({
        url: "<?= $pathPrivate ?>/api/model/Login.model.php",
        method: "POST",
        async: true,
        data: {
          userName: userName,
          userEmail: userEmail,
          userPass: userPass,
          userConfPass: userConfPass
        },
        dataType: 'json'
      })
      .done(function(resultado){
        if(resultado['status']) {
          document.getElementById("alertMsg").innerHTML = resultado.msg;
        } else {
          document.getElementById("alertMsg").innerHTML = resultado.msg;
        }
      })
    }
  </script>
</body>

</html>