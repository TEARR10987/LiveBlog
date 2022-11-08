<?php
    require("functions.php"); // require() 引用別的PHP檔案

    //檢查有沒有來自edit_member.php的POST，如果有，才更新使用者資料
    if (isset($_POST["Account"]) && isset($_POST["Password"]) && isset($_POST["Name"])) {
        if ($_POST["Account"] != "" && $_POST["Password"] != "" && $_POST["Name"] != "") {
            // 更新使用者資料
            $InsertResult = Add_Member(
                $_POST["Account"],
                $_POST["Password"],
                $_POST["Name"],
                isset($_POST["Admin"]) ? $_POST["Admin"] : ""
            );

            if ($InsertResult == true)
                echo "{$_POST["Name"]}帳號新增成功！";
            else
                echo "{$_POST["Name"]}帳號新增失敗！";
            
            echo "五秒鐘回到管理者頁面";
            header("refresh:1; url=login.php");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="signup-box">
    <form name="index.php" method="post" action="signup.php">
        <h2>註 冊</h2>
        <label  >帳號</label>
        <input class="top" type="text" name="Account" size="15" value="" /><br />
        <label >密碼</label>
        <input class="top" type="text" name="Password" size="15" value="" /><br />
        <label >名字</label>
        <input class="top" type="text" name="Name" size="15" value="" /><br />
        <label >管理員</label>
        <input type="checkbox" name="Admin" value="Y" checked/><br />
        <input class="top" type="submit" value="新增會員" />
    </form>
    </div>
    
</body>
</html>