<?php
require "conn.php";
$userId = $_POST["userId"];
$pwd = $_POST["pwd"];
$mobile = $_POST["mobile"];

if ($mobile == "")
{
  $mobile = null;
}

$sql = "INSERT INTO member(userId,pwd,mobile)VALUES('". $userId ."','".$pwd."','".$mobile."')";
   //VALUES(?,?,?)";   比較安全的寫法，在checkMember2裡面 有簡略的說明
//echo($sql);
//exit;
mysqli_query($conn,"SET NAMES utf-8");
mysqli_query($conn,$sql);

echo("新增成功");

/*
跳至(轉址,導向)某一頁
header("Location:XXX.php);
*/

?>