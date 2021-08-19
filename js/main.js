(function ($) {
    // Bootstrap menu magic
    if($(window).width()>769){
        $('.navbar .dropdown').hover(function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(200).slideDown();

        }, function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

        });

        $('.navbar .dropdown > a').click(function(){
            location.href = this.href;
        });
    };

    // Sticky header on top
    $(window).on('scroll',function() {
        if( $(window).scrollTop() > 50) {
            $('#main-nav').addClass('fixed-top');
        } else {
            $('#main-nav').removeClass('fixed-top');
        }
    });
    

    //Menu Responsive 
    $('.menu__toggler').on('click', function () {
        $(this).toggleClass('active');
        $('#navbarNavDropdown').toggleClass('active');
        $('body').toggleClass('overflow-hidden');
    });

    // Search Form Open & Close
    const searchForm = $('#form-search');
    
    $("#btn-search").on('click', function () {
        $(searchForm).slideToggle(250);
        $(searchForm).find("input[type=text]").focus();
        $(searchForm).find("input[type=text]").val("");
        $('#data-fetch').html("");
    });

    // Image Zoom In
    $('.survey').on('mouseover', function() {

        $(this).find('.survey-img-holder').css('transform', 'scale(1.5)');

    });

    // Image Zoom Out
    $('.survey').on('mouseout', function() {

        $(this).find('.survey-img-holder').css('transform', 'scale(1)');
        
    });

    // Table Open more view
    $('#myBtn').on('click', function() {
        $('#more').slideToggle('slow');
        $(this).text(function(i, text){
          return text === "More" ? "Less" : "More";
      })
    });

    // Image popup
    $('.wp-caption img').on('click', function(e) {
        const imgSrc = $(this).attr('src');

        $('.wp-caption').magnificPopup({
            items: {
                src: imgSrc
            },
            type: 'image',
        });

    });
    
})(jQuery);