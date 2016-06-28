/**
 * @JavaScript-code.js Created on June 25, 2016. Homework for Course: High quality code.
 * @author yvhristov@gmail.com (Yavor Hristov)
 *
 * References:
 * @link http://www.ecma-international.org/ecma-262/7.0/index.html
 * @link https://developer.mozilla.org/en/docs/Web/JavaScript
 * @link http://contribute.jquery.org/style-guide/js/
 * @link http://www.w3schools.com/js/js_conventions.asp
 * @link https://google.github.io/styleguide/javascriptguide.xml
 */

var addScroll = false; // @type {boolean} addScroll

if ((navigator.userAgent.indexOf('MSIE 5') > 0) || (navigator.userAgent.indexOf('MSIE 6')) > 0) {
    addScroll = true;
}

var b = navigator.appName; // @type {string} b - Represents the name of the browser.
var pX = 0;                // @type {number} [pX=0]
var pY = 0;                // @type {number} [pY=0]
document.onmousemove = mouseMove;

if (b == "Netscape") {
    document.captureEvents(Event.MOUSEMOVE)
};

/**
 * [Short function description here - if needed!].
 * @param {object} evn - [Short parameter description here].
 * @return void
 */
function mouseMove(evn) {
	if (b == "Netscape") {
        pX = evn.pageX - 5;
        pY = evn.pageY;
    } 
	else {
        pX = event.x - 5;
        pY = event.y;
    }
	
	// [short description for the statement if here - if needed!]
    if (b == "Netscape") {
        if (document.layers['ToolTip'].visibility == 'show') {
            PopTip();
        }
    } 
	else {
        if (document.all['ToolTip'].style.visibility == 'visible') {
            PopTip();
        }
    }
}

/**
 * [Short function description here - if needed!].
 * @return void
 */
function PopTip() {
    if (b == "Netscape") {
        theLayer = eval('document.layers[\'ToolTip\']');

        if ((pX + 120) > window.innerWidth) {
            pX = window.innerWidth - 150;
        }

        theLayer.left = pX + 10;
        theLayer.top = pY + 15;
        theLayer.visibility = 'show';
    }
	else {
        theLayer = eval('document.all[\'ToolTip\']');
		
        if (theLayer) {
            pX = event.x - 5;
            pY = event.y;

            if (addScroll) {
                pX = pX + document.body.scrollLeft;
                pY = pY + document.body.scrollTop;
            }

            if ((pX + 120) > document.body.clientWidth) {
                pX = pX - 150;
            }
			
            theLayer.style.pixelLeft = pX + 10;
            theLayer.style.pixelTop = pY + 15;
            theLayer.style.visibility = 'visible';
        }
    }
}

function HideTip() {
    if (b == "Netscape") {
        document.layers['ToolTip'].visibility = 'hide';
    } 
	else {
        document.all['ToolTip'].style.visibility = 'hidden';
    }
}

function HideMenu1() {
    if (b == "Netscape") {
        document.layers['menu1'].visibility = 'hide';
    } 
	else {
        document.all['menu1'].style.visibility = 'hidden';
    }
}

function ShowMenu1() {
        if (b == "Netscape") {
            theLayer = eval('document.layers[\'menu1\']');
            theLayer.visibility = 'show';
        } 
		else {
            theLayer = eval('document.all[\'menu1\']');
            theLayer.style.visibility = 'visible';
        }
}

function HideMenu2() {
    if (b == "Netscape") {
        document.layers['menu2'].visibility = 'hide';
    } 
	else {
        document.all['menu2'].style.visibility = 'hidden';
    }
}

function ShowMenu2() {
        if (b == "Netscape") {
            theLayer = eval('document.layers[\'menu2\']');
            theLayer.visibility = 'show';
        } 
		else {
            theLayer = eval('document.all[\'menu2\']');
            theLayer.style.visibility = 'visible';
        }
}