<?php
//檢查有沒有名稱是"LoginOK"的Cookie，也檢查值是不是OK，沒有就直接把使用者帶到登入首頁
if (!isset($_COOKIE["LoginOK"]) || $_COOKIE["LoginOK"] !== "OK") {
    echo "<h1>這是一個秘密網頁，你不是會員，不能進來</h1>";
    echo "<a href='../index.php'>回到登入首頁！</a>";

    exit;
} else {
    require("../functions.php"); // require() 引用別的PHP檔案

    if (isset($_GET["id"])) {
        // 刪除使用者資料
        $DeleteResult = Delete_Member($_GET["id"]);

        if ($DeleteResult == true) {
            echo "帳號刪除成功！";
        } else {
            echo "帳號刪除失敗！";
        }
        echo "五秒鐘回到管理者頁面";
        header("refresh:1; url=admin.php");
        exit;
    }
}
