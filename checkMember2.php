<?php
/*
把conn 單獨拉出 寫成一個php
    include "conn.php";另外亦可寫成以下三種
    include_once "conn.php"
    require "conn.php"
    require_once "conn.php"

*/
include "conn.php";

$userId = $_POST["userId"];

$sql = "SELECT * FROM member WHERE userId = ?";
$st = $conn->prepare($sql);
/* s:文字(String)
 若欄位是整數要用i(integer)
執行資料綁定:目的是防止使用者輸入特殊符號,例如單引號
或者單引號後再加上破壞性指令(drop,delete,update,insert..等)
s代表第一個?  而s的值為userId

若超過一個以上欄位:例 SELECT * FROM member WHERE userId = ? AND pwd?
$st->bind_param("ss", $userId, $pwd);
第一個s代表第一個?　第一個s的值為userId
第二個s代表第二個?  第二個s的值為pwd
*/

$st->bind_param("s",$userId);
//執行sql 指令(查詢,新增,修改,刪除)
$st->execute();
//取得查詢結果,將查詢結果存在變數res之中
$res = $st->get_result();
if($res->num_rows >0){
    echo("exist");
}

$conn->close();
?>