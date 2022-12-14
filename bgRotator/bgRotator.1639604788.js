/*
Background Rotator v 5.5 June 24th 2016
by Eduardo Ponce de Leon - http://www.multimediaxp.com

Licensed under the Creative Commons Attribution 2.5 License - http://creativecommons.org/licenses/by/2.5/
- free for use in both personal and commercial projects
- attribution requires leaving author name, author link, and the license info intact
V 5.5 June 24th 2016 (Happy Bday preciosa)
  - New responsive option (beta)
  - z-index problem fixed
V 5.4 June 13th 2016
  - New navClass_On for selected bullet of navigation.
  - fixed the -10 z-index error
V 5.3 June 18th 2015
	- Fixed hover in / out bug that changes banner image right away
V 5.2 April 3rd 2015
	- Align BG center for parallax when top or left are 0
V 5.1 March 24th 2015
	- Fixed Bug for Backgrounds not at the top of the page
	- Allows Parallax in any height of the page
v 5.0 February 8th 2015 (HAPPY BDAY ANDRES!!!!)
	- Fixed bug for non absolute banners. position option now available.
	- NEW: bullets navigation added: navigation:false, navClass:null (defaults)
	- NEW: on mouseover stop: mouseoverstop:true (default)
	- NEW: links to banner images enabled
v 4.4 February 4th 2015
	- z-index bug fixed when there was only one image
v 4.3 February 3rd 2015
	- Allows parallax to have top and left position.
	- Set arrows: arrowR and arrowL pass HTML, default null for both (use figure)
	- previous click missing image bug fixed
v 4.2 November 1st 2014
	- bgCover option replaced by bgSize: default is auto (auto | % | contain | cover)
v 4.1 October 22nd 2014
	- parallax option (0 to 100) 0  by default, adds a background-attachment:fixed and parallax effect with intensity 0 - 10, 0  no effect, 1 is the fastest and 100 the slowest closer to completely fixed.
	- improve performance by using fadeTo instead of fadeIn and fadeOut
v 4.0 October 20th 2014
	- Arrows option (next and previous image), boolean (arrows:true)
V 3.1 August 14th 2014
	-Bug fixed for multiple Custom HTML for captions
V 3.0 July 20th 2014
	-Add Custom HTML to each caption (capContent), give the class of the elements containing the HTML.
	-capClass changed for capClass
	-capDefault removed, if capClass is not set default styles are used and class "captionsBgRotator" is set
v 2.1 May 22nd 2014:
	-Fixes flashy effect when there is only one image
V 2.0 Jan 23 2014:
	-Allows to modify caption defaults and assign a class to captions
V 1.0 April 2013
	- Create full screen backgrounds and rotate them automatically


Background Rotator Description
=================
Inserts a set of images as a background of an element and rotates
them with a fade effect during a specific delay. Apply the method bgRotator() to the element that
contains images as children, those images will be inserted as backgrounds of the parent element.

- If each banner will display captions content, use the captions options to true to use the title content
of your images.

- You can add your own class to the captions by using the capClass option.

- NEW: Add HTML content to each banner instead of captions from title. Simply add elements after the images with
the same class, make sure that there are the same number of HTML captions as images to match. use the capContent
option to set this feature.


Background Rotator Options
=================
bgRotator
- constructor
- duration: 500 (default), in milliseconds, fadeIn-FadeOut duration time
- delay: 5 seconds(default), in milliseconds, Delay between switch of each background image
- bgSize: auto (default), (auto | % | contain | cover).
- height: 100%(default), or px size.
- width: 100%(default), or px size.
- bgRepeat: no-repeat (default), repeat-x, repeat-y, (bgCover must be false)
- bgTop: 0px, (default), top  px position. ex. (150px);
- bgLeft: 0px, (default), top  px position. ex. (150px);
- captions: false(default), true, shows a caption of the image taken from the image title.
- capClass: caption class name, overwrites default styles:
	background:rgba(0,0,0,0.6);
	color:#EEE;
	position:absolute;
	bottom:0; right:0;
	padding:6px 15px;
	font-style:italic;
	font-size:12px;
	font-family:Arial
- capContent: false (default), change for your own HTML content to show instead of the caption text
- arrows:false (default)
- parallax:0 (default)

Suggestions / Contact us
=================
http://www.multimediaxp.com

*/

/*Global Vars*/
var BGinit = false;
var BGstop = false;
var BGelm;
var BGindex;
var BGtime;
var BGduration;
var BGtimeout;
var hideall;
var BGdefaults;
var navBullets;
var bullets;
var arrow1;
var arrow2;
var bullOnClass;
var avgHeight = 0;
var avgWidth = 0;

