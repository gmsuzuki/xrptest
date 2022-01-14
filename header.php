<!-- bannerありバージョン -->
<!-- スクロールするとヘッダーが固定 -->
<header id="header">

    <!-- 一段目 -->

    <!-- if文で読み込むかチェックすれば良いんじゃね？ -->
    <?php
    $url = $_SERVER['REQUEST_URI'];
    if(strpos($url,'girls')!== false){
    require_once("h_banner.php");
    }else{
    require_once("h_banner.php");
    }
    ?>

  

    <!-- 二段目 -->

    <div id="header_contents">

        <div id="header_flex" class="container"><!-- flex開始 -->
        <!-- flexbox1 -->
            <div id="sns_btn">
                <div class="icon_contents">
 <!--色が変えられる https://icooon-mono.com/?s=sns# -->
 <!-- https://icon-rainbow.com/ -->
                <img src="img/icon_sns.svg" alt="sns_icon" class="nav_icon">
                <p>S N S</p>
                </div>
            </div>

        <!-- flexbox2 -->
            <a href="http://xrptest.starfree.jp/" >
            <div id="shop_logo">
                 <img src="./img/200x40.png" alt="">
            </div>
            </a>

        <!-- flexbox3 -->
            <div id="hamburger">
                <div class="icon_contents">
                <span class="inner_line line1"></span>
                <span class="inner_line line2"></span>
                <span class="inner_line line3"></span>
                <p>MENU</p>
                </div>
        </div>
    </div><!-- flex閉じ -->

    <div id="line"></div>

    <!-- ハンバーガーメニュー -->

    <!--ここから出てくるメニュー-->
    <div class="nav_wrapper">

            <!-- snsリンクナビ -->
        <div id="sns_wrapper">
            <div id="sns_nav">
                <ul>
                    <li>
                        <a href="">
                        <img src="img/icon_twitter.svg" alt="twitter">
                        <p>twitter</p>
                        </a>
                    </li>
                    <li>
                        <a href="">
                        <img src="img/icon_youtube.svg" alt="youtube">
                        <p>youtube</p>
                        </a>
                    </li>
                    <li>
                        <a href="">
                        <img src="img/icon_instagram.svg" alt="instagram">
                        <p>instagram</p>
                        </a>
                    </li>
                </ul>
                <div id="sns_info">
                    開いています
                </div>
            </div>
            <!-- 消すよう背景 -->
            <div id="close_bg_sns"></div>
        </div>


        <!-- sp nav -->
        <div id="sp_wrapper">
            <nav id="sp_nav">
                    <ul>
                    <li>
                        <a href="#">メニューリンク1</a>
                    </li>
                    <li>
                        <a href="#">メニューリンク2</a>
                    </li>
                    <li>
                      <a href="#">メニューリンク3</a>
                    </li>
                    </ul>
                <div id="shop_info">
                    適当に
                </div>
            </nav>
            <!-- 消すよう背景 -->
            <div id="close_bg_ham"></div>
         </div>

    </div>
<!-- header ピン留めがヘッダーコンテンツになっているからここに持ってきた -->
<!-- メニュー内容も固定しとかないと、スクロールしたときにメニューが置いていかれる -->
</div>
</header>



