/**
 * module file: _script.js
 * description: 
 */

/** functions */
function clickCloseMenu( eleImgMenuIcon, eleNavMenuArea ) {
  eleImgMenuIcon.src          = eleImgMenuIcon.src.replace( 'menu-up', 'menu' );
  eleNavMenuArea.style.height = '0';
}

function clickOpenMenu( eleImgMenuIcon, eleNavMenuArea ) {
  eleImgMenuIcon.src          = eleImgMenuIcon.src.replace( 'menu', 'menu-up' );
  eleNavMenuArea.style.height = '70vw';
}

function clickMenuBehavior( flag ) {
  const eleImgMenuIcon = document.getElementById( 'imgMenuIcon' );
  const eleNavMenuArea = document.getElementById( 'navMenu' );
  switch ( flag ) {
    case 'N':
      clickOpenMenu( eleImgMenuIcon, eleNavMenuArea );
      break;
    case 'Y':
      clickCloseMenu( eleImgMenuIcon, eleNavMenuArea );
      break;
  }
}

function getAspectRatio() {
  const result = Number( window.innerWidth / window.innerHeight );
  return result;
}

function getFlagOpenNavMenu() {
  let result  = null;
  const ele   = document.getElementById( 'navMenu' );
  const style = window.getComputedStyle( ele );
  if ( style.height == '0px' ) {
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

function resetViewToLandscape( eleHeader, eleImgMenuIcon, eleNavMenuArea ) {
  eleHeader.style.height      = '100vh';  
  eleHeader.style.overflowY   = 'scroll';
  eleImgMenuIcon.src          = eleImgMenuIcon.src.replace( 'menu-up', 'menu' );
  eleNavMenuArea.style.height = '100vw';
}

function resetViewToPortrait( eleHeader, eleImgMenuIcon, eleNavMenuArea ) {
  eleHeader.style.height      = '4.0rem';
  eleHeader.style.overflowY   = 'visible';
  eleImgMenuIcon.src          = eleImgMenuIcon.src.replace( 'menu-up', 'menu' );
  eleNavMenuArea.style.height = '0';
}

function scrollShowHeader() {
  const eleHeader = document.getElementById( 'header' );
  eleHeader.style.height = '4.0rem';
  window.setTimeout( () => {
    eleHeader.style.overflowY = 'visible';
  }, 200)
}
    
function scrollHideHeader() {
  const eleHeader = document.getElementById( 'header' );
  eleHeader.style.height    = '0';
  eleHeader.style.overflowY = 'hidden';
}

/** open and close the menu */
const eleDivOperationButtonLeft = document.getElementById( 'divOperationButtonLeft' );
eleDivOperationButtonLeft.addEventListener( 'click', () => {
  const aspectRatio = getAspectRatio();
  const flag        = getFlagOpenNavMenu();
  if ( aspectRatio < 4/3 ) {
    clickMenuBehavior( flag );
  }
}, false );


window.addEventListener( 'scroll', () => {
  const aspectRatio = getAspectRatio();
  if ( aspectRatio < 4/3 ) {
    const eleImgMenuIcon = document.getElementById( 'imgMenuIcon' );
    const eleNavMenuArea = document.getElementById( 'navMenu' );
    clickCloseMenu( eleImgMenuIcon, eleNavMenuArea );
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
  const aspectRatio    = getAspectRatio();
  const eleHeader      = document.getElementById( 'header' );
  const eleImgMenuIcon = document.getElementById( 'imgMenuIcon' );
  const eleNavMenuArea = document.getElementById( 'navMenu' );
  if ( aspectRatio < 4/3 ) {
    resetViewToPortrait( eleHeader, eleImgMenuIcon, eleNavMenuArea );
  } else {
    resetViewToLandscape( eleHeader, eleImgMenuIcon, eleNavMenuArea );
  }
}, false );

/** A module file is end up here. : header/_script.js */