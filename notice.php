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
            <!-- 공지사항 추가 버튼 -->
            <?php
            if(isset($_SESSION["id"])){
                if($_SESSION["id"]=="admin"){
            ?>
            <div class="notice_add_bt" onclick="location.href='add_notice.php'">공지사항 추가하기</div>
            <?php } }?>
            <!-- 공지사항 추가 버튼 끝 -->
            <br>
            <hr>
            <br>
            <!-- 공지사항 검색 -->
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
                            location.href="notice_search.php?opt="+searchfrm.search_select.value+"&keyword="+searchfrm.keyword.value;
                        }
                    }
                </script>
                <!-- 검색하기 스크립트 끝 -->
            </div>
            <!-- 공지사항 검색 끝 -->
            <!-- 공지사항 테이블 시작 -->
            <table class="notice_table1">
                <tr>
                    <th>글 번호</th>
                    <th>글 제목</th>
                    <th>작성일</th>
                    <th>조회수</th>
                </tr>
                <!-- notice sql 시작 -->
                <?php
                if(isset($_GET["page"])){
                    $page=$_GET["page"];
                    $group=ceil($page/5);
                }else{
                    $page=1;
                    $group=1;
                };
                $startrow=($page-1)*10;
                $sql="select * from notice order by no desc limit $startrow,10";
                $rs=mysqli_query($conn,$sql);
                $all_sql="select count(*) as cnt from notice";
                $all_rs=mysqli_query($conn,$all_sql);
                $all_row=mysqli_fetch_array($all_rs);
                $cnt=$all_row["cnt"];
                // echo $cnt;   $cnt는 전체 공지사항의 갯수
                $pagecount=ceil($cnt/10);
                // echo $pagecount; $pagecount 는 페이지 총 갯수
                
                while($row=mysqli_fetch_array($rs)){
                ?>
                <tr>
                    <td><a href="notice_content.php?no=<?php echo $row["no"]?>"><?php echo $row["no"]?></a></td>
                    <td><a href="notice_content.php?no=<?php echo $row["no"]?>"><?php echo $row["title"]?></a></td>
                    <td><?php echo $row["writeday"]?></td>
                    <td><?php echo $row["hit"]?></td>
                </tr>
                <?php }?>
                <!-- notice sql 시작 끝-->
                <!-- 페이지 -->
                <tr>
                    <td colspan="4">
                    <?php
                    if($group>1){
                        $prevpage=($group-2)*5+1;
                        echo "<a href='notice.php?page=$prevpage'>이 전</a> &nbsp;";
                    }
                    $pagegroup=ceil($pagecount/5);//한페이지당 5개가 나오게 할꺼고 그 페이지 그룹의 갯수
                    $startpage=($group-1)*5+1;
                    $endpage=$startpage+4;
                    for($i=$startpage;$i<=$endpage;$i++){
                        if($i>$pagecount){break;}
                        if($i==$page){
                            echo  "<a href='notice.php?page=$i'style='font-weight:bold;'> < <font color='red'>$i</font> > </a>";
                        }else{
                    ?>
                        <a href="notice.php?page=<?php echo $i?>">
                            < <?php echo $i?> >
                        </a>
                    <?php } }
                        if($group<$pagegroup){
                            $nextpage=$group*5+1;
                            echo "<a href='notice.php?page=$nextpage'>&nbsp;다 음</a>";
                        }
                    ?>
                    </td>
                </tr>
                <!-- 페이지 끝 -->
            </table>
            <!-- 공지사항 테이블 끝 -->
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