<?php
//如果前端用post, 要用_POST
//如果前端用get,要用$_GET

/*
這是多行註解,PHP連接符號為.
如果不想區分是GET或POST，也可以全部用$_REQUEST接收
MYSQL PORT 預設3307
CHAR的搜尋速度是VARCHAR的N倍以上，甚至十幾倍
一個資料表只能有一個primary key
null 打勾, 測試期間可以減少測試程式時間
索引鍵可增加查詢速度，但是會佔記憶體空間
*/
$userName = $_REQUEST["names"];
echo("<font color='blue'>歡迎----".$userName ."</font>");


$mobile = $_POST["mobile"];
//is_null:空值  !is_null:非空值
if(!is_null(($mobile)))
    {
        echo("<br>");
        echo($mobile);
    }
/*    
isset:有設定資料
if(isset($mobile));
    {
        echo("<br>");
        echo($mobile);
    }
!empty:不是空的，也就是有資料 
if(!empty($mobile)){
    echo("<br>");
    echo("手機號碼".$mobile);
}
*/
$birthday = $_POST["birthday"];
if(!empty($birthday)){
    echo("<br>");
    echo("生日". $birthday);
    echo("<br>");
    //Y年 M月 D日
    $year = date("Y",strtotime($birthday));
    $yy = $year - 1911;
    echo("民國".$yy."年");

}

$gender= $_POST["gender"];
echo("<br>");
echo("性別:");
if($gender == "F"){
    echo("女");
}else{
    echo("男");
}

echo("<br>");
echo("專長");
if(!empty($_POST["pro"])){
    // foreach:對於pro每一筆資料
    // as :取別名
    // $data:將每一筆pro的資料,以data的名稱來代表,名稱不一定要data,可自取名稱
    /*foreach($pro as $data){
        echo("<br>".$data);
    }
}   */
echo(implode(",",$_POST["pro"]));
}else{
    echo("無");
}

$city = $_POST["city"];
echo("<br>");
echo("戶籍地");
switch($city){
    case"1":
        echo("台中市");
        break;
    case"2":
        echo("台北市");
        break;
    case "3":
        echo("高雄市");
        break;
    case"4":
        echo("未知");
        break;
}

if(!empty($_POST["content"])){
    echo("<br>");
    echo("內容");
    //str_replace:取代字串
    //將$_POST["content]中有\n(換行)取代為網頁的換行(<br>)
    $content = str_replace("\n","<br>",$_POST["content"]);
    echo($content);
}


?>