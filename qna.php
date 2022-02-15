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
        <!-- guest 안의 메뉴 -->
        <div id="content_menu">
            <div class="content_menu_title">
                Guest<br>
                <span style="font-size: 0.8em;color: #eee;"> &#8618; Guest</span>
            </div>
            <ul class="content_menu_list">
                <li onclick="location.href='guest.php'">Guset</li>
                <li onclick="location.href='qna.php'">Q&A</li>
            </ul>
        </div>
        <!-- guest 안의 메뉴 끝-->
        <!-- 본문  -->
        <div id="content_box_wrap">
            <h1 style="text-indent: 50px;">질문과 답변</h1>
            <br>
            <hr>
            <br>
            <!-- qna 시작 -->
            <div id="qna_wrap">
                <table class="qna_table1">
                    <tr>
                        <th>글제목</th>
                        <th>작성자</th>
                        <th>작성일</th>
                    </tr>
                    <?php
                    if(isset($_GET["page"])){
                        $page=$_GET["page"];
                        $group=ceil($page/5);
                    }else{
                        $page=1;
                        $group=1;
                    }
                    $startrow=($page-1)*5;
                    $sql="select * from qna2 order by p_no desc,no asc limit $startrow,5";
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
                                        $space=$row["step"]*3;
                                        for($i=1;$i<=$space;$i++){
                                            echo"&ensp;";
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
                            <td><?php echo $row["writeday"]?></td>
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
                                    $space=$row["step"]*3;
                                    for($i=1;$i<=$space;$i++){
                                        echo"&ensp;";
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
                        <td><?php echo $row["writeday"]?></td>
                    </tr>
                    <?php } //공개글 끝
                        } //while 끝
                    //총 게시물 수
                    $sql2="select count(*) as cnt from qna2";
                    $rs2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_array($rs2);
                    $cnt=$row2["cnt"];
                    //총 페이지 수 
                    $pagecount=ceil($cnt/5);
                    //페이지 그룹화
                    $groupcnt=ceil($pagecount/5);
                    $startpage=($group-1)*5+1;
                    $endpage=$startpage+4;
                    ?>
                    <!-- 페이지 -->
                    <tr>
                        <td colspan="3" style="padding:30px;text-align:center">
                            <?php 
                                if($group>1){
                                    $prev=($group-2)*5+1;
                                    echo"<a href=qna.php?page=$prev>PREV</a>";
                                }    
                                for($i=$startpage;$i<=$endpage;$i++){ 
                                    if($i>$pagecount){break;}
                                    if($i==$page){
                                        echo"
                                            <a style='font-weight:bold;color:red;' href=qna.php?page=$i>
                                                < $i >
                                            </a>
                                            ";
                                    }else{
                            ?>
                                <a href="qna.php?page=<?php echo $i?>">
                                    < <?php echo $i?> >
                                </a>
                            <?php } } 
                                if($group<$groupcnt){
                                    $next=$group*5+1;
                                    echo"<a href=qna.php?page=$next>NEXT</a>";
                                }
                            ?>
                        </td>
                    </tr>
                    <!-- 페이지 끝 -->
                </table>
                <!-- 추가하기 버튼-->
                <?php
                    if(isset($_SESSION["id"])){
                    ?>
                    <div>
                        <input type="button" class="notice_add_bt" value="질문하기" onclick="location.href='qna_write.php'">
                    </div>
                    <?php } ?>
                    <!-- 추가하기 버튼 끝 -->
            </div>
            <!-- qna 끝 -->
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