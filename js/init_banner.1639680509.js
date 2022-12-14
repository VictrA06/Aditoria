$(document).ready(function(){
	
	

		
		/*var browserMenu  =  window.outerHeight-window.innerHeight;
		
		$('#banner').css({
			height:'calc(50vw - '+browserMenu+'px)'
		});*/
		
		
		$('#background').bgRotator({
			'duration' : 1000,
			'delay': 5000,
			'height': '100%',
			'width':'100%',
			'bgSize': 'cover', /* auto | 100% | cover | contain */
			'bgRepeat':'no-repeat',
			'bgTop':0,
			'bgLeft':0,
			'captions':true,
			'capContent':'.link',
			'capClass':'callout',
			'navigation':true,
			'mouseoverstop':true,
			'navClass':'bulletBanner',
			'arrows':false,
			'arrowR':'<i class="fa fa-angle-right arrowNav arrowNav_l"></i>',
			'arrowL':'<i class="fa fa-angle-left arrowNav arrowNav_r"></i>',
			'parallax':0,
			'lazy':true,
			'responsive':false
		});

});