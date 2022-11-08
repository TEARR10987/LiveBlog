<?php
//檢查有沒有名稱是"LoginOK"的Cookie，也檢查值是不是OK，沒有就直接把使用者帶到登入首頁
if (!isset($_COOKIE["LoginOK"]) || $_COOKIE["LoginOK"] !== "OK") {
    echo "<h1>這是一個秘密網頁，你不是會員，不能進來</h1>";
    echo "<a href='../index.php'>回到登入首頁！</a>";

    exit;
} else {
    session_start();
    require("../functions.php"); // require() 引用別的PHP檔案

    if (isset($_GET["id"])) {
        //檢查有沒有來自edit_member.php的POST，如果有，才更新使用者資料
        if (isset($_POST["Account"]) && isset($_POST["Password"]) && isset($_POST["Name"])) {
            // 更新使用者資料
            $UpdateResult = Update_Member($_POST["Account"],
                                          $_POST["Password"],
                                          $_POST["Name"],
                                          isset($_POST["Admin"]) ? $_POST["Admin"] : "",
                                          $_GET["id"]);

            if ($UpdateResult == true) {
                echo "{$_POST["Name"]}帳號更新成功！";
            } else {
                echo "{$_POST["Name"]}帳號更新失敗！";
            }
        }

        $Member = Query_One_Member($_GET["id"]); // 查詢特定使用者ID的資料

        $id = $Member['id'];
        $account = $Member['account'];
        $password = $Member['password'];
        $name = $Member['name'];
        $admin = $Member['admin'];
    }
}
?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改會員資料頁面</title>
</head>

<body>
    <h1>使用者：<?php echo $name ?></h1>
    <form name="login" method="post" action="edit_member.php?id=<?php echo $id ?>">
        帳號: <input type="text" name="Account" size="15" value="<?php echo $account ?>" /><br />
        密碼: <input type="text" name="Password" size="15" value="<?php echo $password ?>" /><br />
        姓名: <input type="text" name="Name" size="15" value="<?php echo $name ?>" /><br />
        是否為管理員：<input type="checkbox" name="Admin" value="Y" <?php echo ($admin == "Y") ? "checked" : "" ?> <?php echo ($_SESSION['admin'] == "Y") ? "" : "disabled" ?> /><br />
        <input type="hidden" name="Id" value="<?php echo $id ?>">
        <input type="submit" value="修改" />
    </form>
    <?php
    if ($_SESSION['admin'] == "Y")
        echo "<a href='admin.php'>回到管理頁面</a>";
    else
        echo "<a href='../index.php'>回到首頁</a>";
    ?>
</body>

</html>