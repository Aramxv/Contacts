$(document).ready(function(){

    /* 
        General Contact Owl Carousel
    */
    $("#contact-list .owl-carousel").owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000 : {
                items: 5
            }
        }
    });
    
});