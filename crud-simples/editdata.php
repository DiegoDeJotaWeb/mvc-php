<?php
include 'conn.php';
$id = $_POST['id'];
$produto = $_POST['produto'];
$qtde = $_POST['qtde'];
$conn->query("update lista_diego set produto = '".$produto."' , qtde= ' . $qtde . ' where id = '" .$id. "'");
