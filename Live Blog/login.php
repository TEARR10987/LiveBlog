<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/login.css">
    <script>
        function refresh_code() {
            document.getElementById("imgcode").src = "captcha.php";
        }
        // 結合JavaScript
        function alertSuccessEvent() {
            alert("你已登入成功!");
            document.location.href = "LiveBlog.php"; 
        }
        function alertFailEvent() {
            alert("你的帳號密碼有誤!重新登入!");
            document.location.href = "login.php"; 
        }
    </script>

    <?php
    //檢查有沒有來自index.php帳密的POST
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

            echo "<script type='text/javascript'>alertSuccessEvent();</script>";
        } else {
            echo "<script type='text/javascript'>alertFailEvent();</script>";
        }
        exit;
    }
    ?>
</head>

<body>
    <form action="login.php" method="post" >
        <!-- <div class="back"><button value="Go back!" onclick="history.back()">X</button></div> -->
        <div class="loginreturn" style="float:right" ><input class="back" type="button" value="X" onclick="history.back()"></div>
        <h2 >Life Blog</h2>
        <h3>登入即時部落格</h3>
        <h4>沒有任何帳號? <a href="signup.php">立即加入.</a>.</h4>
        <h6><label>使用者名稱</label></h6>
        <input class="top" type="text" name="Account" placeholder="帳號">
        <h6><label>密碼</label></h6>
        <input class="top" type="password" name="Password" placeholder="密碼">
        <h6><label>驗證碼</label></h6>
        <br>
        <label class="top"><img id="imgcode" src="captcha.php" onclick="refresh_code()"/></label> 
        <br>
        <h6><label class="top" >點擊圖片可以更換驗證碼</label></h6> 
        <input class="top" type="text" name="Checkword" size="20" maxlength="10" />
        <label>記住我</label>
        <input  type="checkbox" name="RemeberMe" value="YesRememberMe"checked />
        <button type="submit" >登入</button>
    </form>

</body>
</html>