(function( $ ){
   $.fn.bgRotator = function(jsonObj) {
	   //HIDE and Overflow
	   $(this).css({
		   'overflow':'hidden',
		   'opacity':'0'
	   });
		//Defaults
		BGdefaults = ({
			'duration' : 500,
			'delay': 5000,
			'height': '100%',
			'width': '100%',
			'bgSize': 'auto',
			'bgRepeat':'no-repeat',
			'bgPosition':'center center',
			'position':'absolute',
			'bgTop':0,
			'bgLeft':0,
			'captions':false,
			'capContent':false,
			'capClass':false,
			'navigation':false,
			'mouseoverstop':true,
			'navClass':null,
			'arrows':false,
			'arrowR':null,
			'arrowL':null,
			'parallax':1,
			'lazy':false,
			'responsive':true
		});
		//Over-write Defaults
		for (var key in jsonObj) {
			for (var key2 in BGdefaults) {
				if(key == key2){
					BGdefaults[key2] = jsonObj[key];
				}
			}
		}
	if(BGdefaults.capContent !== false){
		$('img', this).not(BGdefaults.capContent+" img").each(function(index){
			if(index === 0){
				avgHeight = $(this).height();
				avgWidth = $(this).width();
			}else{
				avgHeight = (avgHeight+$(this).height())/2;
				avgWidth = (avgWidth+$(this).width())/2;
			}

			var link = false;
			var hrefClick = '';
			if($(this).parent().prop("tagName") == "A"){
				link =true;
				var href = $(this).parent().attr('href');
				hrefClick="onclick=\"window.location='"+href+"'\"";

			}
			if(BGdefaults.lazy){
				var bg = $(this).data('src');
			}else{
				var bg = $(this).attr('src');
			}
			
			var caption = $(BGdefaults.capContent+':eq(0)').html();
			var capClass = $(BGdefaults.capContent+':eq(0)').attr('class');
			$(BGdefaults.capContent+':eq(0)').remove();
			// eq(0) since we always delete the first one and the length decreases

			var cap_elm = '';

			if(BGdefaults.captions){
				cap_elm = '<span class="'+capClass+'">'+caption+'</span>';
			}
			if(link){
				$(this).parent().parent().append('<div style="cursor:pointer; background-image:url('+bg+')" '+hrefClick+' >'+cap_elm+'</div>');
				$(this).parent().remove();
				//$(this).remove();
			}else{
				$(this).parent().append('<div style="background-image:url('+bg+')" '+hrefClick+' >'+cap_elm+'</div>');
				$(this).remove();
			}
		});
	}else{
		$('img', this).each(function(index){

			if(index === 0){
				avgHeight = $(this).height();
				avgWidth = $(this).width();
			}else{
				avgHeight = (avgHeight+$(this).height())/2;
				avgWidth = (avgWidth+$(this).width())/2;
			}

			var link = false;
			var hrefClick = '';
			if($(this).parent().prop("tagName") == "A"){
				link =true;
				var href = $(this).parent().attr('href');
				hrefClick="onclick=\"window.location='"+href+"'\"";

			}
			
			if(BGdefaults.lazy){
				var bg = $(this).data('src');
			}else{
				var bg = $(this).attr('src');
			}
			
			var caption = $(this).attr('title');
			var cap_elm = '';

			if(BGdefaults.captions){

				if(BGdefaults.capClass === false){
					cap_elm = '<span class="captionsBgRotator" style=" color:#D60762; position:absolute; top:50%; right:60px; padding:6px 15px;font-size:50px; font-family:Arial; font-weight:bold">'+caption+'</span>';
				}else{
					cap_elm = '<span class="'+BGdefaults.capClass+'">'+caption+'</span>';
				}
			}
			if(link){
				$(this).parent().parent().append('<div style="cursor:pointer; background-image:url('+bg+')" '+hrefClick+'>'+cap_elm+'</div>');
				$(this).parent().remove();
			}else{
				$(this).parent().append('<div style="background-image:url('+bg+')" '+hrefClick+'>'+cap_elm+'</div>');
				$(this).remove();
			}
		});

	}

	if(BGdefaults.parallax === 0){
		$(this).css({
			'width':BGdefaults.width,
			'height':BGdefaults.height,
			'position':BGdefaults.position,
			'top':BGdefaults.bgTop,
			'left':BGdefaults.bgLeft
		});
	}else{
		$(this).css({
		'width':BGdefaults.width,
		'height':BGdefaults.height,
		'position':'absolute',
		'top':0,
		'left':0
	});
	}

	if(BGdefaults.bgSize != 'auto'){
		$('div', this).css({
			'background-repeat':BGdefaults.bgRepeat,
			'background-position':BGdefaults.bgPosition,
			'background-size':BGdefaults.bgSize
		});
	}else{
		$('div', this).css({
			'background-repeat':BGdefaults.bgRepeat
		});
	}
	var bgposY;
	if(BGdefaults.parallax > 0){

		bgposY = BGdefaults.bgLeft;
		if(BGdefaults.bgLeft === 0){
			bgposY = 'center';
		}


		$('div', this).css({
			'background-attachment':'fixed',
			'background-position':bgposY+' '+BGdefaults.bgTop
		});

		var intensity = BGdefaults.parallax;
		var BG_elmnt = $('div', this);
		var getPos = $(BG_elmnt).offset().top;

		var scrollPos = ($(document).scrollTop() - getPos);
		motion = parseInt(BGdefaults.bgTop)-(Math.round((scrollPos/(intensity+1)),0));
		$(BG_elmnt).css({
			'background-position':bgposY+' '+motion+'px'
		});

		$(window).scroll(function(){
			var scrollPos = ($(document).scrollTop() - getPos);
			motion = parseInt(BGdefaults.bgTop)-(Math.round((scrollPos/(intensity+1)),0));
			$(BG_elmnt).css({
				'background-position':bgposY+' '+motion+'px'
			});
		});
	}

	if(BGdefaults.arrows && $('div', this).length > 1){
		if(BGdefaults.arrowR === null){
			arrow1 = '<figure style="cursor:pointer; position:absolute; padding:10px; color:#FFF; font-size:40px; background:rgba(0,0,0,0.7); right:0; top:50%; z-index:10; transform:translate(0,-50%); -webkit-transform:translate(0,-50%)" onclick="BGnextBtn()">&gt;</figure>';
		}else{
			arrow1 = $(BGdefaults.arrowR).bind('click',function(){
				BGnextBtn();
			}).css({
        'z-index':10
      });
		}
		if(BGdefaults.arrowL === null){
			arrow2 = '<figure style="cursor:pointer; position:absolute; padding:10px; color:#FFF; font-size:40px; background:rgba(0,0,0,0.7); left:0; top:50%; z-index:10; transform:translate(0,-50%); -webkit-transform:translate(0,-50%)" onclick="BGprevBtn()">&lt;</figure>';
		}else{
			arrow2 = $(BGdefaults.arrowL).bind('click',function(){
				BGprevBtn();
			}).css({
        'z-index':10
      });
		}
		$(this).prepend(arrow2);
		$(this).prepend(arrow1);
	}

	$('div', this).css({
		'width':BGdefaults.width,
		'height':BGdefaults.height,
		'position':'absolute',
		'top':0,
		'left':0,
		'opacity':'0',
		'display':'none'
	});

	BGelm = $('div', this);
	navBullets = BGdefaults.navigation;

	if(navBullets){
		bullets = '<ul id="bgRotatorNav" style="position:absolute; max-width:'+BGdefaults.width+' list-style:none; bottom:0; left:50%; transform:translate(-50%, 100%); -webkit-transform:translate(-50%, 100%)">';

		for(i=0; i<BGelm.length; i++){
			if(BGdefaults.navClass !== null){
				bullets +='<li class="'+BGdefaults.navClass+'"></li>';
			}else{
				bullets +='<li style="display:inline-block; border-radius:10px; width:20px; height:20px; margin:5px; background:#333;"></li>';
			}
		}
		bullets +='</ul>';
		bullOnClass = BGdefaults.navClass+'_On';
		$(this).css({'overflow':'visible'}).append(bullets);
		bullW = $('#bgRotatorNav li').outerWidth(true);
		$('#bgRotatorNav').width(BGelm.length*bullW);
		$('#bgRotatorNav li').not('#bgRotatorNav li:eq(0)').css({'opacity':0.5}).addClass(bullOnClass);
		$('#bgRotatorNav li:eq(0)').css({'opacity':1});

		$('#bgRotatorNav li').click(function(){
			BGindex = $(this).index();
			recursiveBanner();
		});

		var parentWidth;
		var parentHeight;
		var bodyHeight;
		var bodyWidth;
		var newbodyHeight;
		var newbodyWidth;
		var sizeRatio;
		var thisParent;

		if(BGdefaults.responsive){
		  //$(this).parent().height(avgHeight);
		  parentWidth = $(this).parent().width();
		  //parentHeight = avgHeight;
		  parentHeight = $(this).parent().height();
		  thisParent = $(this).parent();
		  bodyWidth= $(window).width();
		  bodyHeight = $(window).height();
		  $(window).resize(function(){
			newbodyWidth = $(window).width();
			sizeRatio = (newbodyWidth*100)/bodyWidth;
			$(thisParent).height(parentHeight*(sizeRatio/100));
		  });
		}
	}



	BGinit = true;
	BGindex = 0;
	BGtime = BGdefaults.delay;
	BGduration = BGdefaults.duration;
	BGelm.eq(BGindex).show().css({opacity:1});
	
	//Show Banner
	$(this).css({
	   'opacity':'1'
	});
	//Adjust if Parent has id='banner'
	$(this).parent().css({
	   'opacity':'1'
	});
	//console.log('show Banner');
	
	if(BGelm.length > 1){
		BGtimeout = window.setTimeout(function(){
			BGindex++;
			recursiveBanner();
		},(BGtime+BGduration));


		if(BGdefaults.mouseoverstop){
			$(this).mouseenter(function(){
				BGelm.clearQueue();
				clearTimeout(BGtimeout);
				clearTimeout(hideall);

			});

			$(this).mouseleave(function(){
				BGtimeout = window.setTimeout(function(){
					BGindex++;
					recursiveBanner();
				},(BGtime+BGduration));

			});
		}




	}
	
};
})( jQuery );


