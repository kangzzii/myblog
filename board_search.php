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
        <!-- board 안의 메뉴 -->
        <div id="content_menu">
            <div class="content_menu_title">
                Board<br>
                <span style="font-size: 0.8em;color: #eee;"> &#8618; Notice</span>
            </div>
            <ul class="content_menu_list">
                <li onclick="location.href='board.php'">Board</li>
                <li onclick="location.href='notice.php'">Notice</li>
                <li onclick="location.href='inc.php'">INC</li>
            </ul>
        </div>
        <!-- board 안의 메뉴 끝-->
        <!-- 본문  -->
        <div id="content_box_wrap">
            <h1 style="text-indent: 50px;">공지 사항</h1>
            <br>
            <hr>
            <br>
            <!-- 게시판 검색 -->
            <div class="notice_search">
                <form name="searchfrm">
                    <select name="search_select" class="search_select"> 
                        <option value="title">제목</option>
                        <option value="writer">작성자</option>
                        <option value="content">내용</option>
                        <option value="all">제목+내용</option>
                    </select>
                    <input type="text" name="keyword" class="notice_search_bar" placeholder="검색어를 입력하세요">
                    <input type="button" value="검색" class="notice_search_bt" onclick="search()">
                </form>
                <!-- 검색하기 스크립트  -->
                <script>
                    function search(){
                        if(searchfrm.keyword.value==""){
                            alert("검색어를 입력하세요")
                        }else{
                            location.href="board_search.php?opt="+searchfrm.search_select.value+"&keyword="+searchfrm.keyword.value;
                        }
                    }
                </script>
                <!-- 검색하기 스크립트 끝 -->
            </div>
            <!-- 게시판 검색 끝 -->
            <!-- 게시판 검색 테이블 시작 -->
            <table class="notice_table">
                <tr>
                    <th>글 번호</th>
                    <th>글 제목</th>
                    <th>작성일</th>
                    <th>조회수</th>
                </tr>
                <!-- 게시판 검색 컨텐츠 -->
                <?php
                $keyword=$_GET["keyword"];
                $opt=$_GET["opt"];
                if($opt=="title"){
                    $sql="select * from board where title like '%$keyword%'";
                } else if($opt=="writer"){
                    $sql="select * from board where writer like '%$keyword%'";
                }else if($opt=="content"){
                    $sql="select * from board where content like '%$keyword%'";
                }else if($opt=="all"){
                    $sql="select * from board where title like '%$keyword%' union select * from board where content like '%$keyword%'";
                };
                $rs=mysqli_query($conn,$sql);
                $total=mysqli_num_rows($rs);
                while($row=mysqli_fetch_array($rs)){
                ?>
                <tr>
                    <td><a href="board_content.php?no=<?php echo $row["no"]?>"><?php echo $row["no"]?></a></td>
                    <td><a href="board_content.php?no=<?php echo $row["no"]?>"><?php echo $row["title"]?></a></td>
                    <td><?php echo $row["writeday"]?></td>
                    <td><?php echo $row["hit"]?></td>
                </tr>
                <?php }?>
                <!-- 게시판 검색 컨텐츠 -->
            </table>
            <div align="center">
                <?php
                if($total==0){
                    echo "검색결과가 없습니다.";
                }else{
                ?>
                총 <span style="color:crimson;font-weight:bold">
                    <?php echo $total?>
                </span>
                건의 데이터가 검색되었습니다.
                <?php }?>
            </div>
            <!-- 게시판 검색 테이블 끝 -->
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