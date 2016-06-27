/**
 * Scripts
 * Formatting follows WordPress JS coding standards.
 *
 * @link https://make.wordpress.org/core/handbook/best-practices/coding-standards/javascript/
 */
var b = navigator.appName,
	addScroll = ( ( navigator.userAgent.indexOf( 'MSIE 5' ) > 0 ) || ( navigator.userAgent.indexOf( 'MSIE 6' ) ) > 0 ),
	pX = pY = 0,
	theLayer;

document.onmousemove = mouseMove;

// Check if Netscape.
if ( b == 'Netscape' ) {
	document.captureEvents( Event.MOUSEMOVE );
}

// Declare mouse move event handler.
function mouseMove( evn ) {
	if ( b == 'Netscape' ) {
		pX = evn.pageX - 5;
		pY = evn.pageY;

		if ( document.layers['ToolTip'].visibility == 'show' ) {
			popTip();
		}
	} else {
		pX = event.x - 5;
		pY = event.y;

		if ( document.all['ToolTip'].style.visibility == 'visible' ) {
			popTip();
		}
	}
}

// Show the tooltip.
function popTip() {
	if ( b == 'Netscape' ) {
		theLayer = eval( 'document.layers["ToolTip"]' );

		if ( ( pX + 120 ) > window.innerWidth ) {
			pX = window.innerWidth - 150;
		}

		theLayer.left = pX + 10;
		theLayer.top = pY + 15;
		theLayer.visibility = 'show';
	} else {
		theLayer = eval( 'document.all["ToolTip"]' );

		if ( theLayer ) {
			pX = event.x - 5;
			pY = event.y;

			if ( addScroll ) {
				pX += document.body.scrollLeft;
				pY += document.body.scrollTop;
			}

			if ( ( pX + 120 ) > document.body.clientWidth ) {
				pX -= 150;
			}

			theLayer.style.pixelLeft = pX + 10;
			theLayer.style.pixelTop = pY + 15;
			theLayer.style.visibility = 'visible';
		}
	}
}

// Hide the tooltip.
function hideTip() {
	var args = hideTip.arguments;

	if ( b == 'Netscape' ) {
		document.layers['ToolTip'].visibility = 'hide';
	} else {
		document.all['ToolTip'].style.visibility = 'hidden';
	}
}

// Hide the first menu.
function hideMenu1() {
	if ( b == 'Netscape' ) {
		document.layers['menu1'].visibility = 'hide';
	} else {
		document.all['menu1'].style.visibility = 'hidden';
	}
}

// Show the first menu.
function showMenu1() {
	if ( b == 'Netscape' ) {
		theLayer = eval( 'document.layers["menu1"]' );
		theLayer.visibility = 'show';
	} else {
		theLayer = eval( 'document.all["menu1"]' );
		theLayer.style.visibility = 'visible';
	}
}

// Hide the second menu.
function hideMenu2() {
	if ( b == 'Netscape' ) {
		document.layers['menu2'].visibility = 'hide';
	} else {
		document.all['menu2'].style.visibility = 'hidden';
	}
}

// Show the second menu.
function showMenu2() {
	if ( b == 'Netscape' ) {
		theLayer = eval( 'document.layers["menu2"]' );
		theLayer.visibility = 'show';
	} else {
		theLayer = eval( 'document.all["menu2"]' );
		theLayer.style.visibility = 'visible';
	}
}