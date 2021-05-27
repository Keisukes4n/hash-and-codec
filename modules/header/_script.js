/**
 * module file: _script.js
 * description: 
 */

/** functions */
function clickCloseMenu( elementImgMenuIcon, elementNavMenuArea ) {
  elementImgMenuIcon.src          = elementImgMenuIcon.src.replace( 'menu-up', 'menu' );
  elementNavMenuArea.style.height = '0px';
}

function clickOpenMenu( elementImgMenuIcon, elementNavMenuArea ) {
  elementImgMenuIcon.src          = elementImgMenuIcon.src.replace( 'menu', 'menu-up' );
  elementNavMenuArea.style.height = '70vw';
}

function clickMenuBehavior( flag ) {
  const elementImgMenuIcon = document.getElementById( 'imgMenuIcon' );
  const elementNavMenuArea = document.getElementById( 'navMenu' );
  switch ( flag ) {
    case 'N':
      clickOpenMenu( elementImgMenuIcon, elementNavMenuArea );
      break;
    case 'Y':
      clickCloseMenu( elementImgMenuIcon, elementNavMenuArea );
      break;
  }
}

function getAspectRatio() {
  const result = Number( window.innerWidth / window.innerHeight );
  return result;
}

function getFlagOpenNavMenu() {
  let result  = null;
  const elementNavMenu   = document.getElementById( 'navMenu' );
  const styleNavMenu = window.getComputedStyle( elementNavMenu );
  if ( styleNavMenu.height == '0px' ) {
    result = 'N';
  } else {
    result = 'Y';
  }
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

function resetViewToLandscape( elementHeader, elementImgMenuIcon, elementNavMenuArea ) {
  elementHeader.style.height      = '100vh';  
  elementHeader.style.overflowY   = 'scroll';
  elementImgMenuIcon.src          = elementImgMenuIcon.src.replace( 'menu-up', 'menu' );
  elementNavMenuArea.style.height = '100vw';
}

function resetViewToPortrait( elementHeader, elementImgMenuIcon, elementNavMenuArea ) {
  elementHeader.style.height      = '4.0rem';
  elementHeader.style.overflowY   = 'visible';
  elementImgMenuIcon.src          = elementImgMenuIcon.src.replace( 'menu-up', 'menu' );
  elementNavMenuArea.style.height = '0px';
}

function scrollShowHeader() {
  const element = document.getElementById( 'header' );
  element.style.height = '4.0rem';
  window.setTimeout( () => {
    element.style.overflowY = 'visible';
  }, 200)
}
    
function scrollHideHeader() {
  const element = document.getElementById( 'header' );
  element.style.height    = '0';
  element.style.overflowY = 'hidden';
}

/** open and close the menu */
const elementDivOperationButtonLeft = document.getElementById( 'divOperationButtonLeft' );
elementDivOperationButtonLeft.addEventListener( 'click', () => {
  const aspectRatio = getAspectRatio();
  const flag        = getFlagOpenNavMenu();
  if ( aspectRatio < 4/3 ) {
    clickMenuBehavior( flag );
  }
}, false );


window.addEventListener( 'scroll', () => {
  const aspectRatio = getAspectRatio();
  if ( aspectRatio < 4/3 ) {
    const elementImgMenuIcon = document.getElementById( 'imgMenuIcon' );
    const elementNavMenuArea = document.getElementById( 'navMenu' );
    clickCloseMenu( elementImgMenuIcon, elementNavMenuArea );
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
  const aspectRatio        = getAspectRatio();
  const elementHeader      = document.getElementById( 'header' );
  const elementImgMenuIcon = document.getElementById( 'imgMenuIcon' );
  const elementNavMenuArea = document.getElementById( 'navMenu' );
  if ( aspectRatio < 4/3 ) {
    resetViewToPortrait( elementHeader, elementImgMenuIcon, elementNavMenuArea );
  } else {
    resetViewToLandscape( elementHeader, elementImgMenuIcon, elementNavMenuArea );
  }
}, false );

/** A module file is end up here. : header/_script.js */