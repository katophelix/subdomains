<?php
$image = $_GET['image'];
?>
<html class="pixel-ratio-2 retina ios ios-7 ios-7-0 ios-gt-6 watch-active-state"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>Salty Dog Smile</title>
    <link rel="stylesheet" href="css/framework7.min.css">
    <link rel="stylesheet" href="css/my-app.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script>
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}
var number = getRandomInt(1000, 9999) 
</script>
  </head>
  <body >
    
    <!-- Right panel with cover effect-->
    
    <!-- Views-->
 
          
<div>

      <img src="http://saltydog.com/src/<?php echo $image?>.jpg" width="100%" alt="The Salty Dog Cafe" title="The Saltty Dog Cafe" style="position:relative;top:0;left:0;">
        
<div style="width:100%;text-align:center;color:#fff;font-size:16px;padding:40px 0 20px;font-family:arial,sans-serif;">Your Image</div>
<div style="width:100%;margin-top:20px;text-align:center;">
<a href="smile" style="margin-top:20px;padding:20px 40px;background:#007aff;border-radius:3px;text-decoration:none;color:#fff;font-family:arial,sans-serif;">Back To WebCam App</a>
</div>
       
 
</div>
        <!-- Bottom Toolbar-->
        <div class="toolbar">
          <div class="left sliding"></div>
            <div class="right">
              <a href="#" class="link icon-only open-panel" style="color:#fff;width:100%;height:100%;display:block;text-align:center"> MENU&nbsp;&nbsp;<i class="fa fa-bars"></i></a>
            </div>
        </div>
      </div>
    </div>
  
<!-- 2001rain30.50 --></div>
    <!-- Path to Framework7 Library JS-->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/framework7.min.js"></script>
    <!-- Path to your app js-->
    <script type="text/javascript" src="js/my-app.js"></script>
    <script>
jQuery(document).ready(function($){
			setInterval(function(){
     $(".webimg").attr("src", "http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989&t="+new Date().getTime());
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
        audioElement.setAttribute('src', 'http://saltydog.com/src/shutter.mp3');
        //audioElement.setAttribute('autoplay', 'autoplay');
        //audioElement.load()

        $.get();

        audioElement.addEventListener("load", function() {
            audioElement.play();
        }, true);

        $(document).on('click','#cam',function() {
            audioElement.play();
        });

        $('.pause').click(function() {
            audioElement.pause();
        });

$(document).on('click','#cam',function(e)
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
               console.log(postData);
			   console.log(data);

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
//$("#cam2").submit();

});
</script>
<script>


</script>

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
 </body></html>