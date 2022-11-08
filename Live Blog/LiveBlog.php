<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Blog</title>
    <!-- Link To CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Box Icons-->
    <link  rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    
</head>
<body>
    <!-- Header -->
    <header>
        <!-- Nav -->
        <div class="nav container">
            <!-- Logo -->
            <a href="#" class="logo">Live<span>Blog</span> </a>
            <!-- Login Btn -->
            <a href="login.php" class="login">登入</a>
        </div>
    </header>
    <!-- Home -->
    <section class="home" id="home">
        <div class="home-text container">
            <h2 class="home-title">The Live Blog</h2>
            <span class="home-subtitle">打開部落格 創造生活交流</span>
        </div>
    </section>

    <!-- Post Filter -->
    <div class="post-filter container">
        <span class="filter-item active-filter" data-filter='all'>全部</span>
        <span class="filter-item " data-filter='live'>即時</span>
        <span class="filter-item " data-filter='hot'>熱門</span>
        <span class="filter-item " data-filter='life'>生活</span>
    </div>
    <!-- Posts -->
    <section class="post container">
        
        <!-- Post Box 1 -->
        <div class="post-box live">
            <img src="img/post-1.jpg" alt="" class="post-img">
            <h2 class="category">即時</h2>
            <a href="post-page.php" class="post-title">
            台中神岡桶屍案 40多歲男性屍體背部有刺青
            </a>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-decription">（中央社記者趙麗妍台中27日電）台中市神岡區一處工廠發生桶屍案，檢警今天相驗，屍體為年約40多歲的男性，身高約160至170公分，因屍體蠟化增加辨識難度，背部有刺青但圖案無法辨識，身分確認須待DNA結果。</p>
            <!-- Profile -->
            <div class="profile">
                <img src="img/profile-1.jpg" alt="" class="profile-img">
                <span class="profile-name">周渝民</span>
            </div>
        </div>
        
    </section>
    <!-- Footer -->
    <div class="footer container">
        <p>&#169; Life Blog Test</p>
        <div class="social">
            <a href="#"><i class='bx bxl-facebook' ></i></a>
            <a href="#"><i class='bx bxl-instagram' ></i></a>
            <a href="#"><i class='bx bxl-linkedin' ></i></a>
        </div>
    </div>
    <?php
        $temp = Query_All_Post_Titles(); // 取得資料庫中所有發文的清單資料

        foreach ($temp as $row) { // 將所有發文的清單資料，依序讀取，然後製作成HTML表格
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td><a href = 'post_detail.php?post_id={$row['id']}'>{$row['title']}</a></td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['datetime']}</td>";
            echo "</tr>";
        }

        ?>
    <!-- JQuery Link -->
    <script
        src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous">
    </script>
    <!-- Link To JS -->
    <script src="js/main.js"></script>
</body>
</html>