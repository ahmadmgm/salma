var jwsThemeModule;

(function ($) {
	"use strict";

	jwsThemeModule = (function () {
		return {
			init: function () {
				this.scrollTop();
				this.menu_mobile();
				this.wish_list_post();
				this.sticky_header();
				this.hoverActive();
				this.see_cart();
				this.product_share();
				this.post_slider_related();
				this.product_gallery_image();
				this.case_study_gallery();
				this.menu_offsets();
				this.menu_nav();
				this.quantityInputsBindButtons();
				this.quickview();
                this.mobile_default();
			},
      
           mobile_default: function(data) {
               $('body').on('click', '.jws-tiger-mobile,.overlay,.close-menu', function (e) {
                    $(this).parents('.elemetor-menu-mobile').toggleClass('active');
                })
            },
			menu_nav: function () {
				var mainMenu = $('.elementor_jws_menu_layout_menu_horizontal').find('.jws_nav'),
				lis = mainMenu.find(' > li.menu_has_shortcode');
				var setOffset = function (li) {
					var dropdown = li.find(' > .sub-menu-dropdown'),
						styleID = 'arrow-offset',
						siteWrapper = $('.website-wrapper');
					dropdown.attr('style', '');

					var dropdownWidth = dropdown.outerWidth(),
						dropdownOffset = dropdown.offset(),
						screenWidth = $(window).width(),

						viewportWidth = screenWidth,
						extraSpace = 10;

					if (!dropdownWidth || !dropdownOffset) return;
					if (dropdownOffset.left + dropdownWidth >= viewportWidth && li.hasClass('menu_has_shortcode')) {
						// If right point is not in the viewport

						var toRight = dropdownOffset.left + dropdownWidth - viewportWidth;
						dropdown.css({
							left: -toRight - extraSpace
						});
					}
				};
				lis.each(function () {
					setOffset($(this));
					$(this).addClass('with-offsets');
				});
			},

			menu_offsets: function () {
				var mainMenu = $('.elementor_jws_menu_layout_menu_horizontal').find('.jws_nav'),
					lis = mainMenu.find(' > li.menu-item-has-children');
				$(window).resize(function () {
					lis.find('.sub-menu').removeAttr('style');
				});
				mainMenu.on('hover', ' > li.menu-item-has-children', function (e) {
					setOffset($(this));
				});
				var setOffset = function (li) {
					var clientWidth = document.body.clientWidth;
					var dropdown = li.find('> .sub-menu').outerWidth(),
						dropdown2 = li.find('> .sub-menu .sub-menu').outerWidth(),
						dropdown3 = li.find('> .sub-menu .sub-menu .sub-menu').outerWidth(),
						styleID = 'arrow-offset';
					var
						dropdownOffset = li.find('> .sub-menu').offset(),
						screenWidth = $(window).width(),

						viewportWidth = screenWidth,
						extraSpace = 10;


					if (!dropdown || !dropdownOffset) {
						return false;
					};
					if (dropdown + dropdown2 + dropdown3 + dropdownOffset.left >= clientWidth & li.hasClass('menu-item-has-children')) {
						// If right point is not in the viewport

						li.find('.sub-menu').css({
							right: 0
						});
						li.find('.sub-menu .sub-menu').css({
							left: -dropdown2
						});
						li.find('.sub-menu .sub-menu .sub-menu').css({
							left: -dropdown3
						});

					}
				};
				lis.each(function () {
					setOffset($(this));
					$(this).addClass('with-offsets');

				});
			},
			case_study_gallery: function () {
				$('.single-case-study .case-study-gallery').slick({
					infinite: false,
					slidesToShow: 1,
					slidesToScroll: 1,
					prevArrow: '<button class="slick-arrow slick-prev"></button>',
					nextArrow: '<button class="slick-arrow slick-next"></button>'
				});

			},
			post_slider_related: function () {
				var n = $(".jws-post-related-slider .post-item").length;
				var slidesToScroll = $(".jws-post-related-slider").attr("data-slidesToShow"),
					isdots = '';
				if (n <= slidesToScroll) {
					isdots = false;
				} else {
					isdots = true;
				}
				$('.jws-post-related-slider').not('.slick-initialized').slick({
					arrows: false,
					dots: isdots,
				})

			},
			product_gallery_image: function () {
				var is_vertical = false;
				var is_verticalSwiping = false;
				if ($('.image-product-layout2').length) {
					is_vertical = true;
					is_verticalSwiping = true;

				}
				var $thumbnails = $('#product-thumbnails').find('.thumbnails'),
					$images = $('#product-images');

				// Product thumnails and featured image slider
				$images.not('.slick-initialized').slick({
					slidesToScroll: 1, asNavFor: ".thumbnails", fade: true,
					arrows: false,
                                                   

				});

				$thumbnails.not('.slick-initialized').slick({
					slidesToShow: 5,
					slidesToScroll: 1,
					arrows: false,
					asNavFor: "#product-images",
					vertical: is_vertical,
                    focusOnSelect: true,
                    infinite: false,
          
                                                  
					responsive: [
						{
							breakpoint: 1023,
							settings: {
								slidesToShow: 4,
								vertical: false,
								verticalSwiping: false,
							}
						},

					]

				});


			},
			product_share: function () {
				$(document).on("click", ".click-to-share", function (e) {
					if ($('.product-share').hasClass('active')) {
						$('.product-share').removeClass('active');
					} else {
						$('.product-share').addClass('active');
					}
				})
			},

			see_cart: function () {
				$('body').on('added_to_cart', function (event, fragments, cart_hash, $button) {
					$('body').append('<div class="quickview-loading"><div class="content-inner"><div class="image"><img src="' + $($button[0]).data('image') + '"></div><div class="title-product-cart"><strong>"' + $($button[0]).data('title') +
						'" </strong> has been added to your cart <a href="/cart" class="link_to_cart">View Cart <i aria-hidden="true" class="eci  linearicons-free-arrow-right"></i></a></div></div></div>');
					$(".quickview-loading").hide().fadeIn("slow");
					setTimeout(function () {

						$('.quickview-loading').fadeOut(1000, function () {
							$(".quickview-loading").remove()
						});
					}, 2000);

				});
			},

			sticky_header: function () {

				$(window).scroll(function () {

					var scroll = $(window).scrollTop();

					var height = $('.backToTop').height() + 100;

					if (scroll >= height) {

						$(".backToTop").addClass("totopshow");

					} else {

						$(".backToTop").removeClass("totopshow");

					}

				});

			},

			hoverActive: function () {

				$('.hover-active .elementor-inner-column').hover(function () {
					$('.hover-active .elementor-inner-column').removeClass("active");
					$(this).addClass("active");
				});
				var heights = $('.jws-price-table.active').height();
				$('.click-active .hover-pricing-home2').hover(function () {
					$('.click-active .hover-pricing-home2').removeClass("active");
					$(this).addClass("active");
				});

			},

			scrollTop: function () {
				//Click event to scroll to top

				$('.backToTop').on("click", function () {
					$('html, body').animate({
						scrollTop: 0
					}, 800);
					return false;
				});
			},

			wish_list_post: function () {
				$('body').on('click', '.jws-love', function () {
					var $loveLink = $(this);
					var $icon = $(this).find('i');
					var $id = $(this).attr('id');
					var $that = $(this);
					if ($loveLink.hasClass('loved')) return false;
					if ($(this).hasClass('inactive')) return false;
					var $dataToPass = {
						action: 'jws-love',
						loves_id: $id
					}
					$.post(jwsLove.ajaxurl, $dataToPass, function (data) {
						$loveLink.find('.count').html(data);
						$loveLink.addClass('loved').attr('title', 'You already love this!');
						$icon.removeClass('icon-basic-heart').addClass('heart-icon');
					});
					$(this).addClass('inactive');
					return false;
				});
			},

			// change quantity product
			quantityInputsBindButtons: function () {

				var self = this;
				$('body').off('click.jws-font').on('click.jws-font', '.jws-qty-plus, .jws-qty-minus', function (e) {
					e.preventDefault();
					var $this = $(this),
						$qty = $this.closest('.quantity').find('.qty'),
						currentVal = parseFloat($qty.val()),
						max = parseFloat($qty.attr('max')),
						min = parseFloat($qty.attr('min')),
						step = $qty.attr('step');

					// Format values
					if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
					if (max === '' || max === 'NaN') max = '';
					if (min === '' || min === 'NaN') min = 0;
					if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

					// Change the value
					if ($this.hasClass('jws-qty-plus')) {
						if (max && (max == currentVal || currentVal > max)) {
							$qty.val(max);
						} else {
							$qty.val(currentVal + parseFloat(step));
							self.quantityInputsTriggerEvents($qty);
						}
					} else {
						if (min && (min == currentVal || currentVal < min)) {
							$qty.val(min);
						} else if (currentVal > 0) {
							$qty.val(currentVal - parseFloat(step));
							self.quantityInputsTriggerEvents($qty);
						}
					}

				});


			},
            /**
             *    Quantity inputs: Trigger events
             */
			quantityInputsTriggerEvents: function ($qty) {
				var self = this;
				// Trigger quantity input "change" event
				$qty.trigger('change');
				// Trigger custom event

			},
			menu_mobile: function () {
				if ($('.elementor-widget-Offcanvas .jws-offcanvas .jws-offcanvas-menu li').hasClass('current-menu-item')) {
					$('.elementor-widget-Offcanvas .jws-offcanvas .jws-offcanvas-menu li.current-menu-item').parents('.menu_has_shortcode').addClass('current-menu-parent');
				}
				var body = $("body"),
					dropDownCat = $(".elementor_jws_menu_layout_menu_vertical .menu-item-has-children ,.elementor_jws_menu_layout_menu_vertical .menu_has_shortcode"),
					elementIcon = '<button class="bt-sub-menu eci  linearicons-free-chevron-right"></button>',
					butOpener = $(".bt-sub-menu");
				$(elementIcon).insertAfter(dropDownCat.find('> a'));
				$(document).on("click", ".bt-sub-menu", function (e) {


					if ($(this).parent().hasClass("active")) {
						$(this).parent().removeClass("active").find("> ul").slideUp(400);
						$(this).parent().removeClass("active").find("> .sub-menu-dropdown, > .sub-menu").slideUp(400);
					} else {
						var s = $(this).parent().children("li.active");
						$(s).removeClass("active").children(">.mega-menu , >.sub-menu").slideDown(400);
						$(this).parent().addClass("active").find("> ul").slideDown(400);
						$(this).parent().addClass("active").find(">.sub-menu-dropdown, >.sub-menu").slideDown(400);
					}
				})
			},

			quickview: function () {
				// Open popup with product info when click on Quick View button

				$(document).on('click', '.product-eyes a', function (e) {
					e.preventDefault();
					var productId = $(this).data('product_id'),
						loopName = $(this).data('loop-name'),
						closeText = 'close_view',
						loadingText = 'loading_view',
						loop = $(this).data('loop'),
						prev = '',
						next = '',
						loopBtns = $('.quick-view').find('[data-loop-name="' + loopName + '"]'),
						btn = $(this);
					btn.addClass('loading');
					if (typeof loopBtns[loop - 1] != 'undefined') {
						prev = loopBtns.eq(loop - 1).addClass('quick-view-prev');
						prev = $('<div>').append(prev.clone()).html();
					}
					if (typeof loopBtns[loop + 1] != 'undefined') {
						next = loopBtns.eq(loop + 1).addClass('quick-view-next');
						next = $('<div>').append(next.clone()).html();
					}
					jwsThemeModule.quickViewLoad(productId, btn, prev, next, closeText, loadingText);
				});
			},

			quickViewLoad: function (id, btn, prev, next, closeText, loadingText) {
				var data = {
					id: id,
					action: "jws_ajax_load_product"
				};
				$.ajax({
					url: MS_Ajax.ajaxurl,
					data: data,
					method: 'get',
					success: function (data) {
						// Open directly via API

						$.magnificPopup.open({
							items: {
								src: '<div id="jws-quickview" class="mfp-with-anim popup-quick-view">' + data + '</div>', // can be a HTML string, jQuery object, or CSS selector
								type: 'inline'
							},
							tClose: closeText,
							tLoading: loadingText,
							removalDelay: 500, //delay removal by X to allow out-animation
							callbacks: {
								beforeOpen: function () {
									this.st.mainClass = 'mfp-zoom-in';
								},
								open: function () {
									$('.popup-quick-view').find('.variations_form').each(function () {
										$(this).wc_variation_form().find('.variations select:eq(0)').change();
										if (typeof $.fn.tawcvs_variation_swatches_form !== 'undefined') {
											$(this).tawcvs_variation_swatches_form();
										}
									});
									jwsThemeModule.quantityInputsBindButtons();
									$('.variations_form').trigger('wc_variation_form');
									$('body').trigger('jws-quick-view-displayed');
									$('.quick-view-gallery').slick();
								}
							},
						});
					},
					complete: function () {
						btn.removeClass('loading');
					},
					error: function () { },
				});
			},
		}
	}());


	var slider_testimonial = function ($scope, $) {
		$scope.find('.slider-for').eq(0).each(function () {
			var $this = $(this);
			$this.slick({
				asNavFor: '.slider-nav',
				adaptiveHeight: false,
				infinite: true,
				useTransform: false,
				speed: 400
			});
		});
		$scope.find('.slider-nav').eq(0).each(function () {
			var $this = $(this);
			$this.slick({
				arrows: false,
				asNavFor: '.slider-for',
				focusOnSelect: true,
				infinite: true
			});
		});

		$scope.find('.jws-testimonial').eq(0).each(function () {
			var $this = $(this);
			$this.find('.testimonial-listing').slick();
			if ($this.hasClass('layout-testimonial1')) {
				$this.find('.slide-content-testimonial').css('height', $(this).find('.slick-track').height() + 'px');
			}

		});
	}

	var team_slider = function ($scope, $) {
		$scope.find('.slide-team').eq(0).each(function () {
			var $this = $(this);
			$this.slick();
		});
        
        $scope.find('.jws-team.layout1 .team-item').each(function() {
            var $this = $(this);
                
                 $(this).hover(function(){
                   $(this).find(".bg-team").toggleClass('opened');
                   if($(this).find(".bg-team").hasClass('opened')) {
                        $this.find(".bg-team .team-icon-list a").delay(0).each(function(i) {
                        $(this).delay(100 * i).queue(function() {
                          $(this).addClass("show");
                          $(this).dequeue();
                        })
                      });
                   }else {
                        $(this).find(".team-icon-list a").removeClass('show');
                   }
                });
          
       	});
	}

	var testimonial_slider = function ($scope, $) {
		$scope.find('.jws-slide-testimonial').eq(0).each(function () {
			var $this = $(this);
			$this.slick();
		});
	}

	var testimonial_slider1 = function ($scope, $) {
		$scope.find('.jws-slide-testimonial1').eq(0).each(function () {
			var $this = $(this);
			$this.slick();
		});
	}

	var testimonial_slider2 = function ($scope, $) {
		$scope.find('.jws-slide-testimonial2').eq(0).each(function () {
			var $this = $(this);
			$this.slick();
		});
	}

	var testimonial_slider3 = function ($scope, $) {
		$scope.find('.jws-slide-testimonial3').eq(0).each(function () {
			var $this = $(this);
			$this.slick();
		});
	}

	var slide_services = function ($scope, $) {
		$scope.find('.jws-slide-services').eq(0).each(function () {
			var $this = $(this);
			$this.slick();
		});
	}

	var studies_slider = function ($scope, $) {
		$scope.find('.slide-studies').eq(0).each(function () {
			var $this = $(this);
			$this.slick();
		});
	}

	var post_slider = function ($scope, $) {
		$scope.find('.slide-post').eq(0).each(function () {
			var $this = $(this);
			$this.slick();
		});
	}
    /**
     *-------------------------------------------------------------------------------------------------------------------------------------------
     * video popup
     *-------------------------------------------------------------------------------------------------------------------------------------------
     */
	var video_popup = function ($scope, $) {
		$scope.find('.jws_video_popup').eq(0).each(function () {
			$(this).find('.jws_video_popup_inner').magnificPopup({
				delegate: 'a',
				type: 'image',
				removalDelay: 500, //delay removal by X to allow out-animation
				callbacks: {
					beforeOpen: function () {
						this.st.mainClass = 'mfp-fade-in-down';
					},
					elementParse: function (item) {
						item.type = 'iframe',
							item.iframe = {
								patterns: {
									youtube: {
										index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
										id: 'v=', // String that splits URL in a two parts, second part should be %id%
										// Or null - full URL will be returned
										// Or a function that should return %id%, for example:
										// id: function(url) { return 'parsed id'; } 
										src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
									},
									vimeo: {
										index: 'vimeo.com/',
										id: '/',
										src: '//player.vimeo.com/video/%id%?autoplay=1'
									}
								}
							}
					}
				},
			});
		})
	}
	//function progress elementor
	var progress = function ($scope, $) {

		$scope.find('.jws-progress').eq(0).each(function () {
			var $this = $(this);



			var cans = document.querySelectorAll('canvas');
			var device = $('body').data('elementor-device-mode');
			function cans_progress() {
				cans.forEach(can => {

					var
						spanProcent = can.nextElementSibling,
						c = can.getContext('2d'),
						width_canvas = 0,
						height_canvas = 0,
						line_canvas = 0;

					width_canvas = can.width;
					height_canvas = can.height;
					line_canvas = 10;



					var posX = width_canvas / 2,
						posY = height_canvas / 2,
						fps = 1000 / 200,
						procent = 0,
						oneProcent = 360 / 100,
						data_percent = can.getAttribute('data-percent'),
						data_title = can.getAttribute('data-title'),
						color1 = can.getAttribute('data-color1'),
						color2 = can.getAttribute('data-color2'),
						color3 = can.getAttribute('data-color3'),
						result = oneProcent * data_percent;

					c.lineCap = 'round';
					arcMove();

					function arcMove() {
						var deegres = 0;
						var radius = posX - 5;
						var gradient = c.createLinearGradient(0, 0, 0, 170);
						gradient.addColorStop("0.1", color1);
						gradient.addColorStop("1.0", color2);
						var acrInterval = setInterval(function () {
							deegres += 1;
							c.clearRect(0, 0, can.width, can.height);
							procent = deegres / oneProcent;

							spanProcent.innerHTML = data_title + '<p>' + procent.toFixed() + '</p>';

							c.beginPath();
							c.arc(posX, posY, radius, (Math.PI / 180) * 270, (Math.PI / 180) * (270 + 360));
							c.strokeStyle = color3;
							c.lineWidth = line_canvas;
							c.stroke();

							c.beginPath();
							c.strokeStyle = gradient;
							c.lineWidth = line_canvas;
							c.arc(posX, posY, radius, (Math.PI / 180) * 270, (Math.PI / 180) * (270 + deegres));
							c.stroke();
							if (deegres >= result) clearInterval(acrInterval);
						}, fps);

					}
				});

			};

			$this.appear(function () {
				cans_progress();
			});


		});
	}
	var jws_service = function ($scope, $) {
		$scope.find('.elementor-widget-container').eq(0).each(function () {

			var $this = $(this);
			$this.find('.jws-services').hover(function () {
				$this.find('.jws-services .service-item').removeClass("active");
				$(this).addClass("active");
			});
			masonryaction();
		});
	}
	//masonry
	function masonryaction() {
		var el = $('.jws-masonry');

		el.each(function (i, val) {

			var $this = $(this);
			$this.imagesLoaded(function () {

				$this.isotope({
					itemSelector: '.service-item',
					masonry: {
						initLayout: false,
						horizontalOrder: true,

					},

				});
			});

		});

	}
    /**
  *-------------------------------------------------------------------------------------------------------------------------------------------
  * Tabs
  *-------------------------------------------------------------------------------------------------------------------------------------------
  */
	var jws_tabs = function ($scope, $) {
		$scope.find('.jws_tab_wrap').eq(0).each(function () {
			var $this = $(this);

			/* Line magic tabs filter */
			var leftPos, newWidth, $magicLine;
			if ($this.find('.tab_nav').length) {
				$this.find('.tab_nav').append("<li id='magic_line'></li>");
				$magicLine = $this.find('#magic_line');
				$magicLine
					.width($this.find('.current').width())
					.height($this.find('.tab_nav').height())
					.css('left', $this.find('.current a').position().left)
					.data('origLeft', $magicLine.position().left)
					.data('origWidth', $magicLine.width())
				$this.find('.tab_nav li a').on("click", function (e) {
					e.preventDefault();
					var $this = $(this);
					$(document).trigger('resize');
					$magicLine
						.data('origLeft', $this.position().left)
						.data('origWidth', $this.parent().width())
					return false;
				});

				/*Magicline hover animation*/
				$this.find('.tab_nav li').find('a').click(function () {
					$magicLine.css({
						"left": $magicLine.data('origLeft'),
						"width": $magicLine.data('origWidth'),
					});
				});
			}

			$('.tab_nav li a').click(function (e) {
				e.preventDefault();
				var tab_id = $(this).attr('data-tab');

				$('.tab_nav li a').parent().removeClass('current');
				$('.jws_tab_item').removeClass('current');

				$(this).parent().addClass('current');
				$("#" + tab_id).addClass('current');
			})

		});
	}
	//function gallery case study elementor
	var case_study_gallery = function ($scope, $) {
		$scope.find('.elementor-widget-container').eq(0).each(function () {
			var $this = $(this);
			$this.find(".case_study-item").each(function () {

				var $case_study_tem = $(this);
				$case_study_tem.find('.btn-block').click(function () {
					var id_casestudy = $(this).attr("data-id");
					var closeText = 'close_view',
						loadingText = 'loading_view';



					$.ajax({
						type: 'post',
						dataType: 'html',
						url: MS_Ajax.ajaxurl,
						data: { action: "gallery_popup123", id: id_casestudy },
						success: function (response) {
							//$( "#popup-show" ).html(response);
							$.magnificPopup.open({
								items: {
									src: '<div id="case-study-gallery" class="mfp-with-anim">' + response + '</div>', // can be a HTML string, jQuery object, or CSS selector
									type: 'inline'
								},
								tClose: closeText,
                                preloader: false,
								tLoading: loadingText,
							     centerPadding: '0px',
								callbacks: {
									beforeOpen: function () {
										this.st.mainClass = 'mfp-zoom-in';
									},
									open: function () {

										$('.gallery-listing').slick({
											infinite: true,
											slidesToShow: 1,
                                            centerMode: true,
                                            arrows:true,
                                            dots:false,
										
										});
									}
								},
							});

						},
						error: function (jqXHR, textStatus, errorThrown) {
							console.log("error");
						}
					});
				});
				$case_study_tem.find('.close-btn').click(function () {
					$case_study_tem.find(".popup-image-gallery").removeClass("active");
				});
			});
		});
	}
    /**
       *-------------------------------------------------------------------------------------------------------------------------------------------
       * Time Line
       *-------------------------------------------------------------------------------------------------------------------------------------------
       */
	var timeline = function ($scope, $) {
		if ('undefined' == typeof $scope)
			return;

		$scope.find('.jws_timeline').eq(0).each(function () {
			var $this = $(this),
				field = $this.find('.jws_timeline_field'),
				line = $this.find('.jws_timeline_line'),
				circle = $this.find('.jws_timeline_circle'),
				timeline_start_icon = circle.first().position();
			line.css('top', timeline_start_icon.top + 7);
			field.each(function () {
				$(this).appear(function () {
					$(this).addClass('animation_show');
				});
			});
		});

	}
    /**
       *-------------------------------------------------------------------------------------------------------------------------------------------
       * service_slider
       *-------------------------------------------------------------------------------------------------------------------------------------------
       */
	var jws_service_slider = function ($scope, $) {
		$scope.find('.jws-services').eq(0).each(function () {
			var $this = $(this);
			$this.find('.layout-service1 .service-item').hover(function () {
				$this.find('.layout-service1 .service-item').removeClass("active");
				$(this).addClass("active");
			});
			$this.find('.layout-service3 .service-item').hover(function () {
				$this.find('.layout-service3 .service-item').removeClass("active");
				$(this).addClass("active");
			});

			$(this).find('.slider').not('.slick-initialized').slick();
		});
	}
    /**
    *-------------------------------------------------------------------------------------------------------------------------------------------
    * search
    *-------------------------------------------------------------------------------------------------------------------------------------------
    */
	var jws_search = function ($scope, $) {
		$scope.find('.jws-search-form').eq(0).each(function () {
			var $this = $(this);
			$this.on('click', '.toggle-search', function (e) {
				e.preventDefault();
				$this.find('.searchform').addClass('active');
			});
			$this.on('click', '.close-search', function (e) {
				e.preventDefault();
				$this.find('.searchform').removeClass('active');
			});
		});
	}
	/// menu
	var jws_menu_style = function ($scope, $) {
		if ('undefined' == typeof $scope) {
			return;
		}
		$scope.find('.jws_main_menu').eq(0).each(function () {
			var $this = $(this);

			$(window).load(function () {

				var main = $this.find(".jws_nav"),

					curent_item = main.find('> li.current-menu-item'),
					curent_item_sub = main.find('ul li.current-menu-item');
				if (main.find('> li.current-menu-item').length == 0) {
					if (curent_item_sub.length > 0) {
						curent_item = curent_item_sub.parents('.jws_nav > li');
					} else {
						curent_item = main.find('> li:first-child');
					}

				}
				var pos = curent_item.width() / 2;
				/* Line magic tabs filter */
				var $magicLine;

				if (main.length) {
					main.append("<span id='magic_line'></span>");
					$magicLine = $this.find('#magic_line');
					$magicLine
						.css('left', (curent_item.position().left + pos))
						.data('origLeft', ($magicLine.position().left))

					/*Magicline hover animation*/

					main.find('> li').hover(function () {
						var $thisBar = $(this),
							decv = $thisBar.width() / 2,
							leftPos = $thisBar.position().left + decv;
						$magicLine.css({
							"left": leftPos,
						});
					}, function () {
						$magicLine.css({
							"left": (curent_item.position().left + pos),
						});
					});
				}
			});
		});
	}
	// Login Form
	var login_form = function ($scope, $) {
		$scope.find('#jws-popup-login').eq(0).each(function () {
			$('.toggle-password').on('click', function () {
				$(this).toggleClass('icomoon-eye-blocked');
				var password = $(this).parent().find('.pwd');
				var password_repeat = $(this).parent().find('#repeat_pwd');
				if (password.attr('type') == 'password') {
					password.attr('type', 'text');
				}
				else {
					password.attr('type', 'password');
				}
				if (password_repeat.attr('type') == 'password') {
					password_repeat.attr('type', 'text');
				}
				else {
					password_repeat.attr('type', 'password');
				}
			});

			$('#jws-popup-login').eq(0).each(function () {
				$(this).find('form[name=loginpopopform]').on('submit', function (event) {
					event.preventDefault();
					var valid = true,
						email_valid = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
					$(this).find('input.required').each(function () {
						// Check empty value
						if (!$(this).val()) {
							$(this).addClass('invalid');
							valid = false;
						}
						// Uncheck
						if ($(this).is(':checkbox') && !$(this).is(':checked')) {
							$(this).addClass('invalid');
							valid = false;
						}
						// Check email format
						if ('email' === $(this).attr('type')) {
							if (!email_valid.test($(this).val())) {
								$(this).addClass('invalid');
								valid = false;
							}
						}
					});
					$(this).find('input.required').on('focus', function () {
						$(this).removeClass('invalid');
					});
					if (!valid) {
						return valid;
					}
					var form = $(this),
						$elem = $('#jws-popup-login .jws-login-container'),
						wp_submit = $elem.find('input[type=submit]').val();
					$elem.addClass('loading');
					$elem.find('.message').slideDown().remove();
					var data = {
						action: 'jws_login_ajax',
						data: form.serialize() + '&wp-submit=' + wp_submit,
					};
					$.post(MS_Ajax.ajaxurl, data, function (response) {
						try {
							response = JSON.parse(response);
							$elem.find('.jws-login').append(response.message);
							if (response.code == '1') {
								if (response.redirect) {
									if (window.location.href == response.redirect) {
										location.reload();
									} else {
										window.location.href = response.redirect;
									}
								} else {
									location.reload();
								}
							} else {
								var $captchaIframe = $('#jws-popup-login .gglcptch iframe');
								if ($captchaIframe.length > 0) {
									$captchaIframe.attr('src', $captchaIframe.attr('src')); // reload iframe
								}
							}
						} catch (e) {
							return false;
						}
						$elem.removeClass('loading');
					});
					return false;
				});
				$(this).find('form[name=registerformpopup]').on('submit', function (e) {
					e.preventDefault();
					var valid = true,
						email_valid = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
					$(this).find('input.required').each(function () {
						// Check empty value
						if (!$(this).val()) {
							$(this).addClass('invalid');
							valid = false;
						}
						// Uncheck
						if ($(this).is(':checkbox') && !$(this).is(':checked')) {
							$(this).addClass('invalid');
							valid = false;
						}
						// Check email format
						if ('email' === $(this).attr('type')) {
							if (!email_valid.test($(this).val())) {
								$(this).addClass('invalid');
								valid = false;
							}
						}

					});
					$(this).find('input.required').on('focus', function () {
						$(this).removeClass('invalid');
					});
					if (!valid) {
						return valid;
					}
					var $form = $(this),
						data = {
							action: 'jws_register_ajax',
							data: $form.serialize() + '&wp-submit=' +
								$form.find('input[type=submit]').val(),
							register_security: $form.find('#register_security').
								val(),
						},
						redirect_url = $form.find('input[name=redirect_to]').val(),
						$elem = $('#jws-popup-login .jws-login-container');
					$elem.addClass('loading');
					$elem.find('.message').slideDown().remove();
					$.ajax({
						type: 'POST',
						url: MS_Ajax.ajaxurl,
						data: data,
						success: function (response) {
							$elem.removeClass('loading');
							$elem.find('.popup-message').html(response.data.message);

							if (response.success === true) {
								$elem.find('.jws-register').html(response.data.message);
							}

						},
					});
				});

				// Check Strong Passwoed /
				$(this).find('.jws-register input[name="password"]').keyup(function () {
					checkpassword($(this).val());
				});

				function checkpassword(password) {
					var strength = 0,
						meter = $('.meter'),
						meter_text = $('.text-meter'),
						password_hint = $('.jws-password-hint'),
						btn_submit = $('input[name="wp-submit"]');

					if (password.match(/[a-z]+/)) {
						strength += 1;
					}
					if (password.match(/[A-Z]+/) && password.length >= 8) {
						strength += 1;
					}
					if (password.match(/[0-9]+/) && password.length >= 12) {
						strength += 1;
					}
					if (password.match(/[$@#&!]+/) && password.length >= 14) {
						strength += 1;

					}

					if (password.length > 0) {
						meter.show();
						password_hint.show();
						btn_submit.attr("disabled", "disabled");
					} else {
						meter.hide();
						password_hint.hide();
					}
                    console.log(Verify_Ajax.metera);

					switch (strength) {
						case 0:
							meter_text.html("");
							meter.attr("meter", "0");
							break;

						case 1:
							meter_text.html(Verify_Ajax.metera);
							meter.attr("meter", "1");
							break;

						case 2:
							meter_text.html(Verify_Ajax.meterb);
							meter.attr("meter", "2");
							btn_submit.removeAttr("disabled");
							break;

						case 3:
							meter_text.html(Verify_Ajax.meterc);
							meter.attr("meter", "3");
							btn_submit.removeAttr("disabled");
							password_hint.hide();
							break;

						case 4:
							meter_text.html(Verify_Ajax.meterd);
							meter.attr("meter", "4");
							btn_submit.removeAttr("disabled");
							password_hint.hide();
							break;
					}
				}
				$('#jws-popup-login .link-bottom a.login').on('click', function (e) {
					e.preventDefault();
					$('.jws-login').addClass('active');
					$('.jws-register').removeClass('active');
				});
				$('#jws-popup-login .link-bottom a.register').on('click', function (e) {
					e.preventDefault();
					$('.jws-register').addClass('active');
					$('.jws-login').removeClass('active');
				});
			});

		});
	}
	// Make sure you run this code under Elementor..

	$(window).on('elementor/frontend/init', function () {
		var widgets = {

			'Jws-Testimonial.default': slider_testimonial,
			'jws-teams.default': team_slider,
			'Jws-slide.default': testimonial_slider,
			'Jws-services-slide.default': slide_services,
			'jws-services.default': jws_service,
			'jws_login_form.default': login_form,
			'jws-studies-slide.default': studies_slider,
			'jws_tab.default': jws_tabs,
			'jws-slide-post.default': post_slider,
			'jws_timeline.default': timeline,
			'jws_progress.default': progress,
			'jws-case_study.default': case_study_gallery,
			'jws-services.default': jws_service_slider,
			'jws_menu_nav.default': jws_menu_style,
			'jws_search.default': jws_search,
			'jws_video_popup.default': video_popup,
		};

		$.each(widgets, function (widget, callback) {
			if ('object' === typeof callback) {
				$.each(callback, function (index, cb) {
					elementorFrontend.hooks.addAction('frontend/element_ready/' + widget, cb);
				});
			} else {
				elementorFrontend.hooks.addAction('frontend/element_ready/' + widget, callback);
			}
		});
	});

	$(window).load(function () {
		$('.jws-loader').addClass('loaded');
		$('.animation_loading_js::before').fadeOut(500);
		$('.animation_loading_js::after').fadeOut(500);
		$('.loaded').fadeOut(1000);
	});

})(jQuery);



jQuery(document).ready(function () {

	jwsThemeModule.init();

});

