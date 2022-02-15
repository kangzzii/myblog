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
    <!-- 로그인창 시작-->
    <div id="idpw_wrap" style="display: flex;">
        <!-- ID 찾기  -->
        <div id="id_wrap">
            <form name="frmID" method="post" action="find_id.php">
                <ul class="id_list">
                    <li>
                        <h1><span style="color: seagreen;">ID</span> 찾기</h1>
                    </li>
                    <!-- ID찾았을때 표시되는 창 시작 -->
                    <?php 
                    if(isset($_POST["usid"])){?>
                        <li style="text-align:center;font-size:1.1em">
                            찾으시는 계정의 아이디는<br>
                            <span style="color:red;font-weight:bold"><?php echo $_POST["usid"]?></span> 입니다.
                        </li>
                    <?php }?>
                    <!-- ID찾았을때 표시되는 창 끝 -->
                    <li>
                        <div class="login_box">
                            <div class="login_text">이름</div>
                            <input type="text" name="usname" class="login_bar" placeholder="이름을 입력하세요.">
                        </div>
                    </li>
                    <li>
                        <div class="login_box">
                            <div class="login_text">이메일</div>
                            <input type="text" name="usemail" class="login_bar" placeholder="이메일을 입력하세요.">
                        </div>
                    </li>
                    <li align="center">
                        <input type="button" class="idpw_bt" value="ID 찾기" onclick="findId()">
                    </li>
                </ul>
                <!-- id찾기 버튼 스크립트 -->
                <script>
                    function findId(){
                        if(frmID.usname.value==""){
                            alert("찾으시는 계정의 가입하실때 작성한 이름을 입력하세요");
                            frmID.usname.focus();return false;
                        }
                        if(frmID.usemail.value==""){
                            alert("찾으시는 계정의 가입하실때 작성한 이메일을 입력하세요");
                            frmID.usemail.focus();return false;
                        }else{
                            document.frmID.submit();
                        }
                    }
                </script>
                <!-- id찾기 버튼 스크립트 끝-->
            </form>
        </div>
        <!-- ID 찾기 끝 -->
        <!-- PW 찾기 -->
        <div id="pw_wrap">
            <form name="frmPW" method="post" action="find_pw.php">
                <ul class="id_list">
                    <li>
                        <h1><span style="color: #3b53be">비밀번호</span> 찾기</h1>
                    </li>
                    <!-- pw찾았을때 표시되는 창 시작 -->
                    <?php 
                    if(isset($_POST["uspw"])){?>
                        <li style="text-align:center;font-size:1.1em">
                            찾으시는 계정의 비밀번호는<br>
                            <span style="color:red;font-weight:bold"> <?php echo $_POST["uspw"]?> </span> 입니다.
                        </li>
                    <?php }?>
                    <!-- pw찾았을때 표시되는 창 끝 -->
                    <li>
                        <div class="login_box">
                            <div class="login_text">이름</div>
                            <input type="text" name="usname" class="login_bar" placeholder="이름을 입력하세요.">
                        </div>
                    </li>
                    <li>
                        <div class="login_box">
                            <div class="login_text">아이디</div>
                            <input type="text" name="usid" class="login_bar" placeholder="아이디를 입력하세요.">
                        </div>
                    </li>
                    <li align="center">
                        <input type="button" class="idpw_bt" value="비밀번호 찾기" onclick="findPW()">
                    </li>
                </ul>
                <!-- pw찾기 버튼 스크립트 -->
                <script>
                    function findPW(){
                        if(frmPW.usname.value==""){
                            alert("찾으시는 계정의 가입하실때 작성한 이름을 입력하세요");
                            frmPW.usname.focus();return false;
                        }
                        if(frmPW.usid.value==""){
                            alert("찾으시는 계정의 아이디를 입력하세요");
                            frmPW.usid.focus();return false;
                        }else{
                            document.frmPW.submit();
                        }
                    }
                </script>
                <!-- id찾기 버튼 스크립트 끝-->
            </form>
        </div>
        <!-- PW 찾기 끝 -->
    </div>
    <!-- 로그인창 끝 -->
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