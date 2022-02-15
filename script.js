//모바일 게스트
var m_guest=false;
$(".M_guest_edit").click(function(){
    if(m_guest==false){
    $(".guest_writer_edit").css("display","block")
    m_guest=true;
    }else{
    $(".guest_writer_edit").css("display","none")
    m_guest=false;
    }
})
//모바일 메뉴
var m_menu=false;
$("#M_menu_bt").click(function(){
    if(m_menu==false){
        $("#header_right").css("display","block")
        m_menu=true;
    }else{
        $("#header_right").css("display","none")
        m_menu=false;
    }
})
// user_menu
var user=false;
$("#usmenu").click(function(){
    if(user==false){
        $(".user_menu").stop().slideDown();
        user=true;
    }else{
        $(".user_menu").stop().slideUp();
        user=false;
    }
})
//index inc tap
$(".inc_content_tap>li").eq(1).css("display","none")
$(".inc_tap_list>li").click(function(){
    var inx=$(this).index();
    $(".inc_tap_list>li").eq(inx).css("background-color","#abb9ae")
    $(".inc_tap_list>li").eq(inx).css("color","#fff")
    $(".inc_tap_list>li").eq(inx).css("text-shadow","2px 2px 3px #333")
    $(".inc_tap_list>li").eq(inx).siblings().css("background-color","white")
    $(".inc_tap_list>li").eq(inx).siblings().css("color","#333")
    $(".inc_tap_list>li").eq(inx).siblings().css("text-shadow","none")
    $(".inc_content_tap>li").eq(inx).css("display","block")
    $(".inc_content_tap>li").eq(inx).siblings().css("display","none")
    if($("inc_content_tap>li").eq(0).css("display","block")){
        $(".ocean").css("display","block")
    }else{
        $(".ocean").css("display","none")
    }
})
//index-photo
photostart();
function photostart(){
    $(".index_photo_list>li").eq(0).fadeIn()
    $(".index_photo_list>li").eq(0).siblings().fadeOut()
    setInterval(function(){photoslide()},3000)
}
var photonow=0;
var photoimg=4;
function photoslide(){
    if(photoimg==photonow){
        photonow=0;
    }else{
        photonow++;
    }
    if(photonow==1){
        $(".index_photo_list>li").eq(1).fadeIn()
        $(".index_photo_list>li").eq(1).siblings().fadeOut()
    }
    if(photonow==2){
        $(".index_photo_list>li").eq(2).fadeIn()
        $(".index_photo_list>li").eq(2).siblings().fadeOut()
    }
    if(photonow==3){
        $(".index_photo_list>li").eq(3).fadeIn()
        $(".index_photo_list>li").eq(3).siblings().fadeOut()
    }
    if(photonow==4){
        $(".index_photo_list>li").eq(4).fadeIn()
        $(".index_photo_list>li").eq(4).siblings().fadeOut()
    }
    if(photonow==0){
        $(".index_photo_list>li").eq(0).fadeIn()
        $(".index_photo_list>li").eq(0).siblings().fadeOut()
    }
}





//공지사항
notice_start();
var notice_now=0;
var notice_move=4;
function notice_start(){
    $(".index_notice_list>li").eq(0).css("top","0")
    $(".index_notice_list>li").eq(1).css("top","50px")
    $(".index_notice_list>li").eq(1).css("display","block")
    $(".index_notice_list>li").eq(2).css("top","100px")
    $(".index_notice_list>li").eq(3).css("top","150px")
    $(".index_notice_list>li").eq(3).css("display","none")
    $(".index_notice_list>li").eq(4).css("top","-50px")
    setInterval(function(){notice_slide()},5000)
}
function notice_slide(){
    if(notice_move==notice_now){
        notice_now=0;
    }else{
        notice_now++;
    }
    if(notice_now==1){
        $(".index_notice_list>li").eq(1).css("top","0")
        $(".index_notice_list>li").eq(2).css("top","50px")
        $(".index_notice_list>li").eq(2).css("display","block")
        $(".index_notice_list>li").eq(3).css("top","100px")
        $(".index_notice_list>li").eq(4).css("top","150px")
        $(".index_notice_list>li").eq(4).css("display","none")
        $(".index_notice_list>li").eq(0).css("top","-50px")
    }
    if(notice_now==2){
        $(".index_notice_list>li").eq(2).css("top","0")
        $(".index_notice_list>li").eq(3).css("top","50px")
        $(".index_notice_list>li").eq(3).css("display","block")
        $(".index_notice_list>li").eq(4).css("top","100px")
        $(".index_notice_list>li").eq(0).css("top","150px")
        $(".index_notice_list>li").eq(0).css("display","none")
        $(".index_notice_list>li").eq(1).css("top","-50px")
    }
    if(notice_now==3){
        $(".index_notice_list>li").eq(3).css("top","0")
        $(".index_notice_list>li").eq(4).css("top","50px")
        $(".index_notice_list>li").eq(4).css("display","block")
        $(".index_notice_list>li").eq(0).css("top","100px")
        $(".index_notice_list>li").eq(1).css("top","150px")
        $(".index_notice_list>li").eq(1).css("display","none")
        $(".index_notice_list>li").eq(2).css("top","-50px")
    }
    if(notice_now==4){
        $(".index_notice_list>li").eq(4).css("top","0")
        $(".index_notice_list>li").eq(0).css("top","50px")
        $(".index_notice_list>li").eq(0).css("display","block")
        $(".index_notice_list>li").eq(1).css("top","100px")
        $(".index_notice_list>li").eq(2).css("top","150px")
        $(".index_notice_list>li").eq(2).css("display","none")
        $(".index_notice_list>li").eq(3).css("top","-50px")
    }
    if(notice_now==0){
        $(".index_notice_list>li").eq(0).css("top","0")
        $(".index_notice_list>li").eq(1).css("top","50px")
        $(".index_notice_list>li").eq(1).css("display","block")
        $(".index_notice_list>li").eq(2).css("top","100px")
        $(".index_notice_list>li").eq(3).css("top","150px")
        $(".index_notice_list>li").eq(3).css("display","none")
        $(".index_notice_list>li").eq(4).css("top","-50px")
    }
}

//index 게시판 공지사항
$(".board_tap_list>li").click(function(){
    var inx=$(this).index();
    $(".board_tap_list>li").eq(inx).css("background-color","#abb9ae")
    $(".board_tap_list>li").eq(inx).css("color","#fff")
    $(".board_tap_list>li").eq(inx).css("text-shadow","2px 2px 3px #333")
    $(".board_tap_list>li").eq(inx).siblings().css("background-color","white")
    $(".board_tap_list>li").eq(inx).siblings().css("color","#333")
    $(".board_tap_list>li").eq(inx).siblings().css("text-shadow","none")
    $(".board_tap_content>li").eq(inx).css("display","block")
    $(".board_tap_content>li").eq(inx).siblings().css("display","none")
})
// 회원가입 탭
$(".signup_tap_bt").click(function(){
    $(".signup_tap>li").eq(0).hide()
    $(".signup_tap>li").eq(1).css("display","block")
})
$(".signup_tap_bt2").click(function(){
    $(".signup_tap>li").eq(1).hide()
    $(".signup_tap>li").eq(0).css("display","block")
})
// about me 메뉴바 
$(".content_menu_black>li").mouseover(function(){
    $(this).css("background-color","rgba(0,0,0,0)")
    $(this).siblings().css("background-color","rgba(0,0,0,0.6)")
})
//포토폴리오
$(".portfolio_list>li").mouseover(function(){
    $(this).children(".portfolio_more").stop().fadeIn();
})
$(".portfolio_list>li").mouseleave(function(){
    $(".portfolio_more").stop().css("display","none")
})
