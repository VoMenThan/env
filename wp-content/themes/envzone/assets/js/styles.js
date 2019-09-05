(function($) {
    $(window).on("load", function() {
        $(".content-scroll").mCustomScrollbar({ theme: "3d" });
    });

    /*$( window ).load(function() {
        /!*  [ Page loader ]
        - - - - - - - - - - - - - - - - - - - - *!/
        $( 'body' ).addClass( 'loaded' );
        setTimeout(function () {
            $('#pageloader').fadeOut();
        }, 100);
    });*/
})(jQuery);


/*============ set get erase Cookie =================*/
function setCookie(name,value,hours) {
    var expires = "";
    if (hours) {
        var date = new Date();
        date.setTime(date.getTime() + (hours*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    document.cookie = name+"= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
}
/*============ set get erase Cookie end=================*/


/*============ end custom scroll =================*/


function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top_menu = $('#sticky-menu-anchor').offset().top;

    if (window_top >= div_top_menu) {
        $('#sticky-menu').addClass('stick');
    }
    else if(window_top < (div_top_menu + 120)){
        $('#sticky-menu').removeClass('stick');
    }
};

function toggle_obj(btn_click, box_toggle) {

    $(btn_click).click(function () {

        $(box_toggle).toggleClass("show-obj");
        $(btn_click).toggleClass("active");

        if (btn_click == ".btn-toggle-menu"){
            $("body").toggleClass("overflow-hidden");
            $(".btn-toggle-search").toggleClass("d-none");

        }
        $('.input-search').focus();
        $('body').toggleClass('overflow-hidden');

    });
}

function get_attr(){
    $(".item-menu").click(function () {
        var val = $(this).text();
        $(".logo-envzone-mobile").addClass("d-hidden");
        $("nav .title-category").addClass("active").text(val);
        $("nav .btn-hide-submenu").addClass("active");
    });
}

function get_attr_sub(){
    $(".title-submenu").click(function () {
        var val = $(this).text();
        $("nav .title-category").addClass("active").text(val);
        $("nav .btn-hide-submenu .hide-subsub").addClass("active");
    });
}

function select_next_element(){
    $(".nav-link").click(function () {
        $(this).next().addClass("show-submenu");
    });

    $(".btn-hide-submenu").click(function () {
        $(".sub-menu").removeClass("show-submenu");
        $(".logo-envzone-mobile").removeClass("d-hidden");
        $("nav .title-category").removeClass("active");
        $("nav .btn-hide-submenu").removeClass("active");
    });

    //CLOSE MENU MOBILE

    $(".close-menu-mb").click(function () {
        $(".sub-menu").removeClass("show-submenu");
        $(".logo-envzone-mobile").removeClass("d-hidden");
        $("nav .title-category").removeClass("active");
        $("nav .btn-hide-submenu").removeClass("active");
    });

}

function select_next_element_sub(){
    $(".title-submenu").click(function () {
        $(this).next().addClass("show-submenu");
    });
    $(".hide-subsub").click(function () {
        $(".subsub-menu").removeClass("show-submenu");
        $("nav .btn-hide-submenu .hide-subsub").removeClass("active");
    });
}

function changeTextBtnHead() {
    $(".sub-menu-company #gform_submit_button_1").val('SEND MY GREETINGS');
    $(".sub-menu-discovery #gform_submit_button_3").val('KEEP ME UPDATED');
    $("header .box-check-avaibility #gform_submit_button_3").val('SUBSCRIBE NOW');
}

$(function () {
    toggle_obj(".btn-toggle-search", "#detailBoxSearch");
    toggle_obj(".btn-search-pc", "#detailBoxSearch");
    get_attr();
    select_next_element();
    changeTextBtnHead();

    get_attr_sub();
    select_next_element_sub();
});

$(function () {

    $(".btn-toggle-menu").click(function (e) {

        $("#menuBarMobile").toggleClass("show-obj");
        $(".btn-toggle-menu").toggleClass("active");

        $("body").toggleClass("overflow-hidden");
        $("html").toggleClass("overflow-hidden");
        $(".btn-toggle-search").toggleClass("d-none");

        e.preventDefault();

    });
});

$(document).ready(function(){

    $('body').mouseleave(function(){
        var cookie = getCookie('cookie-advert');
        if (cookie !== 'true'){
            $('#modal-advert').modal('show');
            setCookie('cookie-advert', true, 1);
        }
    });

    function makeSurvey(){
        var cookie = getCookie('cookie-survey');
        if (cookie !== 'true'){
            $('#popup-satisfaction-survey').addClass('show');
            setCookie('cookie-survey', true, 240);
        }
    };

    setInterval(makeSurvey, 180000);


    $(".book-advert .form-subscribe #gform_submit_button_3").val('SUBSCRIBE NOW');

    $('#close-survey-form').click(function () {
        $('#popup-satisfaction-survey').removeClass('show');
    });

    $('input[id="input_2_7"]').change(function(e){
        var fileName = e.target.files[0].name;
        $("#field_2_7 label").html(fileName);
    });

    $('.menu-bar-hamburger').click(function () {
        $('#hamburger-menu').modal('show');
    });
    $('#hamburger-menu .have-submenu').hover(function () {
        $('#hamburger-menu .have-submenu').removeClass('active');
        $('.main-menu-hamburger .box-content').addClass('d-none');
        $(this).addClass('active');
        var hamburger = $(this).data('hamburger');
        $('.'+hamburger).removeClass('d-none');

    });
    $('.nav-small-business a.active').click(function () {
        $('.nav-small-business a').toggleClass('d-inline-block');
    });
});