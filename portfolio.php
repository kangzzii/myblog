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
                <span style="font-size: 0.8em;color: #eee;"> &#8618; Portfolio</span>
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
                <h1 style="text-indent: 50px;">포토폴리오</h1>
                <br>
                <hr>
                <br>
        
            <div id="portfolio">
                <ul class="portfolio_list">
                    <li>
                        <div class="portfolio_img">
                            <img src="img/3.png">
                        </div>
                        <div class="portfolio_text">
                            <img src="img/yglogo.jpg">
                        </div>
                        <div class="portfolio_more">
                                <h2>YG 엔터테이먼트 홈페이지 copy</h2>
                                <br>
                                <h4>완성일자 : 10/13</h4>
                                <h4>기타 설명 : 일반형 홈페이지 / 메인페이지만 제작</h4>
                            <a href="https://rkd3116.cafe24.com/myblog/yg/yg.html"><input type="button" value="바로가기" class="portfolio_more_bt"></a>
                        </div>
                    </li>
                    <li>
                        <div class="portfolio_img">
                            <img src="img/1.png">
                        </div>
                        <div class="portfolio_text">
                            <img src="img/travellogo2.png">
                        </div>
                        <div class="portfolio_more">
                                <h2>여행사 홈페이지</h2>
                                <br>
                                <h4>완성일자 : 10/22</h4>
                                <h4>기타 설명 : 일반형 홈페이지 / 조별 프로젝트</h4>
                            <a href="https://rkd3116.cafe24.com/myblog/travel/index.html"><input type="button" value="바로가기" class="portfolio_more_bt"></a>
                        </div>
                    </li>
                    <li>
                        <div class="portfolio_img">
                            <img src="img/wave.jpg">
                        </div>
                        <div class="portfolio_text">
                            <img src="img/wavelogo.png">
                        </div>
                        <div class="portfolio_more">
                                <h2>wavve 메인 홈페이지 copy</h2>
                                <br>
                                <h4>완성일자 : 11/17</h4>
                                <h4>기타 설명 : 일반형 홈페이지/메인페이지만 제작</h4>
                            <a href="https://rkd3116.cafe24.com/myblog/wave/wave.html"><input type="button" value="바로가기" class="portfolio_more_bt"></a>
                        </div>
                    </li>
                    <li>
                        <div class="portfolio_img">
                            <img src="img/2.png">
                        </div>
                        <div class="portfolio_text">
                            <img src="img/hanamlogo.png">
                        </div>
                        <div class="portfolio_more">
                                <h2>하남종합사회복지관</h2>
                                <br>
                                <h4>완성일자 : 11/30</h4>
                                <h4>기타 설명 : 일반형 홈페이지</h4>
                            <a href="https://rkd3116.cafe24.com/hanam/nav.html"><input type="button" value="바로가기" class="portfolio_more_bt"></a>
                        </div>
                    </li>               
                    <li>
                        <div class="portfolio_img">
                            <img src="img/responsible.png">
                        </div>
                        <div class="portfolio_text">
                            <img src="img/haeundae.png">
                        </div>
                        <div class="portfolio_more">
                                <h2>해운대 중학교 홈페이지 copy</h2>
                                <br>
                                <h4>완성일자 : 12/23</h4>
                                <h4>기타 설명 : 반응형 홈페이지 / 메인페이지만 제작</h4>
                            <a href="https://rkd3116.cafe24.com/myblog/haeundae/index.html" ><input type="button" value="바로가기" class="portfolio_more_bt"></a>
                        </div>
                    </li>
                    <li>
                        <div class="portfolio_img">
                            <img src="img/tam.png">
                        </div>
                        <div class="portfolio_text">
                            <img src="img/tamlogo.png">
                        </div>
                        <div class="portfolio_more">
                                <h2>탬버린즈 홈페이지 리뉴얼</h2>
                                <br>
                                <h4>기타 설명 : 개인프로젝트 , 쇼핑몰 </h4>
                            <a href="https://rkd3116.cafe24.com/myblog/tamburins/index.php" ><input type="button" value="바로가기" class="portfolio_more_bt"></a>
                        </div>
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