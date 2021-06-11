/**
 * module file: _script.js
 * description: 
 */

/** functions */
function clickCloseMenu( imgMenuIcon:HTMLImageElement, navMenuArea:HTMLElement ):void {
  imgMenuIcon.src          = imgMenuIcon.src.replace( 'menu-up', 'menu' );
  navMenuArea.style.height = '0px';
}

function clickOpenMenu( imgMenuIcon:HTMLImageElement, navMenuArea:HTMLElement ):void {
  imgMenuIcon.src          = imgMenuIcon.src.replace( 'menu', 'menu-up' );
  navMenuArea.style.height = '70vh';
}

function clickMenuBehavior( flag:string ):void {
  const imgMenuIcon:HTMLImageElement = document.getElementById( 'imgMenuIcon' ) as HTMLImageElement;
  const navMenuArea:HTMLElement      = document.getElementById( 'navMenu' );
  switch ( flag ) {
    case 'N':
      clickOpenMenu( imgMenuIcon, navMenuArea );
      break;
    case 'Y':
      clickCloseMenu( imgMenuIcon, navMenuArea );
      break;
  }
}

function getAspectRatio():number {
  return Number( window.innerWidth / window.innerHeight );
}

function getFlagOpenNavMenu():string {
  let result:string = 'result';
  const elementNavMenu:HTMLElement       = document.getElementById( 'navMenu' );
  const styleNavMenu:CSSStyleDeclaration = window.getComputedStyle( elementNavMenu );
  if ( styleNavMenu.height == '0px' ) {
    result = 'N';
  } else {
    result = 'Y';
  }
  return result;
}

function judgeScrollDirection( beforeY:number, currentY:number ):string {
  let result:string      = 'result';
  let fluctuation:number = currentY - beforeY;
  if ( fluctuation > 0) {
    result = 'down';
    scrollHideHeader();
  } else {
    result = 'up';
    scrollShowHeader();
  }
  return result;
}

function resetViewToLandscape( header:HTMLElement, imgMenuIcon:HTMLImageElement, navMenuArea:HTMLElement ):void {
  header.style.height      = '100vh';  
  header.style.overflowY   = 'scroll';
  imgMenuIcon.src          = imgMenuIcon.src.replace( 'menu-up', 'menu' );
  navMenuArea.style.height = '100vh';
}

function resetViewToPortrait( header:HTMLElement, imgMenuIcon:HTMLImageElement, navMenuArea:HTMLElement ):void {
  header.style.height      = '4.0rem';
  header.style.overflowY   = 'visible';
  imgMenuIcon.src          = imgMenuIcon.src.replace( 'menu-up', 'menu' );
  navMenuArea.style.height = '0px';
}

function scrollShowHeader():void {
  const header:HTMLElement = document.getElementById( 'header' );
  header.style.height = '4.0rem';
  setTimeout( () => {
    header.style.overflowY = 'visible';
  }, 200);
}

function scrollHideHeader():void {
  const header:HTMLElement = document.getElementById( 'header' );
  header.style.height    = '0';
  header.style.overflowY = 'hidden';
}

/** process for event */
function processResizeEvents():void { /** reset layout depend on aspect ratio. */
  window.addEventListener( 'resize', () => {
    const aspectRatio:number           = getAspectRatio();
    const header:HTMLElement           = document.getElementById( 'header' );
    const navMenuArea:HTMLElement      = document.getElementById( 'navMenu' );
    const imgMenuIcon:HTMLImageElement = document.getElementById( 'imgMenuIcon' ) as HTMLImageElement;
    if ( aspectRatio < 4/3 ) {
      resetViewToPortrait( header, imgMenuIcon, navMenuArea );
    } else {
      resetViewToLandscape( header, imgMenuIcon, navMenuArea );
    }
  }, false );
}

function processScrollEvents():void { /** show and hide the header. */
  const obj:scrollInfo = { beforeY: 0, currentY: window.scrollY };
  window.addEventListener( 'scroll', () => {
    const aspectRatio:number = getAspectRatio();
    if ( aspectRatio < 4/3 ) {
      obj.currentY = window.scrollY;    
      judgeScrollDirection( obj.beforeY, obj.currentY );
      obj.beforeY  = obj.currentY;

      if ( obj.currentY == 0 ) {
        scrollShowHeader();
      }
    }
  }, false );

  window.addEventListener( 'scroll', () => {
    const aspectRatio:number = getAspectRatio();
    if ( aspectRatio < 4/3 ) {
      const imgMenuIcon:HTMLImageElement = document.getElementById( 'imgMenuIcon' ) as HTMLImageElement;
      const navMenuArea:HTMLElement      = document.getElementById( 'navMenu' );
      clickCloseMenu( imgMenuIcon, navMenuArea );
    }
  }, false );
}

function processClickEvent():void { /** open and close the menu. */
  document.getElementById( 'divOperationButtonLeft' ).addEventListener( 'click', () => {
    const aspectRatio:number = getAspectRatio();
    const flag:string        = getFlagOpenNavMenu();
    if ( aspectRatio < 4/3 ) {
      clickMenuBehavior( flag );
    }
  }, false );
}

processClickEvent();
processResizeEvents();
processScrollEvents();

/** a module file is end up here. : header/_script.js */