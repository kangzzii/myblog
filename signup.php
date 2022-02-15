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
    <!-- 회원가입 창 시작-->
    <div id="signup">
        <div id="signup_wrap">
            <div class="login_logo">
                <img src="img/logo.png">
            </div>
            <div class="login_title">
                <h1>회원가입</h1>
            </div>
            <!-- 회원가입 내용물 탭 -->
            <form name="frm1" method="post" action="signup_ok.php">
                <ul class="signup_tap">
                    <li>
                        <ul class="signup_content">
                            <li>
                                <div class="login_box">
                                    <div class="login_text">이름</div>
                                    <input type="text" name="usname" class="login_bar" required placeholder="이름을 입력하세요.">
                                </div>
                            </li>
                            <li>
                                <div class="login_box">
                                    <div class="login_text">ID</div>
                                    <input type="text" name="usid" class="login_bar" required placeholder="아이디를 입력하세요.">
                                </div>
                            </li>
                            <li>
                                <div class="signup_idcheck_bt" onclick="idcheck()">ID 중복 확인</div>
                                <input type="hidden" name="idok">
                            </li>
                            <!-- id 중복확인 스크립트 -->
                            <script>
                                function idcheck(){
                                    if(frm1.usid.value==""){
                                        alert("아이디를 입력하세요.");
                                        frm1.usid.focus();return false;
                                    }
                                    window.open("idcheck.php?usid="+frm1.usid.value,"pop","width=300,height=150")
                                }
                            </script>
                            <!-- id 중복확인 스크립트 끝-->
                            <li>
                                <div class="login_box">
                                    <div class="login_text">Password</div>
                                    <input type="password" name="uspw" class="login_bar" required placeholder="비밀번호를 입력하세요.">
                                </div>
                            </li>
                            <li>
                                <div class="login_box">
                                    <div class="login_text">E-mail</div>
                                    <input type="text" name="usemail" class="login_bar" required placeholder="이메일을 입력하세요.">
                                </div>
                            </li>
                            <li>
                                <div class="login_box">
                                    <div class="login_text">생일</div>
                                    <input type="date" name="usbd" required class="signup_date">
                                </div>
                            </li>
                            <li>
                                <div class="signup_tap_bt" 
                                style="margin-top: 10px;float: right; background-color: seagreen;">다음</div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="signup_content">
                            <li>
                                <div class="login_box">
                                    <div class="login_text">성별</div>
                                    <div class="signup_gender">
                                        <input type="radio" value="남성" required name="gender">남성
                                        <input type="radio" value="여성" required name="gender">여성
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="login_box">
                                    <div class="login_text">학력<span style="font-size:small">(선택)</span></div>
                                    <select name="grade" class="signup_grade">
                                        <option value="초졸">초졸</option>
                                        <option value="중졸">중졸</option>
                                        <option value="고졸">고졸</option>
                                        <option value="대졸">대졸</option>
                                        <option value="대학원졸">대학원졸</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="login_box">
                                    <div class="login_text">취미<span style="font-size:small">(선택)</span></div>
                                    <div class="signup_hobby">
                                        <input type="checkbox" name="hobby[]" value="낚시">낚시&ensp;
                                        <input type="checkbox" name="hobby[]" value="운동">운동&ensp;
                                        <input type="checkbox" name="hobby[]" value="등산">등산&ensp;
                                        <input type="checkbox" name="hobby[]" value="영화보기">영화보기&ensp;
                                        <input type="checkbox" name="hobby[]" value="음악감상">음악감상&ensp;
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="login_box" style="height: 140px;">
                                    <div class="login_text" style="width: 200px;">남기는말<span style="font-size:small">(선택)</span></div>
                                    <textarea cols="1000" rows="10" name="memo" class="signup_memo" placeholder="남기시는 말을 작성해 주세요."></textarea>
                                </div>
                            </li>
                            <li style="text-align: center;margin-top: 30px;">
                                <input type="button" value="이전" class="signup_tap_bt2" style="background-color: seagreen;">
                                <input type="reset" value="다시작성" class="signup_bt" style="background-color: crimson;">
                                <input type="button" value="가입하기" class="signup_bt" onclick="signup()">
                            </li>
                        </ul>
                    </li>
                </ul>
            </form>
            <!-- 회원가입 내용물 탭 끝 -->
            <!-- 회원가입 스크립트 -->
            <script>
                function signup(){
                    if(frm1.idok.value==""){
                        alert("ID 중복확인을 해주세요.")
                    }else{
                        document.frm1.submit();
                    }
                }
            </script>
            <!-- 회원가입 스크립트 끝 -->
        </div>
    </div>
    <!-- 회원가입 창 끝 -->
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