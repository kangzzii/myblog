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
                <li><a href="inc.php">Inc</a></li>
                <li><a href="guest.php">Guest</a></li>
                <li><a href="qna.php">Q&A ▼</a></li>
                
            </ul>
        </div>
     </div>
    <section>
    <div class="g4">
            <br>
            <h1>질문과 답변</h1>
            <br>
            <div>
            <input type="button" class="i7" value="새질문하기" 
                onclick="location.href='new_qna.html'"
                style="width:100px;height: 30px;
                background-color: #7788998a;border-radius: 30px;
                color: white;float: right;">
            </div>
            <br><br>
            <hr>
    </div>
   <div id="qna">
       <div class="changchang" style="height: 1300px;
       background-size: 60%;
       background-position: 250px 1000px;">
           <form name="qna1" method="POST" action="qna.html">
           <p style="font-weight: bold;font-size: 1.8em;">질문이 있으신가요?</p>
            <p style="font-size: 1.3em;color: #999;margin-top: 10px;">이전질문을 검색하고 답변을 찾을 수 있습니다.</p>
           <div class="qnasearch">
            <input type="search" placeholder="검색어를 입력해 주세요." 
           class="qnasearch2" name="qna"
           style="width: 600px;height: 50px;font-size: large;">
           <img src="images/search.png" onclick="send()">
            </div>
            </form>
            <div class="qna3">
                <a href="qna.php"><p>☜ 이전페이지로 돌아가기</p></a>
            </div>
            <table class="qna4">
                <tr>
                    <th>질문 내용</th>
                    <th>답변 내용</th>
                    <th>답변 여부</th>
                </tr>
                <tr>
                    <td>오늘 점심 뭐 먹을까요</td>
                    <td>마라탕~ 짬뽕~ 칼국수~ 육회~</td>
                    <td><span style="color: blue;">답변완료</span></td>
                </tr>
                <tr>
                    <td>노래 좋은거 추천좀 해주세요</td>
                    <td>jeremy zucker - always i'll care, Anson Seabra - Emerald Eyes</td>
                    <td><span style="color: blue;">답변완료</span></td>
                </tr>
                <tr>
                    <td>자신의 장점이 무엇인가요?</td>
                    <td></td>
                    <td><span style="color: red;">답변 대기</span></td>
                </tr>
                <tr>
                    <td>싫어하는 순간은?</td>
                    <td>쩝쩝거리는 사람이랑 밥먹기</td>
                    <td><span style="color: blue;">답변완료</span></td>
                </tr>
                <tr>
                    <td>자신의 단점이 무엇인가요?</td>
                    <td></td>
                    <td><span style="color: red;">답변 대기</span></td>
                </tr>
                <tr>
                    <td>좋아하는 순간은?</td>
                    <td>햇빛 바로 앞 그늘에서 가만히 앉아있는것</td>
                    <td><span style="color: blue;">답변완료</span></td>
                </tr>
                <tr>
                    <td>좋아하는 중국 노래는?</td>
                    <td>李荣浩 模特，许光汉 别再想见我 </td>
                    <td><span style="color: blue;">답변완료</span></td>
                </tr>
                <tr>
                    <td colspan="3"style="height: 50px;border-bottom:none">
                    <input type="button" value="more" class="qna5"></td>
                 </tr>
            </table>
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
        if(qna1.qna.value==""){alert("검색 할 내용을 입력하세요");qna1.qna.focus();return false;}
        document.qna1.submit();
    }
</script>