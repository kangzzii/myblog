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
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!--  -->
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
    <!-- 머릿말 끝 -->
    <!-- 본문 시작 -->
    <div id="wrap">
        <!-- 프로필 시작 -->
        <div id="profile">
            <div id="profile_back">
                <div class="profile_photo">
                    <img src="img/imog.gif">
                </div>
                <ul class="profile_sns_bt">
                        <li><a href="https://www.facebook.com" target="_blank"><img src="img/facebook.png"></a></li>
                        <li><a href="https://www.instagram.com" target="_blank"><img src="img/insta.png"></a></li>
                        <li><a href="http://blog.naver.com" target="_blank"><img src="img/naver.png"></a></li>
                </ul>
                <ul class="profile_text">
                    <li>Hello</li>
                    <li>My name is Jeeyeun Kang</li>
                </ul>
                <ul class="profile_fast_bt">
                    <li onclick="location.href='greet.php'">Greet</li>
                    <li onclick="location.href='introduce.php'">Introduce</li>
                </ul>
            </div>    
        </div>
        <!-- 프로필 끝 -->
        <!-- 본문 오른쪽 시작 -->
        <div id="right">
            <!-- 공지사항 시작 -->
            <div id="index_notice">
                <img src="img/noticeicon.png" class="notice_icon">
                <ul class="index_notice_list">
                    <?php
                    $sql="select * from notice order by no desc limit 0,5";
                    $rs=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($rs)){
                    ?>
                    <li><a href="notice_content.php?no=<?php echo $row["no"]?>"><?php echo $row["title"]?></a></li>
                    <?php } ?>
                </ul>
                <div class="more" onclick="location.href='notice.php'" style="color:white">+</div>
            </div>
            <!-- 공지사항 끝 -->
            <!-- 포토 폴리오 시작 -->
            <div id="index_portfolio">
                <div class="index_title">
                    Portfolio   <div class="more" onclick="location.href='portfolio.php'">+</div>
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide" onclick="location.href='https://rkd3116.cafe24.com/hanam/nav.html'">
                        <img src="img/2.png">
                        <div class="index_portfolio_title">
                            <img src="img/hanamlogo.png">
                        </div>
                      </div>
                      <div class="swiper-slide" onclick="location.href='https://rkd3116.cafe24.com/myblog/travel/index.html'">
                        <img src="img/1.png">
                        <div class="index_portfolio_title">
                            <img src="img/travellogo2.png">
                        </div>
                      </div>
                      <div class="swiper-slide" onclick="location.href='https://rkd3116.cafe24.com/myblog/yg/yg.html'">
                        <img src="img/3.png">
                        <div class="index_portfolio_title">
                            <img src="img/yglogo.jpg">
                        </div>
                      </div>
                      <div class="swiper-slide" onclick="location.href='https://rkd3116.cafe24.com/myblog/haeundae/index.html'">
                        <img src="img/responsible.png">
                        <div class="index_portfolio_title">
                            <img src="img/haeundae.png">
                        </div>
                      </div>
                      <div class="swiper-slide" onclick="location.href='https://rkd3116.cafe24.com/myblog/wave/wave.html'">
                        <img src="img/wave.jpg">
                        <div class="index_portfolio_title" style="background-color:#333">
                            <img src="img/wavelogo.png">
                        </div>
                      </div>
                      <div class="swiper-slide" onclick="location.href='https://rkd3116.cafe24.com/myblog/tamburins/index.php'">
                        <img src="img/tam.png">
                        <div class="index_portfolio_title">
                            <img src="img/tamlogo.png">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <script>
                var swiper = new Swiper(".mySwiper", {
                    effect: "coverflow",
                    grabCursor: true,
                    pagination: '.swiper-pagination',
                        paginationClickable: true,
                        effect: 'coverflow',
                        loop: true,
                    centeredSlides: true,
                    slidesPerView: "auto",
                    coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: false,
                    },
                    pagination: {
                    el: ".swiper-pagination",
                    },
                });
            </script>
            <!-- 포토 폴리오 끝 -->
            <!-- 게시판,qna 시작 -->
            <div id="board">
                <ul class="board_tap_list">
                    <li><a href="#" style="font-family: 'Anton', sans-serif;">Board</a></li>
                    <li><a href="#" style="font-family: 'Anton', sans-serif;">QnA</a></li>
                </ul>
                <ul class="board_tap_content">
                    <li>
                        <table class="index_board_content">
                            <?php
                            $sql="select * from board order by no desc limit 0,6";
                            $rs=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($rs)){
                            ?>
                            <tr>
                                <td><a href="board_content.php?no=<?php echo $row["no"]?>"><?php echo $row["title"] ?></td>
                                <td><?php echo $row["writeday"] ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="2" style="padding-top: 0px;">
                                    <div class="more2" onclick="location.href='board.php'">게시판 바로가기</div>
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table class="index_qna_content">
                        <?php
                        $sql="select * from qna2 order by p_no desc,no asc limit 0,6";
                        $rs=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($rs)){
                            // 비밀글
                            if($row["secret"]=="1"){
                        ?>
                        <tr>
                            <td>
                                <a href="qna_content.php?no=<?php echo $row["no"]?>">
                                    <!-- 답변  -->
                                    <?php
                                        $space=$row["step"];
                                        for($i=1;$i<=$space;$i++){
                                            echo"&emsp;";
                                        }
                                        if($space!=0){
                                            echo "<span style='font-size:1.5em'><b>└</b></span>";
                                        }
                                    ?>
                                    <!-- 답변 끝 -->
                                    <b>비밀 글 입니다.</b>
                                </a>
                            </td>
                            <td><?php echo $row["writer"]?></td>
                        </tr>
                        <?php
                            }
                            //비밀 글 끝 
                            else{
                            //공개글 시작
                        ?>
                        <tr>
                            <td>
                                <a href="qna_content.php?no=<?php echo $row["no"]?>">
                                    <!-- 답변  -->
                                    <?php
                                        $space=$row["step"];
                                        for($i=1;$i<=$space;$i++){
                                            echo"&emsp;";
                                        }
                                        if($space!=0){
                                            echo "<span style='font-size:1.5em'><b>└</b></span>";
                                        }
                                    ?>
                                    <!-- 답변 끝 -->
                                    <b><?php echo $row["title"]?></b>
                                </a>
                            </td>
                            <td><?php echo $row["writer"]?></td>
                        </tr>
                        <?php } //공개글 끝
                            } //while 끝
                        ?>
                            <tr>
                                <td colspan="2"  style="padding-top: 2px;">
                                    <div class="more2" onclick="location.href='qna.php'">QnA 바로가기</div>
                                </td>
                            </tr>
                        </table>
                    </li>
                </ul>
            </div>
            <!-- 게시판,qna 끝 -->
            <!-- 사진 시작 -->
            <div id="inc">
                <ul class="inc_tap_list">
                    <li>
                        INC
                    </li>
                    <li>
                            Photo 
                    </li>
                </ul>
                <ul class="inc_content_tap">
                    <li>
                        <div class="ocean">
                            <div class="wave"></div>
                            <div class="wave"></div>
                            <div class="wave_title">Download</div>
                        </div>
                        <div class="inc_more">
                            <div class="inc_more_bt" onclick="location.href='inc.php'">바로가기</div>
                        </div>
                    </li>
                    <li>
                        <ul class="index_photo_list">
                            <li><img src="img/2014.jpeg"></li>
                            <li><img src="img/2015.jpeg"></li>
                            <li><img src="img/2019.jpg"></li>
                            <li><img src="img/2017.jpeg"></li>
                            <li><img src="img/2021.jpg"></li>
                        </ul>
                        <div class="inc_more">
                            <div class="inc_more_bt" onclick="location.href='photo.php'">바로가기</div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- 사진 끝 -->
        </div>
        <!-- 본문 오른쪽 끝 -->
        <!-- 본문 하단 시작 -->
        <div id="bottom">
            <!-- 유튜브 시작 -->
            <div id="youtube">
                <div class="youtube">
                    <iframe width="360px" height="220px" src="https://www.youtube.com/embed/XBPjVzSoepo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="youtube">
                    <iframe width="360px" height="220px" src="https://www.youtube.com/embed/tNkZsRW7h2c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <!-- 유튜브 끝 -->
            <!-- sns시작 -->
            <div id="sns">
                <ul class="sns">
                    <li>
                        <a href="https://www.facebook.com" target="_blank" style="font-family: 'Anton', sans-serif;"><span style="color: #3b5998;font-family: 'Anton', sans-serif">F</span>acebook
                        <div class="sns_img_box"><img src="img/ffacebook.png"></div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com" target="_blank" style="font-family: 'Anton', sans-serif;"><span style="color: #8b00ff;font-family: 'Anton', sans-serif;">I</span>nstagram
                        <div class="sns_img_box"><img src="img/iinsta.png"></div>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com" target="_blank" style="font-family: 'Anton', sans-serif;"><span style="color: #00acee;font-family: 'Anton', sans-serif;">T</span>witter
                        <div class="sns_img_box"><img src="img/twitter.png"></div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com" target="_blank" style="font-family: 'Anton', sans-serif;"><span style="color: #c4302b;font-family: 'Anton', sans-serif;">Y</span>outube
                        <div class="sns_img_box"><img src="img/youtube.png"></div>
                        </a>
                    </li>
                    <li style="line-height:40px;font-size: 1.2em;">
                        How to<br> contact ? 
                    </li>
                    <li>
                        <a href="http://blog.naver.com" target="_blank" style="font-family: 'Anton', sans-serif;"><span style="color: #1ec800;font-family: 'Anton', sans-serif;">N</span>aver blog
                        <div class="sns_img_box"><img src="img/nnaver.png"></div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sns끝 -->
        </div>
        <!-- 본문 하단 끝 -->
    </div>
    <!--본문 끝  -->
    <!-- 바닥글 시작 -->
    <footer>
        <div id="footer_wrap">
            All rights reserved by Jeeyeun Kang<br>
            responsible site since 2021.09.30
        </div>
    </footer>
    <!-- 바닥글 끝 -->
</body>
</html>