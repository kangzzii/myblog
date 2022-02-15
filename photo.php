<?php 
include "include.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KangG</title>
    <!-- 폰트 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <!-- 폰트 끝 -->
    <link rel="stylesheet" href="style.css">
    <script src="//code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="script.js" defer="defer"></script>
</head>
<body>
    <!-- 머릿말 시작 -->
    <header>
        <div id="header_wrap">
            <!-- 로고  시작-->
            <div id="logo" onclick="location.href='index.php'">
                <img src="img/logo1.png">
            </div>
            <!-- 로고 끝 -->
            <!-- 모바일용 시작-->
            <div id="M_menu_bt"></div>
            <!-- 모바일용 끝 -->
            <ul id="header_right">
                <!-- 모바일용 유저메뉴 -->
                <div id="M_usmenu">
                    <ul class="M_usmenu">
                        <?php if(isset($_SESSION["id"])) {?>
                        <li onclick="location.href='logout.php'">Logout</li>
                        <li onclick="location.href='member_edit.php'">Edit</li>
                        <li onclick="location.href='member_del.php'">탈퇴</li>
                        <?php } else{ ?>
                        <li onclick="location.href='login.php'">Login</li>
                        <li onclick="location.href='signup.php'">Sign up</li>
                        <li onclick="location.href='idpw.php'">ID/PW</li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- 모바일용 유저메뉴 끝 -->
                <!-- 메뉴 시작 -->
                <li>
                    <ul class="menu">
                            <li onclick="location.href='index.php'">Home</li>
                            <li onclick="location.href='introduce.php'">About Me</li>
                            <li onclick="location.href='greet.php'" class="m_usmenu_list">Greet</li>
                            <li onclick="location.href='photo.php'" class="m_usmenu_list">Photo</li>
                            <li onclick="location.href='portfolio.php'" class="m_usmenu_list">Portfolio</li>
                            <li onclick="location.href='notice.php'">Notice</li>
                            <li onclick="location.href='board.php'" class="m_usmenu_list">Board</li>
                            <li onclick="location.href='inc.php'" class="m_usmenu_list">INC</li>
                            <li onclick="location.href='guest.php'">Guest</li>
                            <li onclick="location.href='qna.php'" class="m_usmenu_list">Q&A</li>
                    </ul>
                </li>
                <!-- 메뉴 끝 -->
                <!-- 유저 메뉴 시작 -->
                <li>
                    <div id="usmenu">Member</div>
                    <ul class="user_menu">
                        <?php if(isset($_SESSION["id"])) {?>
                        <li onclick="location.href='logout.php'">Logout</li>
                        <li onclick="location.href='member_edit.php'">Edit</li>
                        <li onclick="location.href='member_del.php'">탈퇴</li>
                        <?php } else{ ?>
                        <li onclick="location.href='login.php'">Login</li>
                        <li onclick="location.href='signup.php'">Sign up</li>
                        <li onclick="location.href='idpw.php'">ID/PW</li>
                        <?php } ?>
                    </ul>
                </li>
                <!-- 유저 메뉴 끝 -->
            </ul>
        </div>   
    </header>
    <!-- 컨텐츠 시작 -->
    <div id="content" style="display: flex;">
        <!-- about me 안의 메뉴 -->
        <div id="content_menu">
            <div class="content_menu_title">
                About Me<br>
                <span style="font-size: 0.8em;color: #eee;"> &#8618; Photo</span>
            </div>
            <ul class="content_menu_list">
                <li onclick="location.href='greet.php'">Greet</li>
                <li onclick="location.href='introduce.php'">Introduce</li>
                <li onclick="location.href='photo.php'">photo</li>
                <li onclick="location.href='portfolio.php'">Portfolio</li>
            </ul>
        </div>
        <!-- about me 안의 메뉴 끝-->
        <!-- 본문  -->
        <div id="content_box_wrap">
            <h1 style="text-indent: 50px;">사진첩</h1>
            <br>
            <hr>
            <br>
            <div id="portfolio">
                <ul class="photo_list">
                    <li>
                        <div class="pimg">
                            <img src="img/2014.JPG">
                        </div>
                        <div class="ptext">
                            <p><span style="color:darkblue;font-size: small;"> ■</span>&ensp; 2014년 中国 北京</p>
                        </div>
                    </li>
                    <li>
                        <div class="pimg">
                            <img src="img/2015.JPG">
                        </div>
                        <div class="ptext">
                        <p><span style="color:darkblue;font-size: small;"> ■</span>&ensp; 2015년 中国 大连</p></div>
                    </li>
                    <li>
                        <div class="pimg">
                            <img src="img/2016.PNG">
                        </div>
                        <div class="ptext">
                        <p><span style="color:darkblue;font-size: small;"> ■</span>&ensp; 2016년 中国 沈阳</p></div>
                    </li>
                    <li>
                        <div class="pimg">
                            <img src="img/2017.JPG">
                        </div>
                        <div class="ptext">
                        <p><span style="color:darkblue;font-size: small;"> ■</span>&ensp; 2017년 부산 중구</p></div>
                    </li>
                    <li>
                        <div class="pimg">
                            <img src="img/2018.JPG">
                        </div>
                        <div class="ptext">
                        <p><span style="color:darkblue;font-size: small;"> ■</span>&ensp; 2018년 中国 沈阳</p></div>
                    </li>
                    <li>
                        <div class="pimg">
                            <img src="img/2019.jpg">
                        </div>
                        <div class="ptext">
                        <p><span style="color:darkblue;font-size: small;"> ■</span>&ensp; 2019년 부산 금정구</p></div>
                    </li>
                    <li>
                        <div class="pimg">
                            <img src="img/20200.JPG">
                        </div>
                        <div class="ptext">
                        <p><span style="color:darkblue;font-size: small;"> ■</span>&ensp; 2020년 부산 진구</p></div>
                    </li>
                    <li>
                        <div class="pimg">
                            <img src="img/2021.jpg">
                        </div>
                        <div class="ptext">
                        <p><span style="color:darkblue;font-size: small;"> ■</span>&ensp; 2021년 부산 금정구</p></div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 본문 끝 -->
    </div>
    <!-- 컨텐츠 끝 -->
    <!-- 푸터 -->
    <footer>
        <div id="footer_wrap">
            All rights reserved by Jeeyeun Kang<br>
            responsible site since 2021.09.30
        </div>
    </footer>
    <!-- 푸터끝 -->
</body>
</html>