playBgRotator = true;
$(document).bind('keyup', function(e) {
	if(e.which == 39 || e.which == 34){
		$(arrow1).click();
		playBgRotator = true;
	}
	if(e.which == 37 || e.which == 33){
		$(arrow2).click();
		playBgRotator = true;
	}
	if(e.which == 66){
		//pause, resume
		if(playBgRotator){
			//stop
			playBgRotator = false;
			BGelm.clearQueue();
			clearTimeout(BGtimeout);
			clearTimeout(hideall);
			
		}else{
			//play
			playBgRotator = true;
			BGnextBtn();
		}
		
	}
});




function BGnextBtn(){
	BGindex++;
	recursiveBanner();
}

function BGprevBtn(){
	BGindex--;
	recursiveBannerPrev();
}

function recursiveBanner(){

	BGelm.clearQueue();
	clearTimeout(BGtimeout);
	clearTimeout(hideall);

	//Go to first
	if(BGindex >= BGelm.length){
		BGindex = 0;
	}

	var thisElm = BGelm.eq(BGindex);
	if(navBullets){
		$('#bgRotatorNav li').not('#bgRotatorNav li:eq('+BGindex+')').css({'opacity':0.5}).removeClass(bullOnClass);
		$('#bgRotatorNav li:eq('+BGindex+')').css({'opacity':1}).addClass(bullOnClass);
	}

	//Hide all so visible can be selected
	hideall = window.setTimeout(function(){
		BGelm.not(thisElm).hide();
	},BGduration);


	BGelm.not(thisElm).fadeTo(BGduration,0);
	thisElm.show().fadeTo(BGduration,1);



	//start over
	BGtimeout = window.setTimeout(function(){
		BGindex++;
		recursiveBanner();
	},(BGtime+BGduration));
}

