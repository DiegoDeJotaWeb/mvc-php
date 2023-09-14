<?php
include_once("../private/configs/global.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div id="form-addLogin">
        <div class="grupo-form">
            <label for="user-name">Nome do usuário: </label>
            <input type="text" placeholder="Nome do usuário" id="user-name" name="user-name" required>
        </div>
        <div class="grupo-form">
            <label for="user-email">Digite o email: </label>
            <input type="text" placeholder="exemplo@gmail.com" id="user-email" name="user-email" required>
        </div>
        <div class="grupo-form">
            <label for="user-pass">Digite a senha: </label>
            <input type="password" placeholder="********" id="user-pass" name="user-pass" required>
        </div>
        <div class="grupo-form">
            <label for="user-conf-pass">Confirme a senha: </label>
            <input type="password" placeholder="********" id="user-conf-pass" name="user-conf-pass" required>
        </div>
        <div class="grupo-form">
            <button onclick="actAddLogin()">Cadastra usuário</button>
        </div>
        <span id="alertMsg"></span>
    </div>
    <script>
        function actAddLogin() {
            let userName = $('#user-name').val();
            let userEmail = $('#user-email').val();
            let userPass = $('#user-pass').val();
            let userConfPass = $('#user-conf-pass').val();
            $.ajax({
                url: "<?= $pathPrivate ?>/api/model/Login.model.php",
                method: "POST",
                async: true,
                data: {
                    userName: userName,
                    userEmail: userEmail,
                    userPass: userPass,
                    userConfPass: userConfPass,
                },
                dataType: 'json'
            }).done(function(resultado) {
                if (resultado['status']) {
                    document.getElementById('alertMsg').innerHTML = resultado.msg;
                } else {
                    document.getElementById('alertMsg').innerHTML = resultado.msg;
                }
            })

        }
    </script>
</body>

</html>