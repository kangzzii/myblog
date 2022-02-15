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
    <!-- 본문 시작 -->
    <div id="member_edit_wrap">
        <div id="member_edit_title">
            <div class="member_edit_ani">
                <img src="img/sheji.png">
            </div> 
            회원 정보 수정
            <br>
            <p>안녕하세요. 어서오세요. 감사합니다.</p>
        </div>
        <!-- 회원 정보 수정 컨텐츠 -->
        <div id="member_edit_content">
            <!-- 회원정보 sql -->
            <?php
            $usid=$_SESSION["id"];
            $sql="select * from myblog_admin where usid='$usid'";
            $rs=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($rs);
            ?>
            <!-- 회원정보 sql 끝 -->
            <form name="frm1" method="post" action="member_edit_ok.php">
                <table class="member_edit_table">
                    <!-- 아이디 -->
                    <tr>
                        <td>
                            <div class="login_box">
                                <div class="login_text">ID</div>
                                <input type="text" name="usid" class="login_bar" readonly value="<?php echo $row["usid"]?>">
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <!-- 이름 이메일 -->
                    <tr>
                        <td>
                            <div class="login_box">
                                <div class="login_text">이름</div>
                                <input type="text" name="usname" class="login_bar" required value="<?php echo $row["usname"]?>">
                            </div>
                        </td>
                        <td>
                            <div class="login_box">
                                <div class="login_text">E-mail</div>
                                <input type="text" name="usemail" class="login_bar" required value="<?php echo $row["usemail"]?>">
                            </div>
                        </td>
                    </tr>
                    <!-- 비밀번호 확인 -->
                    <tr>
                        <td>
                            <div class="login_box">
                                <div class="login_text">Password</div>
                                <input type="password" name="uspw1" class="login_bar" required placeholder="비밀번호를 입력하세요.">
                            </div>
                        </td>
                        <td>
                            <div class="login_box">
                                <div class="login_text">Password</div>
                                <input type="password" name="uspw2" class="login_bar" required placeholder="비밀번호를 입력하세요.">
                            </div>
                        </td>
                    </tr>
                    <!-- 비밀번호 확인 버튼 -->
                    <tr>
                        <td colspan="2">
                            <div class="member_edit_bt" onclick="pwcheck()">비밀번호 재확인</div>
                            <input type="hidden" name="pwok">
                        </td>
                        <!-- 비밀번호 확인 스크립트 -->
                        <script>
                            function pwcheck(){
                                if(frm1.uspw1.value==""){
                                    alert("비밀번호를 입력하세요");
                                    frm1.uspw1.focus();return false;
                                }
                                if(frm1.uspw2.value==""){
                                    alert("한번더 비밀번호를 입력하세요");
                                    frm1.uspw2.focus();return false;
                                }
                                if(frm1.uspw1.value!=frm1.uspw2.value){
                                    alert("비밀번호가 같지 않습니다.");
                                    frm1.uspw2.focus();return false;
                                }else{
                                    alert("비밀번호 중복 확인이 완료 되었습니다.")
                                    frm1.pwok.value="ok";
                                    return false;
                                }
                            }
                        </script>
                        <!-- 비밀번호 확인 스크립트 끝-->
                    </tr>
                    <!-- 생일 성별 -->
                    <tr>
                        <td>
                            <div class="login_box">
                                <div class="login_text">생일</div>
                                <input type="date" name="usbd" value="<?php echo $row["usbd"]?>" required class="signup_date">
                            </div>
                        </td>
                        <td>
                            <div class="login_box">
                                <div class="login_text">성별</div>
                                <div class="signup_gender">
                                    <input type="radio" value="남성" required name="gender" <?php if($row["gender"=="남성"]){?>checked<?php }?>>남성
                                    <input type="radio" value="여성" required name="gender" <?php if($row["gender"=="여성"]){?>checked<?php }?>>여성
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- 학력 취미 -->
                    <tr>
                        <td>
                            <div class="login_box">
                                <div class="login_text">학력<span style="font-size:small">(선택)</span></div>
                                <select name="grade" class="signup_grade">
                                    <option value="초졸" <?php if($row["grade"=="초졸"]){?> selected <?php }?>>초졸</option>
                                    <option value="중졸" <?php if($row["grade"=="중졸"]){?> selected <?php }?>>중졸</option>
                                    <option value="고졸" <?php if($row["grade"=="고졸"]){?> selected <?php }?>>고졸</option>
                                    <option value="대졸"  <?php if($row["grade"=="대졸"]){?> selected <?php }?>>대졸</option>
                                    <option value="대학원졸"  <?php if($row["grade"=="대학원졸"]){?> selected <?php }?>>대학원졸</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <!-- 체크박스 sql문 -->
                            <?php
                                $hobby=explode("/",$row["hobby"]);
                                $cnt=count($hobby)-1;
                            ?>
                            <!-- 체크박스 sql문 끝-->
                            <div class="login_box">
                                <div class="login_text">취미<span style="font-size:small">(선택)</span></div>
                                <div class="signup_hobby">
                                    <input type="checkbox" name="hobby[]" <?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="낚시"){?>checked<?php } }?> value="낚시">낚시&ensp;
                                    <input type="checkbox" name="hobby[]"<?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="운동"){?>checked<?php } }?>  value="운동">운동&ensp;
                                    <input type="checkbox" name="hobby[]"<?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="등산"){?>checked<?php } }?>  value="등산">등산&ensp;
                                    <input type="checkbox" name="hobby[]"<?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="영화보기"){?>checked<?php } }?>  value="영화보기">영화보기&ensp;
                                    <input type="checkbox" name="hobby[]"<?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="음악감상"){?>checked<?php } }?>  value="음악감상">음악감상&ensp;
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- 남기는 말 -->
                    <tr>
                        <td colspan="2">
                            <div class="login_box" style="height: 140px;width:1030px">
                                <div class="login_text" style="width: 200px;">남기는말<span style="font-size:small">(선택)</span></div>
                                <textarea cols="1000" rows="10" name="memo"style="width:900px" class="signup_memo">
                                    <?php echo nl2br($row["memo"])?>
                                </textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- 리셋 수정하기 버튼  -->
                    <tr>
                        <td colspan="2">
                            <input type="reset" value="다시작성" class="signup_bt" style="background-color: crimson;float: left;">
                            <input type="button" value="수정하기" class="signup_bt" onclick="edit_ok()" style="float: right;">
                        </td>
                        <!-- 회원 수정 버튼 스크립트 -->
                        <script>
                            function edit_ok(){
                                if(frm1.pwok.value==""){
                                    alert("비밀번호 중복체크를 해주세요")    
                                }else{
                                    document.frm1.submit();
                                }
                            }
                        </script>
                        <!-- 회원 수정 버튼 스크립트 끝 -->
                    </tr>
                </table>
            </form>
            <form name="frm2" method="post" action="member_edit_ok.php">
                <!-- 모바일용 수정 테이블 -->
                <ul class="M_edit_table">
                    <li>
                        <div class="login_box">
                            <div class="login_text">ID</div>
                            <input type="text" name="usid" class="login_bar" readonly value="<?php echo $row["usid"]?>">
                        </div>
                    </li>
                    <li>
                        <div class="login_box">
                           <div class="login_text">이름</div>
                            <input type="text" name="usname" class="login_bar" required value="<?php echo $row["usname"]?>">
                        </div>
                    </li>
                    <li>
                        <div class="login_box">
                            <div class="login_text">E-mail</div>
                            <input type="text" name="usemail" class="login_bar" required value="<?php echo $row["usemail"]?>">
                        </div>
                    </li>
                    <li>
                        <div class="login_box">
                            <div class="login_text">Password</div>
                            <input type="password" name="uspw1" class="login_bar" required placeholder="비밀번호를 입력하세요.">
                        </div>
                    </li>
                    <li>
                        <div class="login_box">
                            <div class="login_text">Password</div>
                            <input type="password" name="uspw2" class="login_bar" required placeholder="비밀번호를 입력하세요.">
                        </div>
                    </li>
                    <li>
                        <div class="member_edit_bt" onclick="pwcheck()">비밀번호 재확인</div>
                        <input type="hidden" name="pwok">
                        <!-- 비밀번호 확인 스크립트 -->
                        <script>
                            function pwcheck(){
                                if(frm2.uspw1.value==""){
                                    alert("비밀번호를 입력하세요");
                                    frm2.uspw1.focus();return false;
                                }
                                if(frm2.uspw2.value==""){
                                    alert("한번더 비밀번호를 입력하세요");
                                    frm2.uspw2.focus();return false;
                                }
                                if(frm2.uspw1.value!=frm2.uspw2.value){
                                    alert("비밀번호가 같지 않습니다.");
                                    frm2.uspw2.focus();return false;
                                }else{
                                    alert("비밀번호 중복 확인이 완료 되었습니다.")
                                    frm2.pwok.value="ok";
                                    return false;
                                }
                            }
                        </script>
                        <!-- 비밀번호 확인 스크립트 끝-->
                    </li>
                    <li>
                        <div class="login_box">
                            <div class="login_text">생일</div>
                            <input type="date" name="usbd" value="<?php echo $row["usbd"]?>" required class="signup_date">
                        </div>
                    </li>
                    <li>
                        <div class="login_box">
                            <div class="login_text">성별</div>
                            <div class="signup_gender">
                                <input type="radio" value="남성" required name="gender" <?php if($row["gender"=="남성"]){?>checked<?php }?>>남성
                                <input type="radio" value="여성" required name="gender" <?php if($row["gender"=="여성"]){?>checked<?php }?>>여성
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="login_box">
                            <div class="login_text">학력<span style="font-size:small">(선택)</span></div>
                            <select name="grade" class="signup_grade">
                                <option value="초졸" <?php if($row["grade"=="초졸"]){?> selected <?php }?>>초졸</option>
                                <option value="중졸" <?php if($row["grade"=="중졸"]){?> selected <?php }?>>중졸</option>
                                <option value="고졸" <?php if($row["grade"=="고졸"]){?> selected <?php }?>>고졸</option>
                                <option value="대졸"  <?php if($row["grade"=="대졸"]){?> selected <?php }?>>대졸</option>
                                <option value="대학원졸"  <?php if($row["grade"=="대학원졸"]){?> selected <?php }?>>대학원졸</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <!-- 체크박스 sql문 -->
                        <?php
                                $hobby=explode("/",$row["hobby"]);
                                $cnt=count($hobby)-1;
                            ?>
                            <!-- 체크박스 sql문 끝-->
                            <div class="login_box">
                                <div class="login_text">취미<span style="font-size:small">(선택)</span></div>
                                <div class="signup_hobby">
                                    <input type="checkbox" name="hobby[]" <?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="낚시"){?>checked<?php } }?> value="낚시">낚시&ensp;
                                    <input type="checkbox" name="hobby[]"<?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="운동"){?>checked<?php } }?>  value="운동">운동&ensp;
                                    <input type="checkbox" name="hobby[]"<?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="등산"){?>checked<?php } }?>  value="등산">등산&ensp;
                                    <input type="checkbox" name="hobby[]"<?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="영화보기"){?>checked<?php } }?>  value="영화보기">영화보기&ensp;
                                    <input type="checkbox" name="hobby[]"<?php for($i=0;$i<$cnt;$i++){if($hobby[$i]=="음악감상"){?>checked<?php } }?>  value="음악감상">음악감상&ensp;
                                </div>
                            </div>
                    </li>
                    <li>
                        <div class="login_box" style="height: 140px;width:80%">
                            <div class="login_text" style="width: 200px;">남기는말<span style="font-size:small">(선택)</span></div>
                            <textarea cols="1000" rows="10" name="memo"style="width:80%" class="signup_memo">
                                <?php echo nl2br($row["memo"])?>
                            </textarea>
                        </div>
                    </li>
                    <li>
                        <input type="reset" value="다시작성" class="signup_bt" style="background-color: crimson;float: left;">
                        <input type="button" value="수정하기" class="signup_bt" onclick="edit_ok()" style="float: right;">
                        <!-- 회원 수정 버튼 스크립트 -->
                        <script>
                            function edit_ok(){
                                if(frm2.pwok.value==""){
                                    alert("비밀번호 중복체크를 해주세요")    
                                }else{
                                    document.frm2.submit();
                                }
                            }
                        </script>
                        <!-- 회원 수정 버튼 스크립트 끝 -->    
                    </li>
                </ul>
                <!-- 모바일용 수정 테이블 -->
            </form>
        </div>
        <!-- 회원 정보 수정 컨텐츠 끝 -->
    </div>
    <!-- 본문 끝 -->
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