// $(document).ready(function() {
//     win_w = $(window).width();
// })

// $( window ).resize( function() {
//     win_w = $(window).width();
    
// })

// bottom_btn 버튼 맨위로 가게
$(document).on("click", ".bottom_btn_top", function(){
    $('html,body').animate({scrollTop: 0});
});

// bottom_btn 버튼 맨아래로 가게
$(document).on("click", ".bottom_btn_bottom", function(){
    $("html, body").animate({ scrollTop: $(document).height() });
});