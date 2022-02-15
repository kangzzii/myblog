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
            <li>+
                <?php if(!isset($_SESSION["id"])){?>
                <ul class="nav2">
                    <li onclick="location.href='login.php'">Login</li>
                    <li onclick="location.href='signup.php'">SignUp</li>
                    <li onclick="location.href='idpw.php'">ID/PW</li>
                 </ul>
                <?php }else{ ?>
                <ul class="nav2">
                    <li onclick="location.href='logout.php'">Logout</li>
                    <li onclick="location.href='edit_check.php'">Edit</li>
                    <li onclick="del()">탈퇴하기</li>
                    <script>
                        function del(){
                           if(confirm("정말로 탈퇴 하시겠습니까?")){
                            location.href="del.php"}
                        }
                    </script>
                </ul>
                <?php }?>   
            </li>
             </ul>
    </header>
    <div id="box3">
        <div class="i0">
            <p class="i1">고객 지원</p>
            <ul class=i2>
                <li><a href="notice.php">Notice</a></li>
                <li><a href="board.php">Board</a></li>
                <li><a href="inc.php">Inc ▼</a></li>
                <li><a href="guest.php">Guest</a></li>
                <li><a href="qna.php">Q&A</a></li>
                
            </ul>
        </div>
     </div>
    <section>
    <div class="g4">
            <br>
            <h1 style="float: left;">자료실</h1> 
            <ul class="inc_menu">
                <li><a href="inc2.php"><span style="color:goldenrod;font-size: small;">●</span> 표로 보기</a></li>
                <li><a href="inc.php"><span style="color:#b1b1b1;font-size: small;">●</span> 그림으로 보기</a></li>
            </ul>
            
            <br>
            <hr>
            <div class="i4">
                <form name="form4" action="inc2.html" method="POST">
                    <h3><span style="color:#a7866c;font-size: small;">■</span> 주제 검색하기</h3>
                    <input type="search" placeholder="검색어를 입력해 주세요." 
                    class="i5" name="search"
                        style="width: 600px;height: 50px;font-size: large;float: right;">
                        <img src="images/search.png" onclick="send()" class="searchimg">
                    </div>
                    </form>
            
    </div>
    <div id="inc">
        <table class="i3">
            <tr>
                <td>번호</td>
                <td>제목</td>
                <td>글쓴이</td>
                <td>일자</td>
            </tr>
            <tr>
                <td>1</td>
                <td>KANG G LOGO</td>
                <td>관리자</td>
                <td>2021-10-01</td>
            </tr>
            <tr>
                <td>2</td>
                <td> Travel agency Logo</td>
                <td>관리자</td>
                <td>2021-10-01</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Wedding Logo</td>
                <td>관리자</td>
                <td>2021-10-02</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bread Logo</td>
                <td>관리자</td>
                <td>2021-10-03</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Kangg's HTML</td>
                <td>관리자</td>
                <td>2021-10-04</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Kangg's CSS</td>
                <td>관리자</td>
                <td>2021-10-04</td>
            </tr>
           </table>
           <div class="i6">
                <p>< &ensp; 1 &ensp; ></p>
                <input type="button" class="i7" value="Uploading new file" 
        style="width:150px;height: 30px;
        background-color: #7788998a;border-radius: 30px;
        color: white;float: right;" onclick="location.href='inc_write.html'">
           </div>
    </div>
    </section>
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
        if(form4.search.value==""){alert("검색 할 내용을 입력하세요");form4.search.focus();return false;}
        document.form4.submit();
    }
</script>