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
            <div id="qna_wrap">
            <?php
                $no=$_GET["no"];
                $sql="select * from qna2 where no=$no";
                $rs=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($rs);
                // 비밀글 일때
                    //비밀글 작성자
                if($row["secret"]=="1"){
                    if(isset($_SESSION["id"])){
                        $p_no=$row["p_no"];
                        $sql2="select * from qna2 where p_no=$p_no order by no asc";
                        $rs2=mysqli_query($conn,$sql2);
                        $row2=mysqli_fetch_array($rs2);
                    if($_SESSION["id"]==$row2["writer"]){
            ?>
                <table class="qna_table">
                    <tr>
                        <td style="text-align:center;background-color:#eee">글제목</td>
                        <td><?php echo $row["title"]?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;background-color:#eee">작성자</td>
                        <td><?php echo $row["writer"]?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;background-color:#eee">작성일</td>
                        <td><?php echo $row["writeday"]?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;background-color:#eee">내용</td>
                        <td>
                            <?php echo nl2br($row["content"])?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <!-- 작성자만 삭제가 보이게 -->
                            <?php if(isset($_SESSION["id"])){ 
                                if($_SESSION["id"]==$row["writer"]){
                            ?>
                            <input type="button" value="삭제" class="qna_reset_bt" onclick="del()">
                            <input type="button" value="수정" class="qna_reset_bt" onclick="edit()">
                            <!-- 수정 삭제 스크립트 -->
                            <script>
                                function del(){
                                    if(confirm("정말로 삭제하시겠습니까?")){
                                        location.href="qna_del_writer.php?no=<?php echo $row["no"]?>"
                                       }
                                    }
                                function edit(){
                                    location.href="qna_edit.php?no=<?php echo $row["no"]?>"
                                    }
                                </script>
                            <!-- 수정 삭제 스크립트 끝-->
                            <?php }?>
                            <!-- 작성자만 삭제가 보이게 끝 -->
                            <!-- 관리자만 답변, 전체삭제가 보이게 -->
                            <?php if($_SESSION["id"]=="admin"){ ?>
                                <input type="button" value="답변" class="qna_bt" 
                                onclick="anser(<?php echo $row["step"]?>,<?php echo $row["p_no"]?>)">
                                <input type="button" value="글 전체 삭제" class="qna_all_del_bt" onclick="alldel()">
                            <?php } }?>
                            <!-- 답변 스크립트 -->
                                <script>
                                    function anser(step,p_no){
                                        location.href="qna_re_write.php?step="+step+"&p_no="+p_no;
                                    }
                                    function alldel(){
                                        if(confirm("정말로 삭제하시겠습니까?답변과 질문 모두 삭제 됩니다.")){
                                            location.href="qna_all_del.php?p_no=<?php echo $row["p_no"]?>"
                                        }
                                    }
                                </script>
                            <!-- 답변 스크립트 끝-->
                            <!-- 관리자만 답변, 전체삭제가 보이게 끝-->
                                <input type="button" value="list" class="qna_back" onclick="location.href='qna.php'">
                        </td>
                    </tr>
                </table>
                <?php }
                //비밀글 관리자
                    else if($_SESSION["id"]=="admin"){ ?>
                <table class="qna_table">
                    <tr>
                        <td style="text-align:center;background-color:#eee">글제목</td>
                        <td><?php echo $row["title"]?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;background-color:#eee">작성자</td>
                        <td><?php echo $row["writer"]?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;background-color:#eee">작성일</td>
                        <td><?php echo $row["writeday"]?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;background-color:#eee">내용</td>
                        <td>
                            <?php echo nl2br($row["content"])?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <!-- 작성자만 삭제가 보이게 -->
                            <?php if(isset($_SESSION["id"])){ 
                                if($_SESSION["id"]==$row["writer"]){
                            ?>  
                            <input type="button" value="삭제" class="qna_reset_bt" onclick="del()">
                            <input type="button" value="수정" class="qna_reset_bt" onclick="edit()">
                                <!-- 수정 삭제 스크립트 -->
                                <script>
                                    function del(){
                                        if(confirm("정말로 삭제하시겠습니까?")){
                                          location.href="qna_admin_del.php?no=<?php echo $row["no"]?>"
                                         }
                                       }
                                    function edit(){
                                        location.href="qna_edit.php?no=<?php echo $row["no"]?>"
                                    }
                                </script>
                                <!-- 수정 삭제 스크립트 끝-->
                            <?php }?>
                            <!-- 작성자만 삭제가 보이게 끝 -->
                            <!-- 관리자만 답변, 전체삭제가 보이게 -->
                            <?php if($_SESSION["id"]=="admin"){ ?>
                                <input type="button" value="답변" class="qna_bt" 
                                onclick="anser(<?php echo $row["step"]?>,<?php echo $row["p_no"]?>)">
                                <input type="button" value="글 전체 삭제" class="qna_all_del_bt" onclick="alldel()">
                            <?php } }?>
                                <!-- 답변 스크립트 -->
                                <script>
                                    function anser(step,p_no){
                                        location.href="qna_re_write.php?step="+step+"&p_no="+p_no;
                                    }
                                    function alldel(){
                                        if(confirm("정말로 삭제하시겠습니까?답변과 질문 모두 삭제 됩니다.")){
                                            location.href="qna_all_del.php?p_no=<?php echo $row["p_no"]?>"
                                        }
                                    }
                                </script>
                                <!-- 답변 스크립트 끝-->
                            <!-- 관리자만 답변, 전체삭제가 보이게 끝-->
                                <input type="button" value="list" class="qna_back" onclick="location.href='qna.php'">
                        </td>
                    </tr>
                </table>
                <?php }else{ ?>
                    <!-- 비공개글 로그인 하고 보려할때 -->
                    <div align="center">
                        <br>
                        <br>
                        <h2>비밀글 입니다.<br>질문자와 관리자만 열람 가능합니다.</h2>
                    </div>
                    <!-- 비공개글 로그인 하고 보려할때 끝 -->
                <?php
                } }
                if(!isset($_SESSION["id"])){
                ?>
                    <!-- 비공개글 비로그인 보려 할때 -->
                    <div align="center">
                        <br>
                        <br>
                        <h2>비밀글 입니다.<br>질문자와 관리자만 열람 가능합니다.</h2>
                    </div>
                    <!-- 비공개글 비 로그인으로 보려 할때 끝 -->
                <?php } } //비밀글 일때 끝?>
                <!-- 공개글 -->
                <?php if($row["secret"]=="0") { ?>
                    <table class="qna_table">
                        <tr>
                            <td style="text-align:center;background-color:#eee">글제목</td>
                            <td><?php echo $row["title"]?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;background-color:#eee">작성자</td>
                            <td><?php echo $row["writer"]?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;background-color:#eee">작성일</td>
                            <td><?php echo $row["writeday"]?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;background-color:#eee">내용</td>
                            <td>
                                <?php echo nl2br($row["content"])?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <!-- 작성자만 삭제가 보이게 -->
                                <?php if(isset($_SESSION["id"])){ 
                                    if($_SESSION["id"]==$row["writer"]){
                                // 공개글 일때 관리자가 작성자 일때
                                        if($row["writer"]=="admin"){
                                ?>
                                    <input type="button" value="삭제" class="qna_reset_bt" onclick="del()">
                                    <input type="button" value="수정" class="qna_reset_bt" onclick="edit()">
                                    <!-- 수정 삭제 스크립트 -->
                                    <script>
                                        function del(){
                                            if(confirm("정말로 삭제하시겠습니까?")){
                                                location.href="qna_admin_del.php?no=<?php echo $row["no"]?>"
                                            }
                                        }
                                        function edit(){
                                            location.href="qna_edit.php?no=<?php echo $row["no"]?>"
                                        }
                                    </script>
                                    <!-- 수정 삭제 스크립트 끝-->
                                <?php 
                                } //공개글 일때 관리자가 작성자 일때 끝
                                else {
                                ?>
                                    <input type="button" value="삭제" class="qna_reset_bt" onclick="del()">
                                    <input type="button" value="수정" class="qna_reset_bt" onclick="edit()">
                                    <!-- 수정 삭제 스크립트 -->
                                    <script>
                                        function del(){
                                            if(confirm("정말로 삭제하시겠습니까?")){
                                                location.href="qna_del_writer.php?no=<?php echo $row["no"]?>"
                                            }
                                        }
                                        function edit(){
                                            location.href="qna_edit.php?no=<?php echo $row["no"]?>"
                                        }
                                    </script>
                                    <!-- 수정 삭제 스크립트 끝-->
                                <?php } }?>
                                <!-- 작성자만 삭제가 보이게 끝 -->
                                <!-- 관리자만 답변, 전체삭제가 보이게 -->
                                <?php if($_SESSION["id"]=="admin"){ ?>
                                    <input type="button" value="답변" class="qna_bt" 
                                    onclick="anser(<?php echo $row["step"]?>,<?php echo $row["p_no"]?>)">
                                    <input type="button" value="글 전체 삭제" class="qna_all_del_bt" onclick="alldel()">
                                <?php } }?>
                                    <!-- 답변 스크립트 -->
                                    <script>
                                        function anser(step,p_no){
                                            location.href="qna_re_write.php?step="+step+"&p_no="+p_no;
                                        }
                                        function alldel(){
                                            if(confirm("정말로 삭제하시겠습니까?답변과 질문 모두 삭제 됩니다.")){
                                                location.href="qna_all_del.php?p_no=<?php echo $row["p_no"]?>"
                                            }
                                        }
                                    </script>
                                    <!-- 답변 스크립트 끝-->
                                <!-- 관리자만 답변, 전체삭제가 보이게 끝-->
                                <input type="button" value="list" class="qna_back" onclick="location.href='qna.php'">
                            </td>
                        </tr>
                    </table>
                <?php 
                }?>
                <!-- 공개글 끝 -->
            </div>
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