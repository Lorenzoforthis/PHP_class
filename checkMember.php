<?php
$conn = new mysqli("localhost","root","","cloud_class");

$userId = $_POST["userId"];


$sql = "SELECT * FROM member WHERE userId = '".$userId."'";
$res = $conn->query($sql);

//如果查詢的筆數大於0,表示資料表中有查詢的userId存在
if ($res->num_rows >0){
    //回傳給前端ajax
    echo("exist");
}
$conn->close();
?>