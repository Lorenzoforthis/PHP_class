<?php
include "conn.php";

$memberId = $_POST["memberId"];

try{
    $sql = "DELETE FROM member WHERE id = ?";
    $st = $conn->prepare($sql);
    $st->bind_param("i", $memberId);
    $st->execute();
}catch(Exception $e){
    echo($e);
}finally{
    $st->close();
    $conn->close();
}
?>