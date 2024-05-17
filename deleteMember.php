<?php
require_once "conn.php";

if ($conn ->connect_errno){
    echo("error");
    exit;
}

$memberId = $_POST["memberId"];

$sql = "DELETE FORM member WHERE id =" . $memberId ;
if ($conn->query($sql) === TRUE){
    echo("ok");
}else{
    echo("error");
}


?>