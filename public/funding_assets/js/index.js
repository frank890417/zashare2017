$(document).ready(function() {
	// animateNumbers
	
    $.fn.animateNumbers = function(stop, commas, duration, ease) {
      return this.each(function() {
	      var $this = $(this);
        var start = parseInt($this.text().replace(/,/g, ""));
	      commas = (commas === undefined) ? true : commas;
        $({value: start}).animate({value: stop}, {
        	duration: duration == undefined ? 1000 : duration,
        	easing: ease == undefined ? "swing" : ease,
					step: function() {
        		$this.text(Math.floor(this.value));
        		if (commas) { $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); }
      		},
					complete: function() {
		     	 	if (parseInt($this.text()) !== stop) {
			      	$this.text(stop);
							if (commas) { $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); }
						}
        	}
  		  });
	    });
    };
  
  // animateNumbers End

	// loading
  var progress = 0;
  var $img_count = $("img").length;
  $("img").on('load', function() {
    progress += 100 / $img_count
    var percent = Math.round(progress)
    $("#loading .progress-text b").animateNumbers(percent, 100);
    $("#loading .progress").css('width', percent + '%')
  });

  $(window).on('load', function() {
  	$("#loading .progress-text b").animateNumbers(100, 100);
  	$("#loading").addClass('completed')
  })


  //about-scroll
  $("#call-to-action-btn").click(function() {
    var goFindIt = $("section.sec9").offset().top;
    $(document.body).animate({
      scrollTop: (goFindIt)
    })
  });

  $("#nav a.btn, #nav-mobile a.btn").click(function() {
  	$('#nav-mobile .icon, #nav-mobile .nav-content').removeClass('active')
  	var $t = $(this).attr('data-link')
    var goFindIt = $("section.sec" + $t).offset().top;
    $(document.body).animate({
      scrollTop: (goFindIt)
    })
  }); 

  $('#nav-mobile .icon').click(function() {
  	$('#nav-mobile .icon, #nav-mobile .nav-content').toggleClass('active')
  })

  // slider
	$('#header-slider').unslider({
		autoplay: true,
		speed: 700,
		delay: 4000,
		infinite: true,
		nav: false,
		arrows: false
	});

	$('#s6-slider').unslider({
		autoplay: true,
		speed: 700,
		delay: 4000,
		infinite: true,
		nav: false,
		arrows: true
	});
	

	/// scroll
	$(window).on('scroll resize', function() {
		let $t = $(this).scrollTop()
		let $h = $('#header').height() - 100

		if ( $t > $h ) {
			$('#bar, #nav, #call-to-action-btn').addClass('calm_down')
		} else {
			$('#bar, #nav, #call-to-action-btn').removeClass('calm_down')
		}

	})


	// reveal
	window.sr = ScrollReveal();
	sr.reveal('.reveal', 500);
	sr.reveal('.reveal-400', 400);
	sr.reveal('.reveal-300', {
	  duration    : 300,
	  origin      : 'left',
	  scale       : 0.9,
	});
	sr.reveal('.reveal-left-500', {
	  duration    : 1000,
	  distance		: '100px',
	  origin      : 'left',
	});
	sr.reveal('.reveal-right-500', {
	  duration    : 1000,
	  distance		: '100px',
	  origin      : 'right',
	});
	sr.reveal('.reveal-top-500', {
	  duration    : 1000,
	  delay       : 200,
	  distance		: '100px',
	  origin      : 'bottom',
	});


	//pop	
	$('.pop-btn').click(function() {
		var $p = $(this).attr('data-popup')
		console.log($('#popup .content[data-popup="' + $p + '"]'))
		$('#popup').fadeIn(300)
		$('#popup .content').removeClass('active')
		$('#popup .content[data-popup="' + $p + '"]').addClass('active')
		$('body').css('overflow', 'hidden')
	})

	$('#popup .close-btn').click(function() {
		$('#popup').fadeOut(300)
		$('#popup .content').removeClass('active')
		$('body').css('overflow', 'auto')
	})


})