var winW;
$(document).ready(function(){
	winW = $(window).width();
	$('.mobile-toggle').click(function(){
		   $('.main-menu').slideToggle();
		   $('.superior-menu').slideUp();
	});
	$('.tog-sup-menu').click(function(){
		   $('.superior-menu').slideToggle();
		   $('.main-menu').slideUp();
	});
	
	$('.goTo').click(function(){
		   if(winW <= 640){       
				   $('.mainMenu .menuUl').slideUp();
		   }
		   $('.goTo').removeClass('selected');
		   $(this).addClass('selected');
	});
	
	$('.closeDisclaimer').click(function(){
		$(".disclaimer_box").slideUp();
        $('.disclaimer_box').remove();
		createCookie("disclaimer_cl",'closed',1);
		//document.cookie = "disclaimer_cl=closed";
	});
	
	$('.openModal').click(function(){		
		$('.newsletterLb').fadeIn();		

	});
	
	$('.closeNews').click(function(){
		$('.newsletterLb').fadeOut();			
	});	
	
	$('.openAside').click(function(){
		$('.stickyAside').slideToggle();			
	});	
	
});

$(window).resize(function(){
	winW = $(window).width();
	if(winW <= 640){
		$('.main_menu ul').slideUp();
	}

	if(winW > 640){
		$('.main_menu ul').slideDown();
	}
});

function PrintElem(elem,css){
	var mywindow = window.open('', 'PRINT', 'height=400,width=600');
	mywindow.document.write('<html><head><title>BOOKING REQUEST</title>');
	mywindow.document.write('<link href="'+css+'" rel="stylesheet" type="text/css"  />');
	mywindow.document.write('</head><body style="background:#fff">');
	mywindow.document.write('<div id="content_tile"><h3>BOOKING REQUEST</h3></div>');
	mywindow.document.write(document.getElementById(elem).innerHTML);
	mywindow.document.write('</body></html>');
	mywindow.document.close(); // necessary for IE >= 10
	mywindow.focus(); // necessary for IE >= 10*/
		mywindow.onload = function() { //give time for CSS to load
			mywindow.print();
			mywindow.close();
		};
	return true;
}

function createCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } 
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

$.fn.serializeObject = function(){
	var formObj = {};
	var a = this.serializeArray();
	$.each(a, function() {
		if (formObj[this.name] !== undefined) {
			if (!formObj[this.name].push) {
				formObj[this.name] = [formObj[this.name]];
			}
			formObj[this.name].push(this.value || '');
		} else {
			formObj[this.name] = this.value || '';
		}
	});
	return formObj;
};

function validEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


function validTel(tel) {
	//Assume +1(999)-000.001 / 02 e. ext. #00-99 or any combination
	var newtel = tel.replace(/\+/g,"");  //Remove all +
	newtel = newtel.replace(/\(/g,""); // Remove all (
	newtel = newtel.replace(/\)/g,""); // Remove all )
	newtel = newtel.replace(/\./g,""); // Remove all .
	newtel = newtel.replace(/\-/g,""); // Remove all -
	newtel = newtel.replace(/\//g,""); // Remove all /
	newtel = newtel.replace(/#/g,""); // Remove all #
	newtel = newtel.replace(/ext/gi,""); // Remove all ext
	newtel = newtel.replace(/e/gi,""); // Remove all e
	newtel = newtel.replace(/ /g,""); // Remove all spaces ' '
    if(isNaN(newtel) || newtel == ''){
		return false; //newtel must be a number
	}else{
		return true;
	}
}

function validateFields(elm){
	valid = true;
	fields = elm.find('input, textarea, select');
	$(fields).css({border:'1px solid #CCC'});
	for(i=0; i<$(fields).length; i++){

		if(($(fields).eq(i).val() === '' || $(fields).eq(i).val() === null) && $(fields).eq(i).attr('required')){
			valid = false;
			$(fields).eq(i).css({'border':'1px red solid'});
		}

		if($(fields).eq(i).attr('type') == 'email' && !validEmail($(fields).eq(i).val()) && $(fields).eq(i).attr('required') ){
			valid = false;
			$(fields).eq(i).css({'border':'1px red solid'});
		}

		if($(fields).eq(i).attr('type') == 'tel' && !validTel($(fields).eq(i).val()) && $(fields).eq(i).attr('required') ){
			valid = false;
			$(fields).eq(i).css({'border':'1px red solid'});
		}
	}
	return valid;
}

function isset(){

  var a = arguments,
    l = a.length,
    i = 0,
    undef;

  if (l === 0){
    throw new Error('Empty isset');
  }

  while (i !== l) {
    if (a[i] === undef || a[i] === null) {
      return false;
    }
    i++;
  }
  return true;
}