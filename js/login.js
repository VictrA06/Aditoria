
/**
 * Login utilities functions
 */

/**
 * Forces the captcha image refresh, updating code on backend
 * and image on frontend
 * 
 * @returns {undefined}
 */
function reloadCaptcha() {

    var date = new Date();
    $('#captcha').attr('src', 'login/captcha.png?' + date.getTime());
}

function loadSpinnerButton()
{
   $('#spin_carga').show();
   $('#btnIngresar').attr("disabled",true);
}
var tabsFn = (function() {
  
  function init() {
    setHeight();
  }
  
  function setHeight() {
    var $tabPane = $('.tab-pane'),
        tabsHeight = $('.nav-tabs').height();
    
    $tabPane.css({
      height: tabsHeight
    });
  }
    
  $(init);
})();
