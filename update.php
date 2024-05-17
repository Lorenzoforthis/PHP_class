<?php
include "conn.php";

$id = $_POST["id"];
$pwd = $_POST["pwd"];
$userName = $_POST["userName"];

//現實狀況金融有可能出現'刷卡失敗，訂單成功'或"刷卡成功，訂單失敗等各種狀況' 因此try&catch&finally很常用，無論是哪種後端語言
try{
    $sql = "UPDATE member SET pwd = ?, userName = ?, WHERE =? ";
    $st = $conn->prepare($sql);
    $st->bind_param("ssi", $pwd, $userName, $id);
    $st->execute();
}catch(Exception $e){
    echo($e);
}finally{
    $st->close();
    $conn->close();
}

//轉址
header("Location: member.php");
?>