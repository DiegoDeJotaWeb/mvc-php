<?php
    include 'conn.php';
    $id = $_POST['id'];
    $comprado = $_POST['comprado'];
    $conn->query("update lista_diego set comprado = '".$comprado. "' where id = '" .$id. "'");
    

?>