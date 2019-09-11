$(document).ready(function() {

    /*slider product detail*/
    $(".carousel-photo-detail").owlCarousel({
        items:1,
        margin:0,
        stagePadding: 0,
        smartSpeed: 500,
        loop: false,
        nav: true,
        dots: false,
        autoplay: true,
        slideBy: 1,
        autoplayTimeout:5000,
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash',
        navText: [
            '<i class="btn-next-slide"></i>',
            '<i class="btn-prev-slide"></i>'
        ]
    });

    $(".box-icon-mini").owlCarousel({
        center: false,
        items:6,
        margin:10,
        stagePadding: 0,
        smartSpeed: 300,
        loop: false,
        nav: true,
        dots: false,
        slideBy: 3,
        navText: [
            '<i class="btn-next-slide"></i>',
            '<i class="btn-prev-slide"></i>'
        ]
    });
    /* end slider product detail*/

    $('.blog-page .highlight-news-right .info-news h2').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
    });

    $('.slider-news').owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        dots: false,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="btn-prev-slide"></i>', '<i class="btn-next-slide"></i>'],
        responsive: {
            0: {
                items: 1
            },
            425: {
                items: 1
            },
            768: {
                items: 2
            },
            1024: {
                items: 3
            }
        }
    });

});