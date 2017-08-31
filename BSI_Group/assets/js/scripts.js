var $ = jQuery.noConflict();

$(document).ready(function() {
	function initialise() {

		// Window Scroll

		function onScroll() {
			/* Menu top */
			if ($(window).scrollTop() > 30) {
				$('#header-nav, button.mob-menu-left').addClass('nav-fixed');
			} else {
				$('#header-nav, button.mob-menu-left').removeClass('nav-fixed');
			}
			//--- Footer fixed scroll bottom --- //
			var cheight = $('body.single-tours .post-content').innerHeight() - $('body.single-tours footer.footer').innerHeight();
			if ($(window).scrollTop() > cheight) {
				$('body.single-tours').addClass('foo-fixed');
			} else {
				$('body.single-tours').removeClass('foo-fixed');
			}
			//--- // Footer fixed scroll bottom --- //	
		}
		window.addEventListener('scroll', onScroll, false);
		
		// Scroll ID on load #id
		if (document.URL.indexOf("coupon") > -1) {
			setTimeout(function() {
				$('html, body').animate({
					scrollTop: $('#coupon').offset().top - 85
				}, 1000);
			}, 200);
		}

		// Scroll slow on href #id
		$(function() {
			$('body').on('click', 'a.btn, a.jump-arrow, .single a[href*="#"]:not([href="#"])', function() {
				if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
					if (target.length) {
						$('html, body').animate({
							scrollTop: target.offset().top - 85
						}, 1000);
						return false;
					}
				}
			});
		});
		
		// Read url
		$("#top-slider .item a").each(function() {
			var attr = $(this).attr('href');
			$(this).attr('attr',attr);
		});
		
		// Change time input
		$("input#callbacktime").change(function() {
			var val = $(this).val();
			$('input#time03').val(val);
		});
		
		// Only numbers
		function validateNumber(event) {
			var key = window.event ? event.keyCode : event.which;
			if (event.keyCode === 8 || event.keyCode === 46) {
					return true;
			} else if ( key < 48 || key > 57 ) {
					return false;
			} else {
					return true;
			}
		};
		$('#callbacktime').keypress(validateNumber);
		
		// Mob replace url function
// 		$(function() {
// 			var url = $('#top-slider .item a');
// 			if ($(window).width() < 685) {
// 				url.addClass('callback-mob');
// 				url.attr('href','#callbackmob');
// 				url.removeAttr('target');
// 			}
// 		});
		// on resize
// 		$( window ).resize(function() {
// 			var url = $('#top-slider .item a');
// 			var attr = $(this).attr('href');
// 			if ($(window).width() < 685) {
// 				url.addClass('callback-mob');
// 				url.attr('href','#callbackmob');
// 				url.removeAttr('target');
// 			}
// 		});
		$('body').on('click','#top-slider .item a.callback-mob', function() {
			var attrval = $(this).attr('attr');
			$('#callbackmob').toggleClass('active').attr('attr',attrval);
			$('#callbackmob input#item-url').val(attrval);
		});

		// Mobile Nav
		$('body').on('click', 'button.mob-menu-left', function() {
			$(this).addClass('clicked');
			$(".drawer").addClass("on-toggle").css("visibility", "visable");
			$('nav').css('display', 'none');
			$('#bgfull-menu').show();
			$('html').css('overflow-y', 'hidden');
		});
		$('body').on('click', 'button.mob-menu-left.clicked', function() {
			$('nav').css('display', 'block');
			$('button.mob-menu-left').removeClass('clicked');
			$(".drawer").removeClass("on-toggle").css("visibility", "hide");
			$('#bgfull-menu').css('display', 'none');
			$('html').css('overflow-y', 'auto');
		});
		
		// === OWL top bg slider === //
		$("#full-screen-bg img, .top-carousel-wrap #top-slider article img").each(function(i, elem) {
			var img = $(elem);
			var div = $("<div />").css({
				background: "url(" + img.attr("src") + ") no-repeat",
				"width": "100%",
				"height": "auto",
				"background-size": "cover"
			});
			div.html(img.attr("alt"));
			div.addClass("item");
			img.replaceWith(div);
		});
		// === // OWL top bg slider === //
		
		// === Form Ajax loader === //
    setInterval(function() {
			if(typeof $.fn.wpcf7InitForm != "undefined") {
				//Contact Form 7 is loaded and initialized
				$loaderImage = $("div.wpcf7 img.ajax-loader"); // modify your selector accordingly
				if(!$loaderImage.data("pathChanged")) {
					$loaderImage.attr("src","/wp-content/themes/BSI_Group/img/icons/load.png");
					$loaderImage.data("pathChanged", true);
				}
			}
    }, 2000);
		// === // Form Ajax loader === //
		
		// === Profile img === //
		$("#main-home section .b04 .content-bl .widget_simpleimage .simple-image img").each(function(i, elem) {
			var img = $(elem);
			var div = $("<div />").css({
				background: "url(" + img.attr("src") + ") no-repeat",
				"background-size": "cover",
				"width": "93px",
				"height": "93px",
				"display": "block",
				"border-radius": "100%"
			});
			div.html(img.attr("alt"));
			div.addClass("item");
			img.replaceWith(div);
		});
		// === // Profile img === //
		
		// === Tours list item img === //
		$(".tour-list article img").each(function(i, elem) {
			var img = $(elem);
			var div = $("<div />").css({
				background: "url(" + img.attr("src") + ") no-repeat",
				"width": "100%",
				"height": "200px",
				"background-size": "cover",
				"display": "block"
			});
			div.html(img.attr("alt"));
			div.addClass("item");
			img.replaceWith(div);
		});
		// === // Tours list item img === //
		
		// === Tours single post img === //
		$(".single-tours #single-tours-img img").each(function(i, elem) {
			var img = $(elem);
			var div = $("<div />").css({
				background: "url(" + img.attr("src") + ") no-repeat",
				"width":"100%",
				"height":"300px",
				"background-size": "cover",
				"display": "block"
			});
			div.html(img.attr("alt"));
			div.addClass("post");
			img.replaceWith(div);
		});
		// === // Tours single item img === //

				
		// Target footer navigation url
		$('.footer #foo-wrapper .nav ul li a').attr('target', '_blank');
		
		// ================================================
		// ----------- Form7 step 1 - 2  ------------------
		// ================================================
		$("#lang-ru .wpcf7-select#from label.error:contains('This field is required.')").html('Поле обязательно.').hide();
		$('#b1 button.button-next').text('ПОДОБРАТЬ ТУР');
		$("#filter-form section h3+p").replaceWith();
		
		$(window).on('wpcf7:invalid', function() {
    // let's scroll
			$('#header-wrapper').css('z-index', '8');
			$('#full-screen-bg, .home h1').css('display', 'none');
			$('#bgfull-menu').css('display', 'block');
			$('#filter-form-selector-send').css({
				'z-index': '9',
				'position': 'fixed',
				'top': '20%'
			});
		});
		
		// === PopUp functions ===
		$('ul.lang-menu').on('click', '.time-top', function() {
				$('#contacts-pop, #bgfull-menu').css('display','block');
				$('#phone-pop').css('display','none');
				$('html, body').css('overflow-y','hidden');
				$('#header-nav').css('z-index','8');
		});
		$('ul.lang-menu').on('click', '.tel-top', function() {
				$('#phone-pop, #bgfull-menu').css('display','block');
				$('#contacts-pop').css('display','none');
				$('html, body').css('overflow-y','hidden');
				$('#header-nav').css('z-index','8');
		});
		$('body').on('click', '#header-wrapper, #close-callback, #close-callbackmob, #contacts-pop', function() {
			$('#phone-pop, #bgfull-menu').css('display','none');
			$('html, body').css('overflow-y','auto');
			$('#header-nav').removeAttr('style');
		});
		$('body').on('click', '#close-contacts', function() {
			$('#contacts-pop').css('display','none');
		});
		$("#phone-pop form").trigger("reset");
		// === // PopUp functions ===
		
		$('body.home').on('click', '#b1 button.button-next', function() {
			$('#filter-form-selector-send').css('display','block');
		});
		$('body').on('click', '#ui-datepicker-div table', function() {
			$('#ui-datepicker-div').hide();
		});
		$('body.home').on('click', '#filter-form-selector .wpcf7-form-control-wrap.date1 input', function() {
			$('#ui-datepicker-div').show();
		});
		$('body.home').on('click', '#filter-form div.wpcf7-mail-sent-ok, #callbackmob div.wpcf7-mail-sent-ok, .b03 div.wpcf7-mail-sent-ok, #bgfull-menu', function() {
			location.reload();
		});
		$('body.home').on('click', '#filter-form #age #age-top', function() {
			$(this).toggleClass('active');
			$('#age-down').toggleClass('active');
			$('#travel, #travelers, #travelers-adults').addClass('active');
			$('#nights01, #city02, #nights01-down').removeClass('active');
		});
		$('body.home').on('click', '#age3 #age-top3', function() {
			$(this).toggleClass('active');
			$('#age-down3').toggleClass('active');
			$('#travel3, #travelers3, #travelers-adults3').addClass('active');
		});
		$('body.home').on('click', '.date1 input, .chosen-single, #travel-close, #travel-close3, #filter-form form section h3+div+div', function() {
			$('#nights01, #age-down, #age-down3, #nights01-down').removeClass('active');
		});
		$('body.home').on('click', '#filter-form-selector .wpcf7-form-control-wrap.date1 input', function() {
			$('#age-down, #city02, #nights01-down').removeClass('active');
		});
		$('body.home').on('click', '#filter-form-selector .cityfieldtext-01', function() {
			$('#age-down, #city02, #nights01-down').removeClass('active');
		});
		$('body.home').on('click', '#header-wrapper #filter-form form div+section div, #ui-datepicker-div table td a', function() {
			$(this).addClass('active');
			$(this).find('input').removeAttr('placeholder');
		});
		$('body').on('click', '#filter-form form h3+div+div', function() {
			var s = $('[name="checkbox-02[]"]:checked').length;
			$('#li-selected i').text(s + ' города');
			if (s == 1) {
				$('#li-selected i').text(s + ' город');
			}
			if (s >= 5) {
				$('#li-selected i').text(s + ' городов');
			}
			//console.log(s);
			$('#city02').addClass('active');
		});
		$("#city02").live('click',function(e){
    if(e.target != this) return;
    	$('#city02, #nights01-down').removeClass('active');
    // this code will execute only when you click to li and not to a child
		});
		
		$(".wpcf7-select#city2 option:first:contains('---')").html('Куда').hide(); //Replace ---
		$(".wpcf7-select#nights1 option:first:contains('---')").html('Кол-во ночей').hide(); //Replace ---
		
		// Remove emty p
		$('#filter-form p').filter(function() {	return this.innerHTML.replace("&nbsp;", " ").trim() == ""}).remove();
		// Selected nights value
		$('body.home').on('click', '#nights-d', function() {
			$('#nights01-down').toggleClass('active');
			$('#age-down, #city02').removeClass('active');
		});
		$('body.home').on('click', '#nights-d3', function() {
			$('#nights-d3, #selected-nights3').addClass('active');
			$('#nights03-down').toggleClass('active');
		});
		// Selected nights value
		$('#nights01-down li').on('click', function() {
			$('#nights01-down li').removeClass('checked');
			$(this).addClass('checked');
			var n = $(this).text();
			$('#selected-nights').text(n);
			object = $('#selected-nights');
			inputval = object.text();
			$('input#nights01').val(inputval);
			//console.log(n);
		});
		$('#nights03-down li').on('click', function() {
			$('#nights03-down li').removeClass('checked');
			$(this).addClass('checked');
			var n = $(this).text();
			$('#selected-nights3').text(n);
			object = $('#selected-nights3');
			inputval = object.text();
			$('input#nights03').val(inputval);
			//console.log(n);
		});
		
		// Mob pop calendar 
		$('body.home').on('click', '#callbackmob .date1 input', function() {
			setTimeout(function() {
				$('#ui-datepicker-div').addClass('callbackmob-date');
			}, 100);
		});
		
		// Initialize time picker iOS style
    //$('#s-h, #s-min').drum();
		
		// Print functions
		$("#btn-print-id").click(function() {
			var contents = $('#print-pdf-ru-wrap').html();
			var frame1 = $('<iframe />');
			frame1[0].name = 'frame1';
			frame1.css({
				'position': 'absolute',
				'top': '-1000000px'
			});
			$('body').append(frame1);
			var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
			frameDoc.document.open();
			//Create a new HTML document.
			frameDoc.document.write('<html><head><title>&nbsp;</title>');
			frameDoc.document.write('</head><body>');
			//Append the DIV contents.
			frameDoc.document.write(contents);
			frameDoc.document.write('</body></html>');
			frameDoc.document.close();
			setTimeout(function() {
				window.frames["frame1"].focus();
				window.frames["frame1"].print();
				frame1.remove();
			}, 500);
		});
		
	// Chosen touch support.
	if ($('.chosen-container').length > 0) {
		$('.chosen-container').on('touchstart', function(e){
			e.stopPropagation(); e.preventDefault();
			// Trigger the mousedown event.
			$(this).trigger('mousedown');
		});
	}
		
	// Input Number cutom function
	var input = $('#adults1');
	var input2 = $('#kids2');
	var input3 = $('#kids3');
	var travelers =	$('#travelers');
	
	input_val = parseInt(input.val());
	input_val2 = parseInt(input2.val());
	input_val3 = parseInt(input3.val());
	
	btn_add = $('.add');
	btn_add2 = $('.add2');
	btn_add3 = $('.add3');
	btn_remove = $('.remove');
	btn_remove2 = $('.remove2');
	btn_remove3 = $('.remove3');
	all_btn = $('.input-button');
		
	input.keyup(function()  {
		input_val = parseInt(input.val());
		input_val2 = parseInt(input2.val());
		input_val3 = parseInt(input3.val());
	});
		
	btn_add.click(function(e) {
		if (e.shiftKey) {
				input_val += 10
		} else {
				input_val++
		}
		input.val(input_val);
	});
		
	btn_add2.click(function(e) {
		if (e.shiftKey) {
				input_val2 += 10
		} else {
				input_val2++
		}
		input2.val(input_val2);
	});
		
	btn_add3.click(function(e) {
		if (e.shiftKey) {
				input_val3 += 10
		} else {
				input_val3++
		}
		input3.val(input_val3);
	});
		
	btn_remove.click(function(e) {
		if (input_val > 11 && e.shiftKey) {
				input_val -= 10
		} else if (input_val > 0) {
				input_val--
		}
		input.val(input_val);
	});
		
	btn_remove2.click(function(e) {
		if (input_val2 > 11 && e.shiftKey) {
				input_val2 -= 10
		} else if (input_val2 > 0) {
				input_val2--
		}
		input2.val(input_val2);
	});
		
	btn_remove3.click(function(e) {
		if (input_val3 > 11 && e.shiftKey) {
				input_val3 -= 10
		} else if (input_val3 > 0) {
				input_val3--
		}
		input3.val(input_val3);
	});
		
	all_btn.click(function(e) {
		travelers_val = input_val2 + input_val3;
		//console.log(travelers_val);
		$('#travelers').text(travelers_val);
		$('#travelers-adults, #adults-sum').text(input_val);
		$('#travelers-kids2, #kids-sum2').text(input_val2);
		$('#travelers-kids3, #kids-sum3').text(input_val3);
	});
	// End Input number
		
	// Input Number cutom function3 mobile
	var input03 = $('#adults13');
	var input23 = $('#kids23');
	var input33 = $('#kids33');
	var travelers3 = $('#travelers3');
	
	input_val03 = parseInt(input03.val());
	input_val23 = parseInt(input23.val());
	input_val33 = parseInt(input33.val());
	
	btn_add03 = $('.add03');
	btn_add23 = $('.add23');
	btn_add33 = $('.add33');
	btn_remove03 = $('.remove03');
	btn_remove23 = $('.remove23');
	btn_remove33 = $('.remove33');
	all_btn03 = $('.input-button');
		
	input03.keyup(function()  {
		input_val03 = parseInt(input03.val());
		input_val23 = parseInt(input23.val());
		input_val33 = parseInt(input33.val());
	});
		
	btn_add03.click(function(e3) {
		if (e3.shiftKey) {
				input_val03 += 10
		} else {
				input_val03++
		}
		input03.val(input_val03);
	});
		
	btn_add23.click(function(e3) {
		if (e3.shiftKey) {
				input_val23 += 10
		} else {
				input_val23++
		}
		input23.val(input_val23);
	});
		
	btn_add33.click(function(e3) {
		if (e3.shiftKey) {
				input_val33 += 10
		} else {
				input_val33++
		}
		input33.val(input_val33);
	});
		
	btn_remove03.click(function(e3) {
		if (input_val03 > 11 && e3.shiftKey) {
				input_val03 -= 10
		} else if (input_val03 > 0) {
				input_val03--
		}
		input03.val(input_val);
	});
		
	btn_remove23.click(function(e3) {
		if (input_val23 > 11 && e3.shiftKey) {
				input_val23 -= 10
		} else if (input_val23 > 0) {
				input_val23--
		}
		input23.val(input_val23);
	});
		
	btn_remove33.click(function(e3) {
		if (input_val33 > 11 && e3.shiftKey) {
				input_val33 -= 10
		} else if (input_val33 > 0) {
				input_val33--
		}
		input33.val(input_val33);
	});
		
	all_btn03.click(function(e3) {
		travelers_val3 = input_val23 + input_val33;
		//console.log(travelers_val);
		$('#travelers3').text(travelers_val3);
		$('#travelers-adults3, #adults-sum03').text(input_val03);
		$('#travelers-kids23, #kids-sum23').text(input_val23);
		$('#travelers-kids33, #kids-sum33').text(input_val33);
	});
		
	// End Input number3 mobile
		
		return false;
	};

	$(document).ready(function() {
		initialise();
	});
	// end jQuery	
});