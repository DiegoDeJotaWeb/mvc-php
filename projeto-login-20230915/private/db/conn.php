<?php
// Configuração com banco de dados realizada por: Thiago
// Empresa: Senac - SP (Lapa Tito)
// Data: 12/09/2023
// Versão: 1.0

// Definindo variáveis do socket
$dbHost = 'robb0547.publiccloud.com.br';
$dbUser = 'minha_sala39';
$dbPass = 'S3nac_sala39';
$dbBase = 'minhavilacarrao_sala39';

// $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbBase) or die();

$conn = @new mysqli(
    $dbHost,
    $dbUser,
    $dbPass,
    $dbBase
);

if ($conn->connect_error) {
    echo 'ERRO: ' . $conn->connect_errno;
    echo '<br>';
    echo 'ERRO: ' . $conn->connect_error;
} else {/*
    echo 'Sucesso: Uma conexão adequada com MySQL';
    echo '<br>';
    echo 'Host informação: ' . $conn->host_info;
    echo '<br>';
    echo 'Versão do protocolo: ' . $conn->protocol_version;
*/
    mysqli_set_charset($conn, 'utf8');
    date_default_timezone_set('America/Sao_Paulo');
}
?>