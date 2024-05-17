<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
        <title>會員列表</title>
        <script>
            function doDelete(id){
                swal.fire({
                    title: "確定刪除?",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: "確定",
                    denyButtonText: "取消"
                }).then((result) =>{
                    if (result.isConfirmed){
                        $.ajax({
                            url: "deleteMember.php",
                            type: "post",
                            data:{
                                memberId:id //左邊為變數名稱,右邊為值
                            },
                        success: function(msg){
                            if(msg == "ok"){
                               swal.fire("已刪除","[" + id + "]","success");
                            }else{
                                swal.fire("刪除失敗","[" + id +"]","error");
                            }
                        }    
                        });
                        /*swal.fire("標題","副標題","success")
                        swal.fire("標題","副標題","question")
                        swal.fire("標題","副標題","error") */
                    }
                });
            }
        </script>

    </head>

    <body>
        <div class="container">
            <div class="row">
                <table class="table border border-primary">
                    <thead>
                        <tr>
                            <th class="col-6 col-sm-4 col-lg-3 text-center">帳號</th>
                            <th class="col-6 col-sm-4 col-lg-3 text-center">密碼</th>
                            <th class="col-6 col-sm-4 col-lg-3 text-center">姓名</th>
                            <th class="col-6 col-sm-4 col-lg-3 text-center">手機</th>
                            <th class="col-6 col-sm-4 col-lg-3 text-center">修改</th>
                            <th class="col-6 col-sm-4 col-lg-3 text-center">刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "conn.php";
                        $sql = "SELECT * FROM member";
                        $res = $conn->query($sql);
                        
                        if ($res->num_rows>0){
                            while ($row = $res->fetch_array()){
                                 // >? 可以再這個點結束，老舊的寫法，為了把資料擺好                  
                                                                
                        ?>          
                            <tr class="member<?php echo ($row["id"]); ?>">
                                <td class="text-center"><?php echo($row["userId"]);?></td>
                                <td class="text-center"><?php echo($row["pwd"]);?></td>
                                <td class="text-center"><?php echo($row["userName"]);?></td>
                                <td class="text-center"><?php echo($row["mobile"]);?></td>
                                <td class="text-center">
                                    <a href="edit.php" class="btn btn-warning" target="_blank">修改</a>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-danger" onclick="doDelete('<?php echo($row['id']);?>')">刪除</a>
                                </td>
                            </tr>
                                  
                        <?php
                          }
                        }
                            $conn->close();
                        ?>
                    </tbody>               
               
            </div>
        </div>
    </body>
</html>

