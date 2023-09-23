<?php
include 'conn.php';
$produto = 'Pasta de dente';
$qtde = '1';
$conn->query("insert into lista_diego(produto, qtde) values('".$produto."','".$qtde."')");
