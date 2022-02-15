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
                <span style="font-size: 0.8em;color: #eee;"> &#8618; Board</span>
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
            <h1 style="text-indent: 50px;">자유게시판</h1>
            <br>
            <br>
            <hr>
            <br>
        <!-- 게시판 컨텐츠 테이블 시작 -->
            <form name="frm1" method="post" action="notice_write_ok.php">
                <?php
                    $no=$_GET["no"];
                    $sql="update board set hit=hit+1 where no=$no";
                    $rs=mysqli_query($conn,$sql);
                    $sql="select * from board where no=$no ";
                    $rs=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($rs);
                ?>
                <table class="notice_table">
                    <tr>
                        <th>글 제목</th>
                        <td style="font-weight:bold"><?php echo $row["title"]?></td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td style="font-size:0.8em;color:gray"><?php echo $row["writer"]?></td>
                    </tr>
                    <tr>
                        <th>작성일</th>
                        <td style="font-size:0.8em;color:gray"><?php echo $row["writeday"]?></td>
                    </tr>
                    <tr>
                        <th>조회수</th>
                        <td style="font-size:0.8em;color:gray"><?php echo $row["hit"]?></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td style="font-weight:bold"><?php echo nl2br($row["content"])?></td>
                    </tr>
                    <tr style="border-bottom:none">
                        <td colspan="2">
                            <input type="button" onclick="location.href='board.php'" value="돌아가기" class="notice_upload_bt">
                            <!-- 수정 삭제는 작성자만 -->
                            <?php if(isset($_SESSION["id"])){
                                    if($_SESSION["id"]==$row["writer"]){
                            ?>
                            <input type="button" value="삭제" onclick="del_notice()" class="notice_reset_bt">
                            <input type="button" onclick="location.href='board_edit.php?no=<?php echo $no?>'" value="수정" class="notice_upload_bt">
                            <!-- 수정 삭제는 작성자만 끝 -->
                            <!-- 삭제는 관리자만 -->
                            <?php } else if($_SESSION["id"]=="admin"){?>
                            <input type="button" value="삭제" onclick="del_notice()" class="notice_reset_bt">
                            <?php } } ?>
                            <!-- 삭제는 관리자만 끝 -->
                        </td>
                    </tr>
                    <!-- 삭제 스크립트 -->
                    <script>
                        function del_notice(){
                            if(confirm("정말로 삭제하시겠습니까?")){
                                location.href="board_del.php?no=<?php echo $no?>"
                            }
                        }
                    </script>
                    <!-- 삭제 스크립트 끝 -->
                </table>
            </form>
        <!-- 게시판 추가 테이블 끝 -->
            <!-- 댓글 달기  -->
            <div class="board_re_box">
                <h3>댓글 쓰기</h3>
                <form name="frm_re" style="margin-top:20px">
                    <input type="text" name="memo" placeholder="댓글을 입력하세요" class="board_re_text_bar">
                    <input type="button" value="등록" class="add_re_bt" onclick="board_re()">
                </form>
                <!-- 댓글 내용 -->
                <?php
                $sql2="select * from board_re where p_no=$no";
                $rs2=mysqli_query($conn,$sql2);
                while($row2=mysqli_fetch_array($rs2)){ ?>
                <div class="board_re_content">
                    <div class="board_re_us">
                        <?php echo $row2["writer"]?> &emsp; <span style="color:gray;font-size:0.8em"><?php echo $row2["writeday"]?><span>
                    </div>
                    <?php echo $row2["memo"]?>
                </div>
                <?php } ?>
                <!-- 댓글 내용 끝 -->
                <!-- 댓글쓰기 스크립트 -->
                <script>
                    function board_re(){
                        if(frm_re.memo.value==""){
                            alert("댓글을 입력하세요.");
                            frm_re.memo.focus();return false;
                        }else{
                            location.href="board_re_write_ok.php?memo="+frm_re.memo.value+"&p_no=<?php echo $row["no"]?>";
                        }
                    }
                </script>
                <!-- 댓글쓰기 스크립트 끝 -->
            </div>
            <!-- 댓글 달기 끝 -->
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