
(function($) {
	
		'use strict';
	
			var AdminBuilder = function(){
				
				var checkSelectorExistence = function(selectorName) {
				  if(jQuery(selectorName).length > 0){return true;}else{return false;}
				};
				
				var searchToggle = function() {
				  $(".ttr-search-toggle").on("click", function(e) {
					e.preventDefault();
					$(".ttr-search-bar").toggleClass("active");
				  })
				};
				
				var closeNav = function() {
				  $(".ttr-overlay, .ttr-sidebar-toggle-button").on("click", function() {
					$("body").removeClass("ttr-opened-sidebar"), $("body").removeClass("ttr-body-fixed");
				  })
				};
				
				var leftSidebar = function() {
					
					$(".ttr-toggle-sidebar").on("click", function() {
						if($("body").hasClass("ttr-opened-sidebar")){
						  $("body").removeClass("ttr-opened-sidebar"), $("body").removeClass("ttr-body-fixed");
						}else{
						  $(window).width() < 760 && $("body").addClass("ttr-body-fixed"), $("body").addClass("ttr-opened-sidebar");
						}
					});

					$(".ttr-sidebar-pin-button").on("click", function() {
						$("body").toggleClass("ttr-pinned-sidebar");
					});
					
					$(".ttr-sidebar-navi li.show > ul").slideDown(200);
					$(".ttr-sidebar-navi a").on("click", function(e) {
						var a = $(this);
						$(this).next().is("ul") ? (e.preventDefault(), a.parent().hasClass("show") ? (a.parent().removeClass("show"), a.next().slideUp(200)) : (a.parent().parent().find(".show ul").slideUp(200), a.parent().parent().find("li").removeClass("show"), a.parent().toggleClass("show"), a.next().slideToggle(200))) : (a.parent().parent().find(".show ul").slideUp(200), a.parent().parent().find("li").removeClass("show"), a.parent().addClass("show"))
					});
				  
				};
				
				var waveEffect = function(e, a) {
				  var s = ".ttr-wave-effect",
						n = e.outerWidth(),
						t = a.offsetX,
						i = a.offsetY;
					e.prepend('<span class="ttr-wave-effect"></span>'), $(s).css({
						top: i,
						left: t
					}).animate({
						opacity: "0",
						width: 2 * n,
						height: 2 * n
					}, 500, function() {
						e.find(s).remove()
				  });
				};
				
				var materialButton = function() {
					$(".ttr-material-button").on("click", function(e) {
						waveEffect($(this), e)
					});
				}
				
				var headerSubMenu = function() {
					$(".ttr-header-submenu").show();
					$(".ttr-header-submenu").parent().find("a:first").on("click", function(e) {
						e.stopPropagation();
						e.preventDefault();
						$(this).parents(".ttr-header-navigation").find(".ttr-header-submenu").not($(this).parents("li").find(".ttr-header-submenu")).removeClass("active");
						$(this).parents("li").find(".ttr-header-submenu").show().toggleClass("active");
					});
					$(document).on("click", function(e) {
						var a = $(e.target);
						!0 === $(".ttr-header-submenu").hasClass("active") && !a.hasClass("ttr-submenu-toggle") && a.parents(".ttr-header-submenu").length < 1 && $(".ttr-header-submenu").removeClass("active"), a.parents(".ttr-search-bar").length < 1 && !a.hasClass("ttr-search-bar") && !a.parent().hasClass("ttr-search-toggle") && !a.hasClass("ttr-search-toggle") && $(".ttr-search-bar").removeClass("active")
					});
				}
				
				var displayGraph = function() {
					if(!checkSelectorExistence('#chart')){return;}
					Chart.defaults.global.defaultFontFamily = "rubik";
					Chart.defaults.global.defaultFontColor = '#999';
					Chart.defaults.global.defaultFontSize = '12';

					var ctx = document.getElementById('chart').getContext('2d');

					var chart = new Chart(ctx, {
						type: 'line',

						// The data for our dataset
						data: {
							labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
							// Information about the dataset
							datasets: [{
								label: "Views",
								backgroundColor: 'rgba(0,0,0,0.05)',
								borderColor: '#4c1864',
								borderWidth: "3",
								data: [196,132,215,362,210,252, 100, 250, 10, 300, 420, 199],
								pointRadius: 4,
								pointHoverRadius:4,
								pointHitRadius: 10,
								pointBackgroundColor: "#fff",
								pointHoverBackgroundColor: "#fff",
								pointBorderWidth: "3",
							}]
						},

						// Configuration options
						options: {

							layout: {
							  padding: 0,
							},

							legend: { display: false },
							title:  { display: false },

							scales: {
								yAxes: [{
									scaleLabel: {
										display: false
									},
									gridLines: {
										 borderDash: [6, 6],
										 color: "#ebebeb",
										 lineWidth: 1,
									},
								}],
								xAxes: [{
									scaleLabel: { display: false },  
									gridLines:  { display: false },
								}],
							},

							tooltips: {
							  backgroundColor: '#333',
							  titleFontSize: 12,
							  titleFontColor: '#fff',
							  bodyFontColor: '#fff',
							  bodyFontSize: 12,
							  displayColors: false,
							  xPadding: 10,
							  yPadding: 10,
							  intersect: false
							}
						},
				});
				
				}
				
				return {
					initialHelper:function(){
						searchToggle();
						closeNav();
						leftSidebar();
						materialButton();
						headerSubMenu();
						displayGraph();
					}
				}
				
		}(jQuery);
		
	/* jQuery ready  */	
	jQuery(document).on('ready',function() {AdminBuilder.initialHelper();});
})(jQuery);