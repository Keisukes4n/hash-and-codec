/**
 * module file: _script.js
 * description: 
 */

const elementdivOperationButtonLeft = document.getElementById( 'divOperationButtonLeft' );
const elementImgMenuIcon            = document.getElementById( 'imgMenuIcon' );
const elementNavMenuArea            = document.getElementById( 'navMenu' );
let openFlagOfMenu  = 'close';
let tempSrcProperty = 'temp';

elementdivOperationButtonLeft.addEventListener( 'click', () => {
  switch ( openFlagOfMenu ) {
  case 'close':
    openFlagOfMenu  = 'open';
    tempSrcProperty = elementImgMenuIcon.src;
    elementImgMenuIcon.src = tempSrcProperty.replace('menu-icon', 'close-icon');
    elementNavMenuArea.style.maxHeight = '80vw';
  break;
    case 'open':
      openFlagOfMenu = 'close';
      tempSrcProperty = elementImgMenuIcon.src;
      elementImgMenuIcon.src = tempSrcProperty.replace('close-icon', 'menu-icon');
      elementNavMenuArea.style.maxHeight = '0vw';
      break;
    }
  }, false );

document.addEventListener( 'scroll', () => {
  if ( openFlagOfMenu == 'open' ) {
    openFlagOfMenu  = 'close';
    tempSrcProperty = elementImgMenuIcon.src;
    elementImgMenuIcon.src = tempSrcProperty.replace('close-icon', 'menu-icon');
    elementNavMenuArea.style.maxHeight = '0vw';
  }
}, false );

function scrollShowHeader() {
  const elementHeader = document.getElementById( 'header' );
  elementHeader.style.height = '4.0rem';
  window.setTimeout( () => {
    elementHeader.style.overflowY = 'visible';
  }, 200)
}
    
function scrollHiddenHeader() {
  const elementHeader = document.getElementById( 'header' );
  elementHeader.style.height    = '0';
  elementHeader.style.overflowY = 'hidden';
}
    
function judgeScrollDirection( beforeY, currentY ) {
  let result      = null;
  let fluctuation = currentY - beforeY;
  if ( fluctuation > 0) {
    result = 'down';
    scrollHiddenHeader();
  } else {
    result = 'up';
    scrollShowHeader();
  }
  return result;
}
    
const scrollObject = { beforeY: 0, currentY: window.scrollY, directionY: null };
  window.addEventListener( 'scroll', () => {
    scrollObject.currentY   = window.scrollY;    
    scrollObject.directionY = judgeScrollDirection( scrollObject.beforeY, scrollObject.currentY );
    scrollObject.beforeY    = scrollObject.currentY;

    if ( scrollObject.currentY == 0 ) {
      scrollShowHeader();
    }
    // console.log( scrollObject.directionY );
}, false );

/** A module file is end up here. : _script.js */