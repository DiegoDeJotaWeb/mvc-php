<?php
header('Content-Type: application/json');
include_once('../controller/Login.controller.php');

$userName = $_POST['userName'];
$userEmail = $_POST['userEmail'];
$userPass = $_POST['userPass'];
$userConfPass = $_POST['userConfPass'];

$objLogin = new Login();

if ($userPass === $userConfPass) {
    $userStatus = 1;
    $fxLogin = "addLogin";

    // Acesso e a passagem de retorno do controller
    $objLogin->setUserName($userName);
    $objLogin->setUserEmail($userEmail);
    $objLogin->setUserPass($userPass, $userEmail);
    $objLogin->setUserHash($userPass, $userEmail);
    $objLogin->setUserStatus($userStatus);
    $objLogin->addLogin($fxLogin);

    $retorna = $objLogin->fxLogin;

    //    $retorna = [
    //        'status' => true,
    //        'msg' => "<p style='color: #0f0'>Cadastro realizado com sucesso</p>",
    //    ];
} else {
    $retorna = [
        'status' => false,
        'msg' => "<p style='color: #f00'>ERRO - Senha não combina</p>",
    ];
}

echo json_encode($retorna);
/*
echo "<pre>";
var_dump($objLogin);
echo "</pre>";
*/
?>