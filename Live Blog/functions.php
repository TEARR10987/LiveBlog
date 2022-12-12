<?php
// 資料庫連線，使用PDO的方式存取資料庫，更好懂，但建議你傳統的寫法別忘掉
function DB_Connect()
{
    // 資料庫連線基本設定
    $dbms = 'mysql';     //資料庫類型
    $host = 'localhost'; //資料庫位址
    $dbName = 'blog'; //預設資料庫
    $user = 'root';      //帳號
    $pass = '';          //密碼
    $dsn = "$dbms:host=$host;dbname=$dbName";

    try {
        $pdo = new PDO($dsn, $user, $pass); // 建立資料庫連線
        $pdo->exec('SET CHARACTER SET utf8mb4');

        if ($pdo === false) {
            die("發生錯誤無法連線");
            exit;
        }
    } catch (PDOException $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    return $pdo;
}

// 帳號密碼確認
function Account_Check(string $_account, string $_password)
{
    $AccountCheckResult = false; // $AccountCheckResult 變數用來做回傳值
    $pdo = DB_Connect(); // 執行連線函式

    try {
        if ($pdo === false) {
            die("發生錯誤無法連線");
        } else {
            $data = [$_account, $_password]; // 用一個簡單的陣列來綁定參數，有沒有比較簡單呢？
            $sql = "SELECT id, account, password, name, admin FROM users WHERE account = ? AND password = ?"; // 只會查出某個特定商品資料
            $statement = $pdo->prepare($sql);

            if ($statement->execute($data)) {
                // PDO::FETCH_ASSOC 能夠把查詢的結果，依照欄位來取值
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['password'] == $_password) {
                        // 將所查詢出來的欄位值，存到相關的SESSION變數中
                        $_SESSION["id"] = $row['id'];               // id
                        $_SESSION["account"] = $row['account'];     // 帳號
                        $_SESSION["password"] = $row['password'];   // 密碼
                        $_SESSION["name"] = $row['password'];       // 姓名
                        $_SESSION["admin"] = $row['admin'];         // 使用權限設定，如果是Y代表為管理者帳號
                        $AccountCheckResult = true;                 //如果帳號密碼正確，$AccountCheckResult就等於「真」 
                    }
                }
            }
        }
    } catch (PDOException $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    } finally {
        unset($PDO);
    }

    return $AccountCheckResult; // 最終整個函式會丟出去 $AccountCheckResult 變數
}
// 查詢所有文章
function Query_All_Post_Titles()
{
    $AllTitles = array(); // 由於文章資料可能不只一筆，所以我們用一個陣列來儲存
    $pdo = DB_Connect();    // 連線函式

    try {
        if ($pdo === false) {
            die("發生錯誤無法連線");
        } else {
            $sql = "SELECT posts.*, users.name FROM posts, users WHERE posts.user_id = users.id";
            $statement = $pdo->query($sql); // 查詢Query的結果

            // PDO::FETCH_ASSOC 能夠把查詢的結果，依照欄位來取值
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                array_push($AllTitles, $row); 
            }
        }
    } catch (PDOException $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    } finally {
        unset($PDO); // 關閉資料庫
    }

    return $AllTitles;
}

function Query_One_Post_Title(string $_post_id)
{
    $Post_Title = "";
    $pdo = DB_Connect(); // 連線函式

    try {
        if ($pdo === false) {
            die("發生錯誤無法連線，錯誤可能是：" . mysqli_connect_error());
        } else {
            $sql = "SELECT title FROM posts WHERE id = ?"; // 只會查出某個特定文章的標題

            if ($stmt = mysqli_prepare($pdo, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_post_id);

                $param_post_id = $_post_id;

                if (mysqli_stmt_execute($stmt) == true) {
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        mysqli_stmt_bind_result($stmt, $title);

                        if (mysqli_stmt_fetch($stmt)) {
                            $Post_Title = $title;
                        }
                    }
                }
            }
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    } finally {
        mysqli_close($pdo);
    }

    return $Post_Title; // $Post_Title 變數回傳文章標題
}

// 查詢特定文章的回文
function Query_One_Post_Details(string $_post_id)
{
    $AllPostDetails = array();
    $pdo = DB_Connect(); // 連線函式

    try {
        if ($pdo === false) {
            die("發生錯誤無法連線，錯誤可能是：" . mysqli_connect_error());
        } else {
            $sql = "SELECT post_detail.*, users.name FROM post_detail, users WHERE post_detail.user_id = users.id AND post_detail.post_id = ?";

            if ($stmt = mysqli_prepare($pdo, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_post_id);

                $param_post_id = $_post_id;

                if (mysqli_stmt_execute($stmt) == true) {
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) > 0) {
                        mysqli_stmt_bind_result($stmt, $id, $post_id, $user_id, $message, $datetime, $name);
                        while (mysqli_stmt_fetch($stmt)) {
                            $temp = array(
                                "id" => $id,
                                "post_id" => $post_id,
                                "user_id" => $user_id,
                                "message" => $message,
                                "datetime" => $datetime,
                                "name" => $name
                            );
                            array_push($AllPostDetails, $temp);     
                        }
                    }
                }
            }
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    } finally {
        mysqli_close($pdo);
    }

    return $AllPostDetails; // 最終整個函式會丟出去 $AllPostDetails 變數
}
?>