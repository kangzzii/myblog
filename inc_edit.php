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
                <span style="font-size: 0.8em;color: #eee;"> &#8618; INC</span>
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
            <h1 style="text-indent: 50px;">자료실<span style="font-size:0.5em;color:gray"> - 수정하기</span></h1>
            <br>
            <br>
            <hr>
            <br>
        <!--게시판이 로그인 일때만 보이게 하는 제어문 -->
        <?php if(isset($_SESSION["id"])){ ?>
            <!-- 게시판 수정 테이블 시작 -->
            <form name="frm1" enctype="multipart-form/data" method="post" action="inc_edit_ok.php">
                <?php
                    $no=$_GET["no"];
                    $sql="select * from inc where no=$no";
                    $rs=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($rs);
                ?>
                <table class="notice_table">
                    <input type="hidden" name="no" value="<?php echo $row["no"]?>">
                    <tr>
                        <th>글 제목</th>
                        <td><input type="text" name="title" class="notice_text_bar" value="<?php echo $row ["title"]?>"></td>
                    </tr>
                    <tr>
                        <th>첨부파일</th>
                        <td><input type="file" name="usfile" required></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td>
                            <textarea cols="1000" rows="10" class="notice_textarea" name="content"
                             placeholder="내용을 입력하세요"><?php echo $row ["content"]?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="reset" value="다시 작성" class="notice_reset_bt">
                            <input type="button" onclick="send()" value="작성 완료" class="notice_upload_bt">
                        </td>
                        <!-- 업로드 스크립트 -->
                        <script>
                            function send(){
                                if(frm1.title.value==""){
                                    alert("제목을 입력하세요.");
                                    frm1.title.focus();
                                    return false;
                                }else if(frm1.content.value==""){
                                    alert("내용을 입력하세요.");
                                    frm1.content.focus();
                                    return false;
                                }else{
                                    document.frm1.submit();
                                }
                            }
                        </script>
                        <!-- 업로드 스크립트 끝-->
                    </tr>
                </table>
            </form>
        <?php } else{?>
            <!-- 게시판 수정 테이블 끝 -->
        <!-- 게시판이 로그인 일때만 보이게 하는 제어문 끝-->
        <!-- 비로그인일때 -->
            <div align="center">
                <h1>로그인을 하셔야 글 작성이 가능합니다.</h1>
            </div>
            <?php }?>
        <!-- 비로그인일때 끝-->
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