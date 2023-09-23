<?php
$host = "robb0547.publiccloud.com.br";
$user = "minha_sala39";
$senha = "S3nac_sala39";
$db = "minhavilacarrao_sala39";
$conn = new mysqli($host,$user,$senha,$db);
if($conn){
}
else
{ 
echo "Falha da conexão";
}
