/**
 * module file: _script.js
 * description: 
 */

/** functions */
function clickCloseMenu( aspectRatio, eleMenuIcon, eleMenuArea ) {
  const flag = 'N';
  if ( aspectRatio < 4/3 ) {
    eleMenuIcon.style.transform = 'rotate(0.0turn)';
    eleMenuArea.style.height = '0';
  }
  return flag;
}

function clickOpenMenu( aspectRatio, eleMenuIcon, eleMenuArea ) {
  const flag = 'Y';
  if ( aspectRatio < 4/3 ) {
    eleMenuIcon.style.transform = 'rotate(0.5turn)';
    eleMenuArea.style.height = '60vw';
  }
  return flag;
}

function clickMenuBehavior( flag ) {
  const elementImgMenuIcon = document.getElementById( 'imgMenuIcon' );
  const elementNavMenuArea = document.getElementById( 'navMenu' );
  const aspectRatio        = getAspectRatio();
  switch ( flag ) {
    case 'N':
      flag = clickOpenMenu( aspectRatio, elementImgMenuIcon, elementNavMenuArea );
      break;
    case 'Y':
      flag = clickCloseMenu( aspectRatio, elementImgMenuIcon, elementNavMenuArea );
      break;
  }
  return flag;
}

function getAspectRatio() {
  const result = Number( window.innerWidth / window.innerHeight );
  return result;
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

function resetViewLandscape() {
  const elementHeader      = document.getElementById( 'header' );
  const elementImgMenuIcon = document.getElementById( 'imgMenuIcon' );
  const elementNavMenuArea = document.getElementById( 'navMenu' );
  const flag = 'N';
  elementHeader.style.position       = 'fixed';
  elementHeader.style.height         = '100vh';  
  elementHeader.style.overflowY      = 'scroll';
  elementImgMenuIcon.style.transform = 'rotate(0.0turn)';
  elementNavMenuArea.style.height    = '100vw';
  return flag;
}

function resetViewPortrait() {
  const elementHeader      = document.getElementById( 'header' );
  const elementNavMenuArea = document.getElementById( 'navMenu' );
  const flag = 'N';
  elementHeader.style.height      = '4.0rem';
  elementHeader.style.overflowY   = 'visible';
  elementNavMenuArea.style.height = '0';
  return flag;
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
let flagOpeningMenu = 'N';
const elemetDivOperationButtonLeft = document.getElementById( 'divOperationButtonLeft' );
elemetDivOperationButtonLeft.addEventListener( 'click', () => {
  flagOpeningMenu = clickMenuBehavior( flagOpeningMenu );
}, false );

window.addEventListener( 'scroll', () => {
  if ( flagOpeningMenu == 'Y' ) {
    flagOpeningMenu = clickCloseMenu( flagOpeningMenu, elementImgMenuIcon, elementNavMenuArea );
  }
}, false );


/** show and hide the header */
const scrollObject = { beforeY: 0, currentY: window.scrollY, directionY: null };
window.addEventListener( 'scroll', () => {
  const aspectRatio = getAspectRatio();
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
  const aspectRatio = getAspectRatio();
  if ( aspectRatio < 4/3 ) {
    flagOpeningMenu = resetViewPortrait();
  } else {
    flagOpeningMenu = resetViewLandscape();
  }
}, false );

/** A module file is end up here. : header/_script.js */