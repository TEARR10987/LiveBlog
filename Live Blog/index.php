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
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
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
        <!-- 新增文章 -->
        <a class="login newpost" href="add_new_post.php" class="login">新增文章</a>
</div>
   
    <!-- Posts -->
    <section class="post container">
        <!-- Post Box 1 -->
        <?php
        require_once("functions.php"); //資料庫連線

        $temp = Query_All_Post_Titles();
        
        foreach ($temp as $row) {
            echo "<div class='post-box live'>";
            echo "<img src='img/{$row['image']}' alt='' class='post-img'>";
            echo "<h2 class='category'>{$row['id']}</h2>";
            echo "<a href='post-page.php' class='post-title'>{$row['user_id']}</a>";
            echo "<span class='post-date'>{$row['title']}</span><span class='post-date'>{$row['datetime']}</span>";
            echo "<p class='post-decription'>{$row['name']}</p>";
            echo "<div class='profile'>";
            echo "<img src='img/profile-1.jpg' alt='' class='profile-img'>";
            echo "<span class='profile-name'>{$i}</span>";
            echo "</div>";
            echo "</div>";

        }
        ?>
        <!-- Post Box 2 -->
        <!-- <div class="post-box hot">
            <img src="img/post-2.jpg" alt="" class="post-img">
            <h2 class="category">熱門</h2>
            <a href="post-page.php" class="post-title">
                我們老大剛被架走了！習近平召告天下「團派」滅 二十大派系赤裸裸公開狠鬥
            </a>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-decription">
                前中國國家主席胡錦濤日前出席中國二十大，在閉幕式過程中卻「被離場」，引發外界熱烈關注。有分析人士指出，此舉意味著習近平消除胡錦濤所在的「團派」勢力大獲成功。
            </p>
        
            <div class="profile">
                <img src="img/profile-2.jpg" alt="" class="profile-img">
                <span class="profile-name">張榕容</span>
            </div>
        </div> -->
    </section>
    <!-- Footer -->
    <div class="footer container">
        <p>&#169; Life Blog Test</p>
        <div class="social">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-linkedin'></i></a>
        </div>
    </div>

    <!-- JQuery Link -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous">
    </script>
    <!-- Link To JS -->
    <script src="js/main.js"></script>
</body>

</html>