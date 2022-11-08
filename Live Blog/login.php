<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form action="login_from.php" method="post" >
        <h2>Life Blog</h2>
        <h3>登入即時部落格</h3>
        <h4>沒有任何帳號? <a href="signup.php">立即加入.</a>.</h4>
        <label>使用者名稱</label>
        <input class="top" type="text" name="Account" placeholder="帳號">
        <label>密碼</label>
        <input class="top" type="password" name="Password" placeholder="密碼">
        <label>記住我</label>
        <input  type="checkbox" name="RemeberMe" value="YesRememberMe"checked />
        <button type="submit">登入</button>
    </form>
</body>
</html>