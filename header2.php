<!-- bannerありバージョン -->

<header id="header">

<div class="container">

    <!-- 一段目 -->

    <?php
    require_once("h_banner.php");

    ?>

    <!-- 二段目 -->

    <div class="header_contents"><!-- flex開始 -->

        <!-- flexbox1 -->
        <div id="sns_btn">
            <div class="icon_content">
                <!-- iconmaster 53ページ目 -->
                <img src="" alt="">
                <p>S N S</p>
            </div>
        </div>

        <!-- flexbox2 -->
        <a href="http://xrptest.starfree.jp/" >
            <div id="shop_logo">
                 <img src="./img/88x31.png" alt="">
            </div>
        </a>

        <!-- flexbox3 -->
        <div id="hamburger">
            <div class="icon_content">
                <span class="inner_line line1"></span>
                <span class="inner_line line2"></span>
                <span class="inner_line line3"></span>
                <p>MENU</p>
            </div>
        </div>
    </div>

</div>



    <!-- ハンバーガーメニュー -->

    <!--ここから出てくるメニュー-->
    <div class="nav_wrapper">

            <!-- snsリンクナビ -->
        <div id="sns_wrapper">
            <div id="sns_nav">
                <ul>
                    <li>twitter</li>
                    <li>youtube</li>
                    <li>instagram</li>
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


</header>

<div id="under_nav" class="under_nav_pinned">
    <ul>
        <li>test1</li>
        <li>test2</li>
        <li>test3</li>
    </ul>
</div>


