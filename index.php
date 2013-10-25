<!DOCTYPE html>
<html lang="ru">
	<head>
    	<meta content="text/html; charset=UTF-8">
    	<title>Slider</title>
    	<script src="http://code.jquery.com/jquery-latest.js"></script>
    	<script>    		
    		$(function () {
    			var countImg = 5,
    				indexImg = 1,
    				indexImgLoad = 2,
    				pathImg = '/slider/img/slider/',
    				formatImg = 'jpg',
    				controlFlag = 1,
    				elWrap = $('#slider'),
					el =  elWrap.find('img');
				function create () {
					Img = new Image(); 
					Img.src= pathImg+indexImg+'.'+formatImg;						
					$(Img).appendTo($("#slides"));
					$('<span class="next"></span><span class="prev"></span>').appendTo($("#slider"));
					navigation();
					check();
				}
				function change () {
					el.fadeOut(500);
					el.filter(':nth-child('+indexImg+')').fadeIn(500);
				}
				function newimg() {
					nextImg = new Image(); 
					nextImg.src= pathImg+indexImgLoad+'.'+formatImg;						
					$(nextImg).appendTo($("#slides"));
				}
				function check() {
					if (controlFlag && indexImgLoad <= countImg) {
						newimg();		
					}
					if (controlFlag){
						el =  elWrap.find('img');
					}
					if (el.length == countImg){	
						controlFlag = 0;
					}
				}
				function navigation(){
					$('span.next').click(function() {
						indexImg++;
						indexImgLoad++;
						if(indexImg > countImg) {
							indexImg = 1;
						}
						check();
						change();
					});
					$('span.prev').click(function() {
						indexImg--;					
						if(indexImg < 1) {
							indexImg = countImg;
						}
						indexImgLoad++;
						check();
						change ();
					});	
				}
				var loadSlider = 1;
				window.onscroll = function() {				
			  		var pageY = window.pageYOffset || document.documentElement.scrollTop,
			    	heightScreen = window.innerHeight + pageY;
			    	sliderTopY = $("#slides").offset().top;
			    	if ((heightScreen > (sliderTopY - sliderTopY * 0.05)) && loadSlider) {
						loadSlider = 0;
						create();
					} 
				}
			});
			
    	</script>
    	<style>
    		.slider_wrap {
				margin: 0px auto 0;
				width: 735px;
				height: 200px;
				position: relative;
				overflow: hidden;
			}
			.slider_wrap img {
				width: 645px;
				height: auto;
				display: none;
				position: absolute;
				top: 0;
				left: 45px;	
			}
			.slider_wrap img:first-child {
				display: block;
			}
			.slider_wrap span {
				width: 45px;
				height: 200px;
				display: block;
				position: absolute;
				cursor: pointer;
				background: url(/img/rotator_buttons.png) no-repeat;
				opacity: 0.7;
			}
			.slider_wrap span.next {
				right: 0;
				background-position: -45px 0;
			}
			.slider_wrap span.next:hover, span.prev:hover {
				opacity: 1.0;
			}
			.slider_wrap span.prev {
				background-position: 0 0;
			}
    	</style>
	</head>
	<body>
		<div style="height:1800px;">div: height = 1800px</div>
		<div id="slider" class="slider_wrap">
			<div id="slides">
			</div>			
		</div>
	</body>
</html>