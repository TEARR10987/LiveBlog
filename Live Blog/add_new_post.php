<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>簡易討論板</title>
    <style>
        td {
            white-space: pre-line;
        }
    </style>

    <script>
        // 結合JavaScript
        function alertEvent() {
            alert("你已發文成功!");
            document.location.href = "index.php"; // 發文成功之後，回到首頁
        }
    </script>

    <?php
    //檢查有沒有名稱是"LoginOK"的Cookie，也檢查值是不是OK，沒有就直接把使用者帶到登入首頁
    if (!isset($_COOKIE["LoginOK"]) || $_COOKIE["LoginOK"] != "OK") {
        header("location:login.php"); //直接跳到登入頁面
    } else {
        session_start();
        require("functions.php");
        // 檢查是不是從「自己」送出來的POST，我們利用文章標題、使用者ID、回文的內容，來新增發文
        if (isset($_POST["title"]) && isset($_POST["user_id"]) && isset($_POST["message"])) {
            if ($_POST["title"] != "" && $_POST["message"] != "") {
                if (Add_New_Post_Trans($_POST["title"], $_POST["user_id"], $_POST["message"]) == true)
                    echo "<script type='text/javascript'>alertEvent();</script>";
            } else {
                echo "請輸入標題與文章內容！";
            }
        }
    }
    ?>
</head>

<body>
    <h1>發表新主題</h1>
    <hr>
    <p><a href='index.php'>回文章列表</a></p>
    <form name="login" method="post" action="add_new_post.php">
        標題：<textarea cols="50" rows="1" name="title" value=""></textarea><br>
        內文：<br>
        <textarea cols="100" rows="15" name="message" value="" /></textarea><br>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
        <input type="submit" value="發表新主題" />
    </form>

</body>

</html>