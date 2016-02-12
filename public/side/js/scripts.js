(function(){
  "use strict";

  // Variables
  //
  var onl                = $(".over-navbar-left"),
			onlBtnToggle       = $(".onl-btn-toggle"),
			onlBtnCollapse     = $(".onl-btn-collapse"),
			contentWrap        = $(".content-wrap"),
			contentWrapEffect  = contentWrap.data("effect");

	// Functions
	//
	function onlShow() {
		onl.addClass("onl-show").removeClass("onl-hide");
		contentWrap.addClass(contentWrapEffect);
		onlBtnToggle.find("span").removeClass("fa-bars").addClass("fa-arrow-left");
	}

	function onlHide() {
		onl.removeClass("onl-show").addClass("onl-hide");
		contentWrap.removeClass(contentWrapEffect);
		onlBtnToggle.find("span").removeClass("fa-arrow-left").addClass("fa-bars");
	}

	// Toggle the edge navbar left
	//
	onlBtnToggle.click( function() {
		if( onl.hasClass("onl-hide") ) {
			onlShow();
		} else {
			onlHide();
		}
	});

	// Collapse the over navbar left subnav
 	//
	onlBtnCollapse.click( function(e) {
		e.preventDefault();
		if( onl.hasClass("onl-collapsed") ) {
			onl.removeClass("onl-collapsed");
			contentWrap.removeClass("onl-collapsed");
			$(this).find(".onl-link-icon").removeClass("fa-arrow-right").addClass("fa-arrow-left");
		} else {
			onl.addClass("onl-collapsed");
			contentWrap.addClass("onl-collapsed");
			$(this).find(".onl-link-icon").removeClass("fa-arrow-left").addClass("fa-arrow-right");
		}
	});

	// Swipe plugin for handling touch events
	// 
	$(window).swipe( {
    //Generic swipe handler for all directions
    swipeLeft:function(event, direction, distance, duration, fingerCount) {
			onlShow();
    },
    swipeRight:function(event, direction, distance, duration, fingerCount) {
			onlHide();
    },
    //Default is 75px, set to 0 for demo so any distance triggers swipe
    threshold: 75
  });

  // Peity
  $(".bar").peity("bar", {
	  fill: ["#55516D", "#413E56"],
	  width: 100,
	  height: 40
	})

})();