/**
 * module file: _script.js
 * description: 
 */

/** functions */
function clickCloseMenu( flag, eleMenuIcon, eleMenuArea ) {
  const aspectRatio = Number( window.outerWidth / window.outerHeight );
  if ( aspectRatio < 4/3) {
    flag = 'N';
    eleMenuIcon.style.transform = 'rotate(0.0turn)';
    eleMenuArea.style.maxHeight = '0vw';
  }
  return flag;
}

function clickOpenMenu( flag, eleMenuIcon, eleMenuArea ) {
  const aspectRatio = Number( window.outerWidth / window.outerHeight );
  if ( aspectRatio < 4/3) {
    flag = 'Y';
    eleMenuIcon.style.transform = 'rotate(0.5turn)';
    eleMenuArea.style.maxHeight = '60vw';
  }
  return flag;
}

function judgeScrollDirection( beforeY, currentY ) {
  let result      = null;
  let fluctuation = currentY - beforeY;
  if ( fluctuation > 0) {
    result = 'down';
    scrollHideHeader();
  } else {
    result = 'up';
    scrollShowHeader();
  }
  return result;
}

function scrollShowHeader() {
  const elementHeader = document.getElementById( 'header' );
  elementHeader.style.height = '4.0rem';
  window.setTimeout( () => {
    elementHeader.style.overflowY = 'visible';
  }, 200)
}
    
function scrollHideHeader() {
  const elementHeader = document.getElementById( 'header' );
  elementHeader.style.height    = '0';
  elementHeader.style.overflowY = 'hidden';
}

/** open and close the menu */
const elementdivOperationButtonLeft = document.getElementById( 'divOperationButtonLeft' );
const elementImgMenuIcon            = document.getElementById( 'imgMenuIcon' );
const elementNavMenuArea            = document.getElementById( 'navMenu' );
let flagOpeningMenu = 'N';
elementdivOperationButtonLeft.addEventListener( 'click', () => {
  switch ( flagOpeningMenu ) {
    case 'N':
      flagOpeningMenu = clickOpenMenu( flagOpeningMenu, elementImgMenuIcon, elementNavMenuArea );
    break;
    case 'Y':
      flagOpeningMenu = clickCloseMenu( flagOpeningMenu, elementImgMenuIcon, elementNavMenuArea );
      break;
    }
  }, false );

  window.addEventListener( 'scroll', () => {
  if ( flagOpeningMenu == 'Y' ) {
    flagOpeningMenu = clickCloseMenu( flagOpeningMenu, elementImgMenuIcon, elementNavMenuArea );
  }
}, false );


/** show and hide the header */
const scrollObject = { beforeY: 0, currentY: window.scrollY, directionY: null };
window.addEventListener( 'scroll', () => {
  const aspectRatio = Number( window.outerWidth / window.outerHeight );
  if ( aspectRatio < 4/3) {
    scrollObject.currentY   = window.scrollY;    
    scrollObject.directionY = judgeScrollDirection( scrollObject.beforeY, scrollObject.currentY );
    scrollObject.beforeY    = scrollObject.currentY;

    if ( scrollObject.currentY == 0 ) {
      scrollShowHeader();
    }
  }
}, false );


window.addEventListener( 'resize', () => {
  const aspectRatio = Number( window.outerWidth / window.outerHeight );
  console.log( aspectRatio );

  if ( aspectRatio < 4/3 ) {
    scrollShowHeader();
    elementNavMenuArea.style.maxHeight = '0';
  } else {
    const elementHeader = document.getElementById( 'header' );
    elementHeader.style.position = 'fixed';
    elementHeader.style.height   = '100vh';  
    elementHeader.style.overflowY = 'scroll';
    elementNavMenuArea.style.maxHeight = '100%';
  }

}, false );

/** A module file is end up here. : _script.js */