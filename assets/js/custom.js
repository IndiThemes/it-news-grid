/**
 *	Custom Front-end JS code
 */
 
jQuery(document).ready(function() {
	
	const searchArea	=	document.getElementById('itng-search'),
			searchBtn	=	document.getElementById('search-btn'),
			searchField	=	document.querySelector('.search-field'),
			goToBtn		=	document.querySelector('#go-to-btn'),
			goToField	=	document.querySelector('#go-to-field')
	 		
	const toggleSearch = () => {
		if ( searchBtn.classList.contains('is-toggled') ) {
			searchBtn.focus()
			searchArea.style.height = '0'
			searchArea.style.opacity = '0'
			searchBtn.classList.remove('is-toggled')
			goToBtn.tabIndex = '-1'
			searchField.tabIndex = '-1'
			goToField.tabIndex = '-1'
			
		} else {
			searchField.focus()
			searchArea.style.height = '100%'
			searchArea.style.opacity = '1'
			searchBtn.classList.add('is-toggled')
			goToBtn.tabIndex = '0'
			searchField.tabIndex = '0'
			goToField.tabIndex = '0'
		}
	}
		
	searchBtn.addEventListener('click', () => {
		toggleSearch()
		//searchField.focus()
	})
	
	 goToBtn.addEventListener('focus', () => {
		 searchBtn.focus()
	 })
	 
	 goToField.addEventListener('focus', () => {
		 searchField.focus()
	 })
/*
	var	searchLabel = jQuery('#search-screen'),
		searchInput	 = jQuery('.top_search_field'),
		cancelSearch = jQuery('.cancel_search');
	
	searchScreen.hide();
	
	jQuery('#search-btn').on('click', function() {
		searchScreen.fadeIn(200);
		searchInput.focus();
	});
	
	cancelSearch.on('click', function(e) {
		searchScreen.fadeOut(200);
		jQuery('#search-btn').focus();
	});
	
	jQuery('#go-to-field').on('focus', function() {
		jQuery(this).siblings('input[type="text"]').focus();
	});
	
	jQuery('#go-to-close').on('focus', function() {
		jQuery(this).siblings('button.cancel_search').focus();
	});
*/
	
	// Navigation
	var clickedBtn;
	jQuery('.menu-link').bigSlide({
		easyClose	: true,
		width		: '25em',
		side		: 'left',
		beforeOpen	: function() {
			jQuery('.menu-overlay').show();
		},
		afterOpen	: function(e) {
				    	jQuery('#close-menu').focus();
				    	clickedBtn = jQuery(e.target).parent();
			    	},
		afterClose: function(e) {
				    	clickedBtn.focus()
			    }
    });
  
  	jQuery('.go-to-top').on('focus', function() {
		jQuery('#close-menu').focus();
		jQuery('.menu-overlay').hide();
	});
	
	jQuery('.go-to-bottom').on('focus', function() {
		jQuery('ul#menu-main > li:last-child > a').focus();
	});
	
	var parentElement =	jQuery('.panel li.menu-item-has-children'),
      		dropdown  =	jQuery('.panel li.menu-item-has-children span');
	  
	parentElement.children('ul').hide();
	dropdown.on({
		'click': function(e) {
			e.target.style.transform == 'rotate(0deg)' ? 'rotate(180deg)' : 'rotate(0deg)';
			jQuery(this).siblings('ul').slideToggle().toggleClass('expanded');
			e.stopPropagation();
		},
		'keydown': function(e) {
			if( e.keyCode == 32 || e.keyCode == 13 ) {
				e.preventDefault();
				jQuery(this).siblings('ul').slideToggle().toggleClass('expanded');
				e.stopPropagation();
			}
		}
	});
	
	
	// Magnific Popup Lightbox
	jQuery('.blocks-gallery-grid, .gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		gallery: {
			enabled: true
		}
	})
	
	
	// Owl Slider
	var catSliders = [];
	
	for (catSlider in window) {
	    if ( catSlider.indexOf("cat_slider") != -1 ) {
		    catSliders.push( window[catSlider] );
	    }
    };
    catSliders.forEach( function( item ) {
	    var slider = jQuery("#" + item.id).find('.cat-slider');
	    slider.owlCarousel({
		    items: 1,
		    loop: true,
		    autoplay: true,
		    dots: false,
		    nav: true
	    });
    });
	
	
	// Tab Widget
	var tabWidgets = [];
    
    for (tabWidget in window) {
	    if ( tabWidget.indexOf("tab_widget") != -1 ) {
		    tabWidgets.push( window[tabWidget] );
	    }
    };
    tabWidgets.forEach( function( item ) {
	    
	    var widget 			=	jQuery("#tab-category-wrapper-" + item.number),
	    	containerLeft	=	widget.find('ul').offset().left,
    		currentArrow	=	widget.find('.tabs-slider'),
    		arrowWidth		=	currentArrow.width();
    		
	    widget.tabs({
		    create: function( event, ui ) {
				
				var initialTab = ui.tab,
					initialTabLeft	=	initialTab.offset().left;
					initialTabWidth	=	initialTab.width();
					currentArrow.css('left', initialTabLeft - containerLeft + initialTabWidth/2 -10 + 'px');
		    },
		    beforeActivate: function( event, ui ) {
			    jQuery(ui.oldPanel[0]).fadeOut()
			    jQuery(ui.newPanel[0]).fadeIn()
		    },
		    activate: function( event, ui ) {
			    
		    	var currentTabLeft		=	ui.newTab.offset().left,
		    		currentTabWidth		=	ui.newTab.width();
		    		
				currentArrow.animate({
									    left: currentTabLeft - containerLeft + currentTabWidth/2 - 10 + 'px'
									},
									{
										duration: 300
									});
	    	}
	    });
	});
	
	
	//Sticky Navigation
	if (itng.stickyNav !== "") {
		var stickyNav = jQuery('#sticky-navigation');
		stickyNav.css("opacity", "0");
		function oroStickyMenu() {
			var height = jQuery(this).scrollTop();
			if (height > 500) {
				jQuery('body').addClass('has-sticky-menu');
				stickyNav.css({
					"transform": "translateY(0)",
					"opacity": "1"
				});
			} else {
				stickyNav.css({
					"transform": "translateY(-100%)",
					"opacity": "0"
				});
			}
		}
		jQuery(window).scroll(function() {
			oroStickyMenu()
		})
		oroStickyMenu()
	}
});