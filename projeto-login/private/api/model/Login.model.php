<?php
    // header('Content-Type: application/json');

    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPass = $_POST['userPass'];
    $userConfPass = $_POST['userConfPass'];

    // Criando Objeto Login
    $objLogin = new Login();

    if ($userPass === $userConfPass) {
        //acesso ea passagem e retorno do controller
        $objLogin->setUserName($userName);
        $objLogin->setUserEmail($userEmail);
        $objLogin->setUserPass($userPass);//ira sofre modigicações



        $retorna = [
            'status' => true,
            'msg' => "<p style='color:#0f0'>Cadastro realizado com sucesso!!!</p>"
        ];
    } else {
        $retorna = [
            'status' => false,
            'msg' => "<p style='color:#f00'>ERRO - Senha não combina!!!</p>"
        ];
    }

    // echo json_encode($retorna);

    
    echo "<pre>";
    var_dump($objLogin());
    echo "</pre>";
