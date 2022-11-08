<?php
if (isset($_POST["Account"]) && isset($_POST["Password"])) {
    session_start();  // 啟用Session

    require("functions.php"); // require() 引用別的PHP檔案

    $Account = $_POST["Account"];                                       // 使用者帳號
    $Password = $_POST["Password"];                                     // 密碼
    $RemeberMe = isset($_POST["RemeberMe"]) ? $_POST["RemeberMe"] : ""; // 記住我
    $AccountCheckResult = Account_Check($Account, $Password);           // 帳號密碼驗證

    if ($AccountCheckResult) {
        // 依據有沒有勾選記住我？來設定LoginOK的Cookie的期限
        $date = ($RemeberMe == "YesRememberMe") ? strtotime("+10 days", time()) : strtotime("+1 minutes", time());
        setcookie("LoginOK", "OK", $date); // 建立LoginOK的Cookie，用來辨識使用者是否已經成功驗證帳號密碼
        header("refresh:0; url=LifeBlog.php");
    } else {
        header("refresh:0; url=login.php");
    }
    exit;
}