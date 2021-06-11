/**
 * module file: _script.js
 * description:
 */
/** functions */
function clickCloseMenu(imgMenuIcon, navMenuArea) {
    imgMenuIcon.src = imgMenuIcon.src.replace('menu-up', 'menu');
    navMenuArea.style.height = '0px';
}
function clickOpenMenu(imgMenuIcon, navMenuArea) {
    imgMenuIcon.src = imgMenuIcon.src.replace('menu', 'menu-up');
    navMenuArea.style.height = '70vh';
}
function clickMenuBehavior(flag) {
    var imgMenuIcon = document.getElementById('imgMenuIcon');
    var navMenuArea = document.getElementById('navMenu');
    switch (flag) {
        case 'N':
            clickOpenMenu(imgMenuIcon, navMenuArea);
            break;
        case 'Y':
            clickCloseMenu(imgMenuIcon, navMenuArea);
            break;
    }
}
function getAspectRatio() {
    return Number(window.innerWidth / window.innerHeight);
}
function getFlagOpenNavMenu() {
    var result = 'result';
    var elementNavMenu = document.getElementById('navMenu');
    var styleNavMenu = window.getComputedStyle(elementNavMenu);
    if (styleNavMenu.height == '0px') {
        result = 'N';
    }
    else {
        result = 'Y';
    }
    return result;
}
function judgeScrollDirection(beforeY, currentY) {
    var result = 'result';
    var fluctuation = currentY - beforeY;
    if (fluctuation > 0) {
        result = 'down';
        scrollHideHeader();
    }
    else {
        result = 'up';
        scrollShowHeader();
    }
    return result;
}
function resetViewToLandscape(header, imgMenuIcon, navMenuArea) {
    header.style.height = '100vh';
    header.style.overflowY = 'scroll';
    imgMenuIcon.src = imgMenuIcon.src.replace('menu-up', 'menu');
    navMenuArea.style.height = '100vh';
}
function resetViewToPortrait(header, imgMenuIcon, navMenuArea) {
    header.style.height = '4.0rem';
    header.style.overflowY = 'visible';
    imgMenuIcon.src = imgMenuIcon.src.replace('menu-up', 'menu');
    navMenuArea.style.height = '0px';
}
function scrollShowHeader() {
    var header = document.getElementById('header');
    header.style.height = '4.0rem';
    setTimeout(function () {
        header.style.overflowY = 'visible';
    }, 200);
}
function scrollHideHeader() {
    var header = document.getElementById('header');
    header.style.height = '0';
    header.style.overflowY = 'hidden';
}
/** process for event */
function processResizeEvents() {
    window.addEventListener('resize', function () {
        var aspectRatio = getAspectRatio();
        var header = document.getElementById('header');
        var navMenuArea = document.getElementById('navMenu');
        var imgMenuIcon = document.getElementById('imgMenuIcon');
        if (aspectRatio < 4 / 3) {
            resetViewToPortrait(header, imgMenuIcon, navMenuArea);
        }
        else {
            resetViewToLandscape(header, imgMenuIcon, navMenuArea);
        }
    }, false);
}
function processScrollEvents() {
    var obj = { beforeY: 0, currentY: window.scrollY };
    window.addEventListener('scroll', function () {
        var aspectRatio = getAspectRatio();
        if (aspectRatio < 4 / 3) {
            obj.currentY = window.scrollY;
            judgeScrollDirection(obj.beforeY, obj.currentY);
            obj.beforeY = obj.currentY;
            if (obj.currentY == 0) {
                scrollShowHeader();
            }
        }
    }, false);
    window.addEventListener('scroll', function () {
        var aspectRatio = getAspectRatio();
        if (aspectRatio < 4 / 3) {
            var imgMenuIcon = document.getElementById('imgMenuIcon');
            var navMenuArea = document.getElementById('navMenu');
            clickCloseMenu(imgMenuIcon, navMenuArea);
        }
    }, false);
}
function processClickEvent() {
    document.getElementById('divOperationButtonLeft').addEventListener('click', function () {
        var aspectRatio = getAspectRatio();
        var flag = getFlagOpenNavMenu();
        if (aspectRatio < 4 / 3) {
            clickMenuBehavior(flag);
        }
    }, false);
}
processClickEvent();
processResizeEvents();
processScrollEvents();
/** a module file is end up here. : header/_script.js */ 
