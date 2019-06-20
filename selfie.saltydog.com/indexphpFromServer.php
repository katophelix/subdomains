<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/New_York');
define('DONOTCACHEPAGE',1);
function curl_download($Url){

    if (!function_exists('curl_init')){
        die('cURL is not installed. Install and try again.');
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$temp = curl_download('http://www.saltydog.com/weather/sbeach/weather2.inc?v='.rand());
$img = '';
if (isset($_GET['image'])){
	$img = $_GET['image'];
}
?>
<script>

</script>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>SaltyDogSelfie</title>
    <link rel="stylesheet" href="css/framework7.min.css">
    <link rel="stylesheet" href="css/my-app.css?v=234">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script>
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}
var number = getRandomInt(1000, 9999)
</script>
  </head>
  <body>
  <!--<div id="fb-root"></div>-->
<script>
/*
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=550937025014037";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
*/
</script>
  <div style="max-width:426px;max-height:758px;height:100%;margin:0 auto;background:url(../bg.jpg) no-repeat 0 0;background-size:cover;position:relative;z-index:99999;">
   <form id="cam2" name="cam" action="test.php" method="POST">
 <input type="hidden" class="image" name="image" value="image-">
 </form>
    <div class="statusbar-overlay"></div>
    <div class="panel-overlay"></div>
    <div class="panel panel-left panel-reveal">

              <div class="list-block">
                <ul id="mobmenuleft">
<li><a class="item-link external" rel="external" href="http://saltydog.com/"><div class="item-content"><div class="item-inner"> <div class="item-title">Home</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/survey/"><div class="item-content"><div class="item-inner"> <div class="item-title">Feed Us Back</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://store.saltydog.com"><div class="item-content"><div class="item-inner"> <div class="item-title">Shop</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/cruise/"><div class="item-content"><div class="item-inner"> <div class="item-title">Cruise</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/lucky-receipt/"><div class="item-content"><div class="item-inner"> <div class="item-title">Lucky Receipt</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/lucky8/"><div class="item-content"><div class="item-inner"> <div class="item-title">Lucky 8</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="/pages/photos/"><div class="item-content"><div class="item-inner"> <div class="item-title">Pet Photos</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/people/"><div class="item-content"><div class="item-inner"> <div class="item-title">People Photos</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/jake/"><div class="item-content"><div class="item-inner"> <div class="item-title">Jake &amp; Friends Pics</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/santa-photos/"><div class="item-content"><div class="item-inner"> <div class="item-title">Santa Photos</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/in-memorial/"><div class="item-content"><div class="item-inner"> <div class="item-title">Pet Memorial</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/hilton-head-weather/"><div class="item-content"><div class="item-inner"> <div class="item-title">Weather</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/pages/salty-dog-cafe/"><div class="item-content"><div class="item-inner"> <div class="item-title">Salty Dog Cafe</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/pages/the-wreck/"><div class="item-content"><div class="item-inner"> <div class="item-title">The Wreck of the Salty Dog</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/dining/lands-end-tavern/"><div class="item-content"><div class="item-inner"> <div class="item-title">Lands End Tavern</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/jakes-salty-dog-pizza/"><div class="item-content"><div class="item-inner"> <div class="item-title">Jake’s Salty Dog Pizza</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/kiwis-island-grill/"><div class="item-content"><div class="item-inner"> <div class="item-title">Kiwi’s Island Grill</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/salty-dog-ice-cream/"><div class="item-content"><div class="item-inner"> <div class="item-title">Salty Dog Ice Cream</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/pages/webcams/"><div class="item-content"><div class="item-inner"> <div class="item-title">Webcams</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/mcal"><div class="item-content"><div class="item-inner"> <div class="item-title">Events</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="#"><div class="item-content"><div class="item-inner"> <div class="item-title">Locations</div></div></div></a>
<ul class="sub-menu">
	<li><a class="item-link external" rel="external" href="http://saltydog.com/salty-dog-t-shirt-factory/"><div class="item-content"><div class="item-inner"> <div class="item-title">Arrow Road</div></div></div></a></li>
	<li><a class="item-link external" rel="external" href="http://saltydog.com/jakes-cargo/"><div class="item-content"><div class="item-inner"> <div class="item-title">Jakes Cargo</div></div></div></a></li>
	<li><a class="item-link external" rel="external" href="http://keywest.saltydog.com"><div class="item-content"><div class="item-inner"> <div class="item-title">Salty Dog Key West</div></div></div></a></li>
	<li><a class="item-link external" rel="external" href="http://saltydog.com/tanger-outlet/"><div class="item-content"><div class="item-inner"> <div class="item-title">Tanger Outlet</div></div></div></a></li>
	<li><a class="item-link external" rel="external" href="http://saltydog.com/salty-dog-t-shirt-shop/"><div class="item-content"><div class="item-inner"> <div class="item-title">Salty Dog T-Shirt Shop</div></div></div></a></li>
</ul>
</li>
<li><a class="item-link external" rel="external" href="http://sbinn.com"><div class="item-content"><div class="item-inner"> <div class="item-title">Accommodations</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/contact/"><div class="item-content"><div class="item-inner"> <div class="item-title">Contact</div></div></div></a></li>
<li><a class="item-link external" rel="external" href="http://saltydog.com/employment/"><div class="item-content"><div class="item-inner"> <div class="item-title">Employment</div></div></div></a></li>
</ul>
             <ul>
                  <li><a href="splash.php" class="item-link services">
                      <div class="item-content">
                        <div class="item-inner">
                          <div class="item-title"></div>
                        </div>
                      </div></a></li>

                </ul>
              </div>

    </div>
    <div class="panel panel-right panel-cover">
      <div class="content-block">
        <p></p>
      </div>
    </div>

    <div class="views">
      <div class="view view-main">
        <div class="navbar">
          <div class="navbar-inner">
            <div class="left sliding"></div>
            <div class="right">
              <a href="#" class="link icon-only open-panel" style="color:#fff;"> <i class="fa fa-bars"></i></a>
            </div>
          </div>
        </div>
        <div class="pages navbar-through toolbar-through" style="overflow-y:scroll;">
          <div data-page="index" class="page">

            <div class="page-content" style="padding-bottom:144px;">
              <!--<div class="content-block-title">Welcome To The Salty Dog Cafe</div>-->
              <div class="content-block">
                <div class="content-block-inner">
                  <!--<img src="img/smile.png" style="width:154px;height:70px;position:relative;left:50%;margin-left:-77px;top:0px;" alt="Smile at the Salty Dog Cafe" title="Smile at The Salty Dog Cafe">-->
                  <!-- <img class="webimg" src="http://98.101.223.10:8251/axis-cgi/mjpg/video.cgi" alt="Please Stand By For Webcam Photo Upload" name="pic" id="pic" style="width:100%;">-->
                 <img class="webimg" src="http://98.101.223.10:8251/axis-cgi/mjpg/video.cgi" style="width:100%;" />
                  <div class="spin" style="position:absolute;font-size:30px;color:#fff;top:100px;left:50%;margin-left:-15px;display:none;"><i class="fa fa-spinner fa-spin"></i></div>
                  <div style="width:100%;height:5px;margin-top:-5px;display:block;background:#2b3949;"></div>
                  <div>
                 <!-- <div style="width:100%;color:#fff !important;text-align:center;position:relative;top:50px;">
                  <div class="fb-like" data-href="http://selfie.saltydog.com/" data-width="200" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
                   </div>-->
                  <div id="mess">
                  
					  <div style="position:relative;top:-25px;padding:0px;width:100%;text-align:center;font-family:arial,sans-serif;font-size:16px;line-height:24px;color:#fff;">Hello from Salty Dog <br> Hilton Head Island  USA</div>

                 <!-- <div class="weatherInfo" style="position:relative;top:-25px;padding:0px;width:100%;text-align:center;font-family:arial,sans-serif;font-size:16px;line-height:24px;color:#fff;">it's <span id="temp" style="font-weight:300;font-size:20px;"></span> on Hilton Head Island<!--<br><p class="wind2"></p><span id="tick21" style="display:none;"></span></div> -->
                  
                  
                  
                   <img id="cam" src="img/cam.png" alt="cam image" title="Take Your Pic" width="100" style="padding-bottom:0px;position:relative;left:-50px;margin-left:50%;">
                   <?php
				   if($img === 'fgfgfd'){
					   ?>
                        <div style="width:100%;text-align:center;color:#fff;">Take a new photo<br> or <span class="button cont color-white">continue with the previous one</span></div>
                        <?php }else{?>
 <div style="width:100%;text-align:center;color:#fff;">Take Your Photo</div>


 <?php }?>
 </div>
 
                  </div>
                </div>
			
              </div>
				
             <!-- <div class="content-block-title">What about simple navigation?</div>
              <div class="list-block">
                <ul>
                  <li><a href="about.html" class="item-link">
                      <div class="item-content">
                        <div class="item-inner">
                          <div class="item-title">About</div>
                        </div>
                      </div></a></li>
                  <li><a href="services.html" class="item-link">
                      <div class="item-content">
                        <div class="item-inner">
                          <div class="item-title">Services</div>
                        </div>
                      </div></a></li>
                  <li><a href="form.html" class="item-link">
                      <div class="item-content">
                        <div class="item-inner">
                          <div class="item-title">Form</div>
                        </div>
                      </div></a></li>
                </ul>
              </div>-->
              <!--<div class="content-block-title">Side panels</div>
              <div class="content-block">
                <div class="row">
                  <div class="col-50"><a href="#" data-panel="left" class="button open-panel">Left Panel</a></div>
                  <div class="col-50"><a href="#" data-panel="right" class="button open-panel">Right Panel</a></div>
                </div>
              </div>-->
            </div>
          </div>
			
        </div>
        <!-- Bottom Toolbar-->

       <!-- <div class="toolbar">
          <div class="left sliding"></div>
            <div class="right">
              <a href="#" class="link icon-only open-panel" style="color:#fff;width:100%;height:100%;display:block;text-align:center"> MENU&nbsp;&nbsp;<i class="fa fa-bars"></i></a>
            </div>
        </div>
      </div>-->
    </div>
    <div style="display:none;">
<?php echo $temp;?>
</div>
    <!-- Path to Framework7 Library JS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).bind("mobileinit", function(){
          $.mobile.ajaxEnabled = false;
   });
   </script>
        <script type="text/javascript" src="js/framework7.min.js"></script>
    <!-- Path to your app js-->
    <script type="text/javascript" src="js/my-app.js"></script>
    <script>
jQuery(document).ready(function($){

			setInterval(function(){
     $(".webimg").attr("src", "http://98.101.223.10:8251/axis-cgi/jpg/image.cgi;
}, 1000);

});
</script>
<script>
jQuery(document).ready(function($){
	var temp1 = $('.weather_font tr:eq(2)');
	var temp = $('td:eq(1)',temp1).text();
	//var temp = temp.substring(0,2);
	//temp = Number(temp);
	temp = Math.round(parseInt(temp));
	$('#temp').html(' ' + temp + '&deg;');
	var wind2 = $('td:eq(3)',temp1).text();
	$('.wind2').html('<span style="font-size:14px">Wind ' + wind2 + '</span>');
});
</script>
<script>
jQuery(document).ready(function($){

function killSession() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'session.php', true);
    xhr.send();
}
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'http://saltydogcafe.com/selfie.saltydog.com/src/shutter.mp3');
        //audioElement.setAttribute('autoplay', 'autoplay');
        //audioElement.load()

        $.get();

        audioElement.addEventListener("load", function() {
            audioElement.play();
        }, true);

        $(document).on('click tap touchstart','#cam',function() {
            audioElement.play();
        });

        $('.pause').click(function() {
            audioElement.pause();
        });

$(document).on('click tap touchstart','#cam',function(e)
{
	number = '';
	number = getRandomInt(1000, 9999);
	$('.image').attr('value','image-' + number);
	$('.spin').show();
    var postData = $("#cam2").serialize();
    var formURL = $('#cam2').attr("action");
    $.ajax({
           type: "POST",
           url: formURL,
           data: postData,
           success: function(data)
           {
               console.log('index' + postData);
			   console.log('indexb' + data);

			   $('.spin').hide();


           }
         });

		 $.ajax({
           type: "POST",
           url: "splash.php",
           data: postData,
           success: function(data)
           {
               console.log(postData);
			   //console.log(data);

			    $('a.services').simulate('click');

		   }
		 })
    e.preventDefault();
    e.unbind();

});

$(document).on('click tap touchstart','.cont',function(e)
{
		 var pData = 'image=<?=$img;?>';
		 $.ajax({
           type: "POST",
           url: "splash.php",
           data: pData,
           success: function(data)
           {
               console.log(pData);
			   console.log(data);

			    $('a.services').simulate('click');

		   }
		 })
    e.preventDefault();
    e.unbind();

});
});
</script>


    <?php $sent = 'no';?>
<script>

 /*!
 * jQuery Simulate v@VERSION - simulate browser mouse and keyboard events
 * https://github.com/jquery/jquery-simulate
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 *
 * Date: @DATE
 */

;(function( $, undefined ) {

var rkeyEvent = /^key/,
	rmouseEvent = /^(?:mouse|contextmenu)|click/;

$.fn.simulate = function( type, options ) {
	return this.each(function() {
		new $.simulate( this, type, options );
	});
};

$.simulate = function( elem, type, options ) {
	var method = $.camelCase( "simulate-" + type );

	this.target = elem;
	this.options = options;

	if ( this[ method ] ) {
		this[ method ]();
	} else {
		this.simulateEvent( elem, type, options );
	}
};

$.extend( $.simulate, {

	keyCode: {
		BACKSPACE: 8,
		COMMA: 188,
		DELETE: 46,
		DOWN: 40,
		END: 35,
		ENTER: 13,
		ESCAPE: 27,
		HOME: 36,
		LEFT: 37,
		NUMPAD_ADD: 107,
		NUMPAD_DECIMAL: 110,
		NUMPAD_DIVIDE: 111,
		NUMPAD_ENTER: 108,
		NUMPAD_MULTIPLY: 106,
		NUMPAD_SUBTRACT: 109,
		PAGE_DOWN: 34,
		PAGE_UP: 33,
		PERIOD: 190,
		RIGHT: 39,
		SPACE: 32,
		TAB: 9,
		UP: 38
	},

	buttonCode: {
		LEFT: 0,
		MIDDLE: 1,
		RIGHT: 2
	}
});

$.extend( $.simulate.prototype, {

	simulateEvent: function( elem, type, options ) {
		var event = this.createEvent( type, options );
		this.dispatchEvent( elem, type, event, options );
	},

	createEvent: function( type, options ) {
		if ( rkeyEvent.test( type ) ) {
			return this.keyEvent( type, options );
		}

		if ( rmouseEvent.test( type ) ) {
			return this.mouseEvent( type, options );
		}
	},

	mouseEvent: function( type, options ) {
		var event, eventDoc, doc, body;
		options = $.extend({
			bubbles: true,
			cancelable: (type !== "mousemove"),
			view: window,
			detail: 0,
			screenX: 0,
			screenY: 0,
			clientX: 1,
			clientY: 1,
			ctrlKey: false,
			altKey: false,
			shiftKey: false,
			metaKey: false,
			button: 0,
			relatedTarget: undefined
		}, options );

		if ( document.createEvent ) {
			event = document.createEvent( "MouseEvents" );
			event.initMouseEvent( type, options.bubbles, options.cancelable,
				options.view, options.detail,
				options.screenX, options.screenY, options.clientX, options.clientY,
				options.ctrlKey, options.altKey, options.shiftKey, options.metaKey,
				options.button, options.relatedTarget || document.body.parentNode );

			// IE 9+ creates events with pageX and pageY set to 0.
			// Trying to modify the properties throws an error,
			// so we define getters to return the correct values.
			if ( event.pageX === 0 && event.pageY === 0 && Object.defineProperty ) {
				eventDoc = event.relatedTarget.ownerDocument || document;
				doc = eventDoc.documentElement;
				body = eventDoc.body;

				Object.defineProperty( event, "pageX", {
					get: function() {
						return options.clientX +
							( doc && doc.scrollLeft || body && body.scrollLeft || 0 ) -
							( doc && doc.clientLeft || body && body.clientLeft || 0 );
					}
				});
				Object.defineProperty( event, "pageY", {
					get: function() {
						return options.clientY +
							( doc && doc.scrollTop || body && body.scrollTop || 0 ) -
							( doc && doc.clientTop || body && body.clientTop || 0 );
					}
				});
			}
		} else if ( document.createEventObject ) {
			event = document.createEventObject();
			$.extend( event, options );
			// standards event.button uses constants defined here: http://msdn.microsoft.com/en-us/library/ie/ff974877(v=vs.85).aspx
			// old IE event.button uses constants defined here: http://msdn.microsoft.com/en-us/library/ie/ms533544(v=vs.85).aspx
			// so we actually need to map the standard back to oldIE
			event.button = {
				0: 1,
				1: 4,
				2: 2
			}[ event.button ] || ( event.button === -1 ? 0 : event.button );
		}

		return event;
	},

	keyEvent: function( type, options ) {
		var event;
		options = $.extend({
			bubbles: true,
			cancelable: true,
			view: window,
			ctrlKey: false,
			altKey: false,
			shiftKey: false,
			metaKey: false,
			keyCode: 0,
			charCode: undefined
		}, options );

		if ( document.createEvent ) {
			try {
				event = document.createEvent( "KeyEvents" );
				event.initKeyEvent( type, options.bubbles, options.cancelable, options.view,
					options.ctrlKey, options.altKey, options.shiftKey, options.metaKey,
					options.keyCode, options.charCode );
			// initKeyEvent throws an exception in WebKit
			// see: http://stackoverflow.com/questions/6406784/initkeyevent-keypress-only-works-in-firefox-need-a-cross-browser-solution
			// and also https://bugs.webkit.org/show_bug.cgi?id=13368
			// fall back to a generic event until we decide to implement initKeyboardEvent
			} catch( err ) {
				event = document.createEvent( "Events" );
				event.initEvent( type, options.bubbles, options.cancelable );
				$.extend( event, {
					view: options.view,
					ctrlKey: options.ctrlKey,
					altKey: options.altKey,
					shiftKey: options.shiftKey,
					metaKey: options.metaKey,
					keyCode: options.keyCode,
					charCode: options.charCode
				});
			}
		} else if ( document.createEventObject ) {
			event = document.createEventObject();
			$.extend( event, options );
		}

		if ( !!/msie [\w.]+/.exec( navigator.userAgent.toLowerCase() ) || (({}).toString.call( window.opera ) === "[object Opera]") ) {
			event.keyCode = (options.charCode > 0) ? options.charCode : options.keyCode;
			event.charCode = undefined;
		}

		return event;
	},

	dispatchEvent: function( elem, type, event ) {
		if ( elem[ type ] ) {
			elem[ type ]();
		} else if ( elem.dispatchEvent ) {
			elem.dispatchEvent( event );
		} else if ( elem.fireEvent ) {
			elem.fireEvent( "on" + type, event );
		}
	},

	simulateFocus: function() {
		var focusinEvent,
			triggered = false,
			element = $( this.target );

		function trigger() {
			triggered = true;
		}

		element.bind( "focus", trigger );
		element[ 0 ].focus();

		if ( !triggered ) {
			focusinEvent = $.Event( "focusin" );
			focusinEvent.preventDefault();
			element.trigger( focusinEvent );
			element.triggerHandler( "focus" );
		}
		element.unbind( "focus", trigger );
	},

	simulateBlur: function() {
		var focusoutEvent,
			triggered = false,
			element = $( this.target );

		function trigger() {
			triggered = true;
		}

		element.bind( "blur", trigger );
		element[ 0 ].blur();

		// blur events are async in IE
		setTimeout(function() {
			// IE won't let the blur occur if the window is inactive
			if ( element[ 0 ].ownerDocument.activeElement === element[ 0 ] ) {
				element[ 0 ].ownerDocument.body.focus();
			}

			// Firefox won't trigger events if the window is inactive
			// IE doesn't trigger events if we had to manually focus the body
			if ( !triggered ) {
				focusoutEvent = $.Event( "focusout" );
				focusoutEvent.preventDefault();
				element.trigger( focusoutEvent );
				element.triggerHandler( "blur" );
			}
			element.unbind( "blur", trigger );
		}, 1 );
	}
});



/** complex events **/

function findCenter( elem ) {
	var offset,
		document = $( elem.ownerDocument );
	elem = $( elem );
	offset = elem.offset();

	return {
		x: offset.left + elem.outerWidth() / 2 - document.scrollLeft(),
		y: offset.top + elem.outerHeight() / 2 - document.scrollTop()
	};
}

function findCorner( elem ) {
	var offset,
		document = $( elem.ownerDocument );
	elem = $( elem );
	offset = elem.offset();

	return {
		x: offset.left - document.scrollLeft(),
		y: offset.top - document.scrollTop()
	};
}

$.extend( $.simulate.prototype, {
	simulateDrag: function() {
		var i = 0,
			target = this.target,
			eventDoc = target.ownerDocument,
			options = this.options,
			center = options.handle === "corner" ? findCorner( target ) : findCenter( target ),
			x = Math.floor( center.x ),
			y = Math.floor( center.y ),
			coord = { clientX: x, clientY: y },
			dx = options.dx || ( options.x !== undefined ? options.x - x : 0 ),
			dy = options.dy || ( options.y !== undefined ? options.y - y : 0 ),
			moves = options.moves || 3;

		this.simulateEvent( target, "mousedown", coord );

		for ( ; i < moves ; i++ ) {
			x += dx / moves;
			y += dy / moves;

			coord = {
				clientX: Math.round( x ),
				clientY: Math.round( y )
			};

			this.simulateEvent( eventDoc, "mousemove", coord );
		}

		if ( $.contains( eventDoc, target ) ) {
			this.simulateEvent( target, "mouseup", coord );
			this.simulateEvent( target, "click", coord );
		} else {
			this.simulateEvent( eventDoc, "mouseup", coord );
		}
	}
});

})( jQuery );
</script>
</div>
  </body>
</html>
