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
    </script>
</head>
<body>
    <form action="login_from.php" method="post" >
        <!-- <div class="back"><button value="Go back!" onclick="history.back()">X</button></div> -->
        <div class="loginreturn"><input class="back" type="button" value="X" onclick="history.back()"></div>
        <h2>Life Blog</h2>
        <h3>登入即時部落格</h3>
        <h4>沒有任何帳號? <a href="signup.php">立即加入.</a>.</h4>
        <label>使用者名稱</label>
        <input class="top" type="text" name="Account" placeholder="帳號">
        <label>密碼</label>
        <input class="top" type="password" name="Password" placeholder="密碼">
        <label>驗證碼</label>
        <br>
        <label class="top"><img id="imgcode" src="captcha.php" onclick="refresh_code()"/></label> 
        <br>
        <label class="top" >點擊圖片可以更換驗證碼</label> 
        <input class="top" type="text" name="Checkword" size="20" maxlength="10" />
        <label>記住我</label>
        <input  type="checkbox" name="RemeberMe" value="YesRememberMe"checked />
        <button type="submit" >登入</button>
    </form>

</body>
</html>