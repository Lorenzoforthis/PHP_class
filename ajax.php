<?php
if(isset($_POST["userId"])){
    $userId = $_POST["userId"];
    

    $server = "localhost";
    $account = "root";
    $pwd = "";
    $db = "cloud_class";
    $conn = new mysqli($server,$account,$pwd,$db);

    if($conn->connect_error){
        echo("連線失敗");
    }else{
        echo("連線成功");
    }
    //這裡是sql語法
    $sql = "SELECT * FROM member
    WHERE userId LIKE '%".$userId."%' or userName Like '%".$userId."%'";
    //$conn:資料庫連線
    //query:查詢query($sql) => 查詢上述的sql指令
    $res = $conn->query($sql);
    //如果查詢的筆數大於0,代表查詢到資料
    if ($res->num_rows>0){
        // fetch_assoc:資料以陣列方式呈現
        // fetch_array:同上
        // fetch_object:資料以物件方式呈現
        // 陣列用[],物件用->
        // 下列這一行,將每筆陣列資料以row來代表,row可自取名稱
        while($row = $res->fetch_assoc()){
            echo("userId:".$row["userId"]."&nbsp;&nbsp;");
            echo("userName:".$row["userName"]);
            echo("<br>");
            }
    }else{
            echo("查無資料");
    }
        // 關閉資料庫連線(非常重要)(資料庫會當機，通常是連線未關閉)
        $conn->close();
    
}


?>