<?php
include 'conn.php';
$id = $_POST['id'];
$conn->query("delete from lista_diego where id = '" . $id . "'");


// flutter run --web-browser-flag 
//"--disable-web-security"   