function recursiveBannerPrev(){

	BGelm.clearQueue();
	clearTimeout(BGtimeout);
	clearTimeout(hideall);

	//Go to last
	if(BGindex < 0){
		BGindex = BGelm.length-1;
	}

	var thisElm = BGelm.eq(BGindex);
	if(navBullets){
		$('#bgRotatorNav li').not('#bgRotatorNav li:eq('+BGindex+')').css({'opacity':0.5});
		$('#bgRotatorNav li:eq('+BGindex+')').css({'opacity':1});
	}

	//Hide all so visible can be selected
	hideall = window.setTimeout(function(){
		BGelm.not(thisElm).hide();
	},BGduration);


	BGelm.not(thisElm).fadeTo(BGduration,0);
	thisElm.show().fadeTo(BGduration,1);

	//start over
	BGtimeout = window.setTimeout(function(){
		BGindex++;
		recursiveBanner();
	},(BGtime+BGduration));
}

/**** Swipe Detection ***/

document.addEventListener('touchstart', handleTouchStart, false);        
document.addEventListener('touchmove', handleTouchMove, false);

var xDown = null;                                                        
var yDown = null;

function getTouches(evt) {
  return evt.touches ||             // browser API
         evt.originalEvent.touches; // jQuery
}                                                     

function handleTouchStart(evt) {
    const firstTouch = getTouches(evt)[0];                                      
    xDown = firstTouch.clientX;                                      
    yDown = firstTouch.clientY;                                      
};                                                

function handleTouchMove(evt) {
    if ( ! xDown || ! yDown ) {
        return;
    }

    var xUp = evt.touches[0].clientX;                                    
    var yUp = evt.touches[0].clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
        if ( xDiff > 0 ) {
			/* left swipe */
		   BGnextBtn();
        } else {
            /* right swipe */
			BGprevBtn()
        }                       
    } else {
        if ( yDiff > 0 ) {
            /* up swipe */ 
        } else { 
            /* down swipe */
        }                                                                 
    }
    /* reset values */
    xDown = null;
    yDown = null;                                             
};