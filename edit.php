<?php
require "conn.php";

$id = $_GET['id'];
$sql = "SELECT * FROM member WHERE id = ?";
$st = $conn->prepare($sql);
$st->bind_param("i", $id);
$st->execute();
$res = $st->get_result();
$member = $res->fetch_object();
$st->close();
$conn->close();

?>
<html>
<head>
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <meta charset="uff-8" />
    <title>修改會員資料</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form method="post" action="update.php">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <table class="table table-boarded border-danger">
                    <tr>
                        <td class="col-2 text-center">密碼</td>
                        <td class="col-2">
                            <input type="text" class="form-control border-dark col-2" name="pwd" value="<?php echo $member->pwd;?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-2 text-center">姓名</td>
                        <td class="col-4">
                            <input text class="form-control border-dark" name="username" value="<?php echo $member->username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="tex-center">
                            <input type="submit" value="確定" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>