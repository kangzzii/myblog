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
            <h1 style="text-indent: 50px;">방명록</h1>
            <br>
            <hr>
            <br>
            <!-- 방명록 시작 -->
            <form method="POST" name="frm1">
                <!-- 원글 시작 -->
                <div id="guest_write">
                    <h3>방명록 작성하기</h3><br>
                    <div class="guest_writer">
                        <?php if(isset($_SESSION["id"])){
                        echo $_SESSION["id"]; }?>
                    </div>
                    <textarea name="memo" placeholder="방명록 내용을 입력해 주세요." cols="300" row="7" class="guest_write_textarea"></textarea>
                    <!-- 로그인 해야만 작성 가능 -->
                    <?php if(isset($_SESSION["id"])){ ?>
                        <input type="button" value="등록" class="guest_write_bt" onclick="guest_write()">
                    <?php }?>
                    <!-- 로그인 해야만 작성 가능 끝-->
                </div>
                    <!-- 작성된 원글  -->
                    <?php
                    if(isset($_GET["page"])){
                        $page=$_GET["page"];
                    }else{
                        $page=1;
                    }
                    $start=($page-1)*5;
                    $sql="select * from guest order by no desc limit $start,5";
                    $rs=mysqli_query($conn,$sql);
                    $i=0;
                    while($row=mysqli_fetch_array($rs)){
                        $i++;
                    ?>
                    <div id="guest_write" style="margin-top:10px">
                        <ul class="guest_writer2">
                            <li><?php echo $row["writer"]?></li>
                            <li><?php echo $row["writeday"]?></li>
                            <!-- 작성자는 수정 할 수 있게 -->
                            <li>
                                <?php echo $row["memo"]?>
                                <?php if(isset($_SESSION["id"])){
                                        if($_SESSION["id"]==$row["writer"]){
                                ?>
                                <div class="M_guest_edit"></div>
                                <ul class="guest_writer_edit">
                                    <li onclick="guest_del(<?php echo $row["no"]?>)">삭제</li>
                                </ul>
                                <?php } } ?>
                            </li>
                            <!-- 작성자는 수정할 수 있게 끝 -->
                        <?php if(isset($_SESSION["id"])){ ?>
                            <li><a href="javascript:send('redata<?php echo $i?>',<?php echo $row["no"]?>,<?php echo $page?>)"> 답 변</a></li>
                        <?php } ?>
                        </ul>
                        <!-- 원글의 답변 -->
                        <?php
                        $no=$row["no"];
                        $sql2="select * from guest_re where p_no=$no";
                        $rs2=mysqli_query($conn,$sql2);
                        while($row2=mysqli_fetch_array($rs2)){
                        ?>
                        <ul class="guest_re" style="margin-top:10px">
                            <li>└</li>
                            <li><?php echo $row2["writer"]?></li>
                            <li><?php echo $row2["memo"]?></li>
                            <!-- 답변글 작성자는 삭제 할 수 있게 -->
                            <?php   if(isset($_SESSION["id"])){ 
                                if($row2["writer"]==$_SESSION["id"]){ ?>
                                <div class="M_guest_edit"></div>
                                <ul class="guest_writer_edit">
                                    <li onclick="guest_re_del(<?php echo $row2["no"]?>)">삭제</li>
                                </ul>
                            <?php } }?>
                            <!-- 답변글 작성자는 삭제 할 수 있게 -->
                        </ul>
                        <?php }?>
                        <!-- 원글의 답변 끝 -->
                        <!-- 로그인이 되어 있어야  -->
                        <div id="redata<?php echo $i?>" style="text-align:center;margin-top:10px;padding-left:20px"></div>
                    </div>
                    <?php }?>
                    <!-- 작성된 원글 끝 -->
                    <!-- 원글 끝 -->
                    <!-- 페이지 작업 -->
                    <div id="guest_page">
                        <?php
                            $sql3="select count(*) as cnt from guest";
                            $rs3=mysqli_query($conn,$sql3);
                            $row3=mysqli_fetch_array($rs3);
                            $pagecount=ceil($row3["cnt"]/5);
                            for($i=1;$i<=$pagecount;$i++){
                        ?>
                            <a href="guest.php?page=<?php echo $i?>">
                            <  <?php echo $i?> >
                            </a>
                        <?php } ?>
                    </div>
                    <!-- 페이지 작업 끝 -->
            </form>
            <!-- 방명록 끝 -->
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
<script>
    function guest_write(){
        if(frm1.memo.value==""){
            alert("내용을 입력하세요");
            frm1.memo.focus(); return false;
        }
        document.frm1.action="guest_write_ok.php";
        document.frm1.submit();

    }
    function guest_del(no){
        if(confirm("정말로 삭제하시겠습니까?")){
        location.href="guest_re_del.php?no="+no;}
    }
    function guest_re_del(no){
        if(confirm("정말로 삭제하시겠습니까?")){
        location.href="guest_re_del2.php?no="+no;
        }
    }
    function send(p,p_no,page){
        if(document.getElementById("redata1")){
        document.getElementById("redata1").innerHTML="";
        }
        if(document.getElementById("redata2")){
            document.getElementById("redata2").innerHTML="";
        }
        if(document.getElementById("redata3")){
            document.getElementById("redata3").innerHTML="";
        }
        if(document.getElementById("redata4")){
        document.getElementById("redata4").innerHTML="";
        }
        if(document.getElementById("redata5")){
            document.getElementById("redata5").innerHTML="";
        }
    document.getElementById(p).innerHTML="<input type='text' name='re' class='re_text_bar'><input type='hidden' name='p_no' value='"+p_no+"'> <input type='hidden' name='page' value='"+page+"'> <input type='button' value='답변' class='re_ok_bt' onclick='resend()'><input type='button' value='닫기' class='re_close_bt' onclick='reclose()'>";
    }
    function reclose(){
        if(document.getElementById("redata1")){
            document.getElementById("redata1").innerHTML="";
        }
        if(document.getElementById("redata2")){
            document.getElementById("redata2").innerHTML="";
        }
        if(document.getElementById("redata3")){
            document.getElementById("redata3").innerHTML="";
        }
        if(document.getElementById("redata4")){
            document.getElementById("redata4").innerHTML="";
        }
        if(document.getElementById("redata5")){
            document.getElementById("redata5").innerHTML="";
        }
    }
    function resend(){
        if(frm1.re.value==""){
            alert("내용을 입력하세요.");
            frm1.re.focus();
            return false;
        }else{
            document.frm1.action="guest_re_ok.php";
            document.frm1.submit();
        }
    }
</script>