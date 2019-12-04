$(document).ready(function () {
/*
    $('#mainLogo').hover(function () {
        $(this).addClass('animated').addClass('pulse');
    }, function () {
        $(this).removeClass('animated').removeClass('pulse');
    });
*/
    $('.carousel').carousel();

    $('#testimonialsCarousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });
	
	


    var mainNav = $('#mainNavigation');
    var header = $('#mainHeader');
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if (scroll > 350) {
            mainNav.addClass('header-pane');
            header.addClass('p-0');

        } else {
            mainNav.removeClass('header-pane').removeClass('p-0');
            header.removeClass('p-0');
        }
    });

    $('.alert').alert();


    function filterCareers() {
        if ($('#filterSearch').val() != "") {
            $("#careersTable .position").filter(function () {
                $(this).parents('tr').toggle($(this).text().toLowerCase().indexOf($('#filterSearch').val().toLowerCase()) > -1)
            });
        }

        if ($('#filterSubjectArea').val() != "") {
            $("#careersTable .position").filter(function () {
                $(this).parents('tr').toggle($(this).text().toLowerCase().indexOf($('#filterSubjectArea').val().toLowerCase()) > -1)
            });
        }

        if ($('#filterLocation').val() != "") {
            $("#careersTable .location").filter(function () {
                $(this).parents('tr').toggle($(this).text().toLowerCase().indexOf($('#filterLocation').val().toLowerCase()) > -1)
            });
        }
        if ($('#filterFieldOfWork').val() != "") {
            $("#careersTable .department").filter(function () {
                $(this).parents('tr').toggle($(this).text().toLowerCase().indexOf($('#filterFieldOfWork').val().toLowerCase()) > -1)
            });
        }

    }


    $("#filterSearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        filterCareers();
    });

    $("#filterSubjectArea").on("change", function () {
        var value = $(this).val().toLowerCase();
        filterCareers();
    });

    $("#filterLocation").on("change", function () {
        var value = $(this).val().toLowerCase();
        filterCareers();
    });

    $("#filterFieldOfWork").on("change", function () {
        var value = $(this).val().toLowerCase();
        filterCareers();
    });
	



	$('#mainSlider2').owlCarousel({
		nav: true,
		slideSpeed: 700,
		paginationSpeed: 800,
		singleItem: true,
		autoplay: true,
		autoplayTimeout: 5000,
		loop: true,
		pagination: true,
		rewindSpeed: 500,
		items: 1,
		navText : ['<img class="slider-arrows" src="assets/images/left-chevron.svg">','<img class="slider-arrows" src="assets/images/right-chevron.svg">'],
		animateIn: "slideInRight",
		animateOut: "slideOutRight",
		autoHeight:true
	});
	
	$('.why-shs-right').html($('.why-shs-li:eq(0) p').html());
	
	$('.why-shs-li').on('mouseover',function(){
		var el = $(this);
		$('.why-shs-right').html(el.find('p').html());
	});
	
	

	/*
	$('.tr-card').each(function(key, val){
		var el = $(this);
		var trCardHeight = el.height();
		var trCardTitleHeight = el.find('.tr-card-title-homepage').height();
		var trCardImageHeight = el.find('.card-img').height();
		var ptb = 30;
		el.find('.tr-card-title-homepage').css({
			'margin-top' : ((trCardHeight - ptb - trCardImageHeight - trCardTitleHeight) / 2 ) + "px"
		});
	});
	*/
	
	
	
	
	
	
	
	$('#mainSlider2').css('padding-top', $('#mainHeader').height() + 'px');
	
	$('.default-section.banner').css('margin-top', $('#mainHeader').height() + 'px');
	
	
	
	if($(window).height() > $('body').height()){
		$('footer').css({
			'position': 'absolute',
			'bottom' : '0'
		});
	}
	
	
	
	
	

});