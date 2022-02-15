<?php
include "include.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to kang-g homepage!!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
    <style>
    
    </style>
</head>
<body>
    <header>
        <ul class="nav">
            <li><a href="index.php"><img src="images/logo.png" style="width: 50px;height: 50px;"></a></li>
            <li><a href="notice.php">Notice</a></li>
            <li><a href="board.php">Board</a></li>
            <li><a href="guest.php">Guest</a></li>
            <li><a href="qna.php">QnA</a></li>
            <li><a href="inc.php">Inc</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
        </ul>
    </header>
    <div id="login">
        <div class="idpw">
        <ul class="idpw1">
            <li onclick="location.href='idpw.php'">계정 찾기</li>
            <li onclick="location.href='idpw2.php'">비밀번호 찾기</li>
        </ul>
        <div class="idpw0">
            <form name="idpw1" method="POST" action="idpw_ok.html">
            <table class="idpw7">
                <tr><td colspan="2"><p style="text-align: center; color: #9e9e9e;margin-top: 10px;">비밀번호 찾기</p></td></tr>
                <tr>
                    <th>이름</th>
                    <td><input type="text" class="idpw3" name="usname"
                         placeholder="   이름을 적어주세요"></td>
                </tr>
                <tr>
                    <th>계정</th>
                    <td><input type="text"class="idpw3" name="usid"
                         placeholder="   계정을 적어주세요"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="button"value="찾기" class="idpw4" onclick="send()">
                    </td>
                </tr>
            </table>
            </form>
            <div class="idpw5">
                <ul class="idpw6">
                    <li onclick="location.href='login.php'">
                        <span style="color:#506d84;font-size:small;">◀</span> 로그인 창으로 돌아가기</li>
                    <li onclick="location.href='index.php'"><span style="color:#506d84;font-size:small;">◀</span> 메인 화면으로 돌아가기</li>
                    <br>
                    <li onclick="location.href='signup.php'" style="width: 150px;"><span style="color:#506d84;font-size:small;">◀</span> 회원가입</li>
                </ul>
            </div>
        </div>

            
        
        </div>
    </div>
    <div id="fix">
        <ul class="fix">
            <li><p style="font-weight: bold;text-align: center;font-size: 1.2em;">How to Contact <span style="color: goldenrod;">Kang-G</span></p></li>
            <a href="https://www.facebook.com" target="_blank"><li><img src="images/facebook.png"></li></a>
            <a href="https://www.instagram.com" target="_blank"><li><img src="images/insta.png"></li></a>
            <a href="https://twitter.com" target="_blank"><li><img src="images/twitter.png"></li></a>
            <a href="https://www.youtube.com" target="_blank"><li><img src="images/youtube.png"></li></a>
            <a href="http://blog.naver.com" target="_blank"><li><img src="images/naver.png"></li></a>
        </ul>
    </div>
    <footer>
        <div class="ft">
        <div class="ft1">
            <h3>Login</h3>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="Signup.php">Signup</a></li>
                <li><a href="idpw.php">ID/PW</a></li>
            </ul>
        </div>
        <div class="ft1">
            <h3>Menu</h3>
        <ul>
            <li><a href="index.php">Main</a></li>
            <li><a href="notice.php">Notice</a></li>
            <li><a href="board.php">Board</a></li>
            <li><a href="guest.php">Guest</a></li>
            <li><a href="qna.php">QnA</a></li>
            <li><a href="inc.php">Inc</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
        </ul>
        </div>
        <div class="ft2">
            <h3>About Me</h3>
            <ul>
                <li><a href="greet.php">Greet</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="photo.php">Photo</a></li>
            </ul>
        </div>
            <div class="ft3">
                All rights reserved by Jeeyeun Kang <br>
                responsible site since 2021.09.30<br>
            </div>
        </div>
        
    </footer>
</body>
</html>
<script>
    function send(){
        if(idpw1.usname.value==""){alert("이름을 입력하세요");idpw1.usname.focus();return false;}
        if(idpw1.usid.value==""){alert("ID를 입력하세요");idpw1.usid.focus(); return false;}
        document.idpw1.submit();
    }
</script>