$(document).ready(function() {
    
    $('.menu-toggle').on('click', function(e) {
        e.stopPropagation();
        $(this).toggleClass('active');
        $('header nav ul').toggleClass('active');
    });
    
    //Cerrar quitando clase "active"
    $('header nav ul li a').on('click', function() {
        if ($(window).width() <= 768) {
            $('.menu-toggle').removeClass('active');
            $('header nav ul').removeClass('active');
        }
    });
    
    // Cerrar clickeando fuera
    $(document).on('click', function(event) {
        if (!$(event.target).closest('header nav').length) {
            if ($('header nav ul').hasClass('active')) {
                $('.menu-toggle').removeClass('active');
                $('header nav ul').removeClass('active');
            }
        }
    });
    
    // Cerrar al cambiar tamaño
    $(window).on('resize', function() {
        if ($(window).width() > 768) {
            $('.menu-toggle').removeClass('active');
            $('header nav ul').removeClass('active');
        }
    });
    
});