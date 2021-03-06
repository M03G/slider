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
		$('<img/>').attr('src', pathImg+indexImg+'.'+formatImg).appendTo($("#slides"));
		$('<span class="next"></span><span class="prev"></span>').appendTo($("#slider"));
		navigation();
		check();
	}
	function change () {
		el.fadeOut(500);
		el.filter(':nth-child('+indexImg+')').fadeIn(500);
	}
	function newimg() {
		$('<img/>').attr('src', pathImg+indexImgLoad+'.'+formatImg).appendTo($("#slides"));
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
		elWrap.find('span.next').click(function() {
			indexImg++;
			indexImgLoad++;
			if(indexImg > countImg) {
				indexImg = 1;
			}
			check();
			change();
		});
		elWrap.find('span.prev').click(function() {
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