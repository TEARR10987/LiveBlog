<?php
//檢查有沒有名稱是"LoginOK"的Cookie，也檢查值是不是OK，沒有就直接把使用者帶到登入首頁
if (!isset($_COOKIE["LoginOK"]) || $_COOKIE["LoginOK"] != "OK") {
    header("location:login.php"); //直接跳到登入頁面
} else {
    session_start();
    require("functions.php");
    // 檢查有沒有post_id的GET，這要用來查詢特定的回文清單
    if (isset($_GET["post_id"])) {
        $post_id = $_GET['post_id'];
        
        // 檢查是不是從「自己」送出來的POST，如果有收到，亦即使用者要快速回文，我們利用文章標題的ID、使用者ID、回文的內容，來更新回文post_detail資料表
        if (isset($_POST["post_id"]) && isset($_POST["user_id"]) && isset($_POST["message"]))
            if (Add_Post_Detail($_POST["post_id"], $_POST["user_id"], $_POST["message"]) == true) // 新增回文的函式
                echo "<h1>發文成功</h1>";
            else
                echo "<h1>發文失敗</h1>";
    }
    else{
        header("location:index.php");
    }
}
?>

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
</head>

<body>
    <h1><?php echo Query_One_Post_Title($post_id); ?></h1>
    <hr>
    <p><a href='index.php'>回文章列表</a></p>
    <h2>所有討論文章</h2>
    <table border="1">
        <tr>
            <th>編號</th>
            <th>回文</th>
            <th>作者</th>
            <th>刊登時間</th>
        </tr>
        <?php
        $temp =  Query_One_Post_Details($post_id);

        foreach ($temp as $row) { // 依序讀取每一行
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['message']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['datetime']}</td>";
            echo "</tr>";
        }

        ?>
    </table>
<h3>快速回文</h3>
<form name="login" method="post" action="post_detail.php?post_id=<?php echo $post_id; ?>">
    <textarea cols="100" rows="15" name="message" value="" /></textarea>
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
    <input type="submit" value="回文" />
</form>

</body>

</html>