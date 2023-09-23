<?php
include 'conn.php';
$sql = $conn->query("select * from lista_diego order by produto");
$res =array();
while($row=$sql->fetch_assoc())
{
    $res[] = $row;
}
echo json_encode($res);
