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
    </div>
    <!-- Posts -->
    <section class="post container">
        <!-- Post Box 1 -->
        <?php
        
        for ($i = 0; $i < 9; $i++) {
            echo "<div class='post-box live'>";
            echo "<img src='img/post-1.jpg' alt='' class='post-img'>";
            echo "<h2 class='category'>{$i}</h2>";
            echo "<a href='post-page.php' class='post-title'>{$i}</a>";
            echo "<span class='post-date'>{$i}</span><span class='post-date'>{$time}</span>";
            echo "<p class='post-decription'>{$i}</p>";
            echo "<div class='profile'>";
            echo "<img src='img/profile-1.jpg' alt='' class='profile-img'>";
            echo "<span class='profile-name'>{$i}</span>";
            echo "</div>";
            echo "</div>";

        }
        ?>
        <!-- Post Box 2 -->
        <div class="post-box hot">
            <img src="img/post-2.jpg" alt="" class="post-img">
            <h2 class="category">熱門</h2>
            <a href="post-page.php" class="post-title">
                我們老大剛被架走了！習近平召告天下「團派」滅 二十大派系赤裸裸公開狠鬥
            </a>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-decription">
                前中國國家主席胡錦濤日前出席中國二十大，在閉幕式過程中卻「被離場」，引發外界熱烈關注。有分析人士指出，此舉意味著習近平消除胡錦濤所在的「團派」勢力大獲成功。
            </p>
            <!-- Profile -->
            <div class="profile">
                <img src="img/profile-2.jpg" alt="" class="profile-img">
                <span class="profile-name">張榕容</span>
            </div>
        </div>
        <!-- Post Box 3 -->
        <div class="post-box life">
            <img src="img/post-3.jpg" alt="" class="post-img">
            <h2 class="category">生活</h2>
            <a href="post-page.php" class="post-title">
                「楊肉盧」復仇擊敗世界第二 楊博涵賽後發文：幸運也不可思議
            </a>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-decription">
                台灣男雙「楊肉盧」楊博涵、盧敬堯組合，27日凌晨在法國羽球公開賽，首輪對戰曾高居世界第1的大會第2種子印尼「小黃人」吉地安（Marcus Fernaldi Gideon）和蘇卡穆約（Kevin Sanjaya Sukamuljo）組合，歷經3局大戰，爆冷擊敗對手，讓大會第2種子一輪遊，也終止對戰3連敗，楊博涵在個人臉書表示：「很幸運也不可思議。」
            </p>
            <!-- Profile -->
            <div class="profile">
                <img src="img/profile-3.jpg" alt="" class="profile-img">
                <span class="profile-name">于中中</span>
            </div>
        </div>
        <!-- Post Box 4 -->
        <div class="post-box hot">
            <img src="img/post-4.jpg" alt="" class="post-img">
            <h2 class="category">熱門</h2>
            <a href="post-page.php" class="post-title">
                有很多人瀏覽你在 Google 地圖上的相片！
            </a>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-decription">對照上週(10/17-21)美股S&P 500股價指數累計漲幅達4.7%，創近期單週最佳表現，反應美股資金面的多頭氛圍顯著，究其原因有二：(1)Fed聖路易聯準銀行總裁布拉德、舊金山聯準銀行總裁戴莉於上週五(10/21)同步強調，於目前通膨續處高檔下將持續緊縮政策，惟就2023年政策環境而言，則須較今年更加謹慎行事，暗示後續潛在升息放緩的考量選項；(2)若就通週而言，3Q財報獲利亮眼將屬關鍵利多，截至10/21統計，獲利優於券商者佔已公佈財報比重高達74.7%，激勵資金面助漲動能；整體而言，美股氛圍暫時轉趨正面。</p>
            <!-- Profile -->
            <div class="profile">
                <img src="img/profile-1.jpg" alt="" class="profile-img">
                <span class="profile-name">朱元冰</span>
            </div>

        </div>
        <!-- Post Box 5 -->
        <div class="post-box live">
            <img src="img/post-5.jpg" alt="" class="post-img">
            <h2 class="category">即時</h2>
            <a href="post-page.php" class="post-title">
                奈格颱風北轉！下週最近台灣有望放颱風假？預報員這樣說
            </a>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-decription">
                今年第22號颱風奈格今（27）日正式生成，氣象局預估它將於經過呂宋島以後北轉，週日晚上到週二之間最靠近台灣，也會造成各地雨勢，不過是否會發布陸上颱風警報或放颱風假？氣象局回應，颱風路徑仍有很大變數，先不要想這麼遠。
            </p>
            <!-- Profile -->
            <div class="profile">
                <img src="img/profile-2.jpg" alt="" class="profile-img">
                <span class="profile-name">郭曉婷</span>
            </div>
        </div>
        <!-- Post Box 6 -->
        <div class="post-box live">
            <img src="img/post-6.jpg" alt="" class="post-img">
            <h2 class="category">即時</h2>
            <a href="post-page.php" class="post-title">
                【驚悚片】男玩高空滑索出意外 瞬間墜地慘死！開心自拍卻錄下死亡瞬間
            </a>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-decription">
                巴西一名39歲男子利馬（Sergio Lima），本月10日和女友到塞阿拉州一處沙灘體驗高空繩索活動，輪到利馬上場時，他還利用自拍機，拍下自己開心體驗的一面。但過不久，繩索竟然出事，開心自拍瞬間變成錄下利馬的慘死瞬間。
            </p>
            <!-- Profile -->
            <div class="profile">
                <img src="img/profile-3.jpg" alt="" class="profile-img">
                <span class="profile-name">許凱</span>
            </div>
        </div>
        <!-- Post Box 7 -->
        <div class="post-box design">
            <img src="img/post-7.jpg" alt="" class="post-img">
            <h2 class="category">design</h2>
            <a href="post-page.php" class="post-title">
                有很多人瀏覽你在 Google 地圖上的相片！
            </a>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-decription">對照上週(10/17-21)美股S&P 500股價指數累計漲幅達4.7%，創近期單週最佳表現，反應美股資金面的多頭氛圍顯著，究其原因有二：(1)Fed聖路易聯準銀行總裁布拉德、舊金山聯準銀行總裁戴莉於上週五(10/21)同步強調，於目前通膨續處高檔下將持續緊縮政策，惟就2023年政策環境而言，則須較今年更加謹慎行事，暗示後續潛在升息放緩的考量選項；(2)若就通週而言，3Q財報獲利亮眼將屬關鍵利多，截至10/21統計，獲利優於券商者佔已公佈財報比重高達74.7%，激勵資金面助漲動能；整體而言，美股氛圍暫時轉趨正面。</p>
            <!-- Profile -->
            <div class="profile">
                <img src="img/profile-1.jpg" alt="" class="profile-img">
                <span class="profile-name">吳倩</span>
            </div>

        </div>
        <!-- Post Box 8 -->
        <div class="post-box tech">
            <img src="img/post-8.jpg" alt="" class="post-img">
            <h2 class="category">Tech</h2>
            <a href="post-page.php" class="post-title">
                有很多人瀏覽你在 Google 地圖上的相片！
            </a>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-decription">對照上週(10/17-21)美股S&P 500股價指數累計漲幅達4.7%，創近期單週最佳表現，反應美股資金面的多頭氛圍顯著，究其原因有二：(1)Fed聖路易聯準銀行總裁布拉德、舊金山聯準銀行總裁戴莉於上週五(10/21)同步強調，於目前通膨續處高檔下將持續緊縮政策，惟就2023年政策環境而言，則須較今年更加謹慎行事，暗示後續潛在升息放緩的考量選項；(2)若就通週而言，3Q財報獲利亮眼將屬關鍵利多，截至10/21統計，獲利優於券商者佔已公佈財報比重高達74.7%，激勵資金面助漲動能；整體而言，美股氛圍暫時轉趨正面。</p>
            <!-- Profile -->
            <div class="profile">
                <img src="img/profile-2.jpg" alt="" class="profile-img">
                <span class="profile-name">孫藝寧</span>
            </div>
        </div>
        <!-- Post Box 9 -->
        <div class="post-box design">
            <img src="img/post-9.jpg" alt="" class="post-img">
            <h2 class="category">Design</h2>
            <a href="post-page.php" class="post-title">
                有很多人瀏覽你在 Google 地圖上的相片！
            </a>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-decription">對照上週(10/17-21)美股S&P 500股價指數累計漲幅達4.7%，創近期單週最佳表現，反應美股資金面的多頭氛圍顯著，究其原因有二：(1)Fed聖路易聯準銀行總裁布拉德、舊金山聯準銀行總裁戴莉於上週五(10/21)同步強調，於目前通膨續處高檔下將持續緊縮政策，惟就2023年政策環境而言，則須較今年更加謹慎行事，暗示後續潛在升息放緩的考量選項；(2)若就通週而言，3Q財報獲利亮眼將屬關鍵利多，截至10/21統計，獲利優於券商者佔已公佈財報比重高達74.7%，激勵資金面助漲動能；整體而言，美股氛圍暫時轉趨正面。</p>
            <!-- Profile -->
            <div class="profile">
                <img src="img/profile-3.jpg" alt="" class="profile-img">
                <span class="profile-name">李佳潔</span>
            </div>
        </div>
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