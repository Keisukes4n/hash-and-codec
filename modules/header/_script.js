/**
 * module file: _script.js
 * description: 
 */

/** functions */
function clickCloseMenu( flag, eleMenuIcon, eleMenuArea ) {
  flag = 'N';
  eleMenuIcon.src = eleMenuIcon.src.replace( 'close-icon', 'menu-icon' );
  eleMenuArea.style.maxHeight = '0vw';
  return flag;
}

function clickOpenMenu( flag, eleMenuIcon, eleMenuArea ) {
  flag = 'Y';
  eleMenuIcon.src = eleMenuIcon.src.replace( 'menu-icon', 'close-icon' );
  eleMenuArea.style.maxHeight = '80vw';
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
/*
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
*/

/** show and hide the header */
const scrollObject = { beforeY: 0, currentY: window.scrollY, directionY: null };
window.addEventListener( 'scroll', () => {
  scrollObject.currentY   = window.scrollY;    
  scrollObject.directionY = judgeScrollDirection( scrollObject.beforeY, scrollObject.currentY );
  scrollObject.beforeY    = scrollObject.currentY;

  if ( scrollObject.currentY == 0 ) {
    scrollShowHeader();
  }
}, false );

/** A module file is end up here. : _script.js */