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
    const imgMenuIcon = document.getElementById('imgMenuIcon');
    const navMenuArea = document.getElementById('navMenu');
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
    let result = 'result';
    const elementNavMenu = document.getElementById('navMenu');
    const styleNavMenu = window.getComputedStyle(elementNavMenu);
    if (styleNavMenu.height == '0px') {
        result = 'N';
    }
    else {
        result = 'Y';
    }
    return result;
}
function judgeScrollDirection(beforeY, currentY) {
    let result = 'result';
    let fluctuation = currentY - beforeY;
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
    const header = document.getElementById('header');
    header.style.height = '4.0rem';
    setTimeout(() => {
        header.style.overflowY = 'visible';
    }, 200);
}
function scrollHideHeader() {
    const header = document.getElementById('header');
    header.style.height = '0';
    header.style.overflowY = 'hidden';
}
/** process for event */
function processResizeEvents() {
    window.addEventListener('resize', () => {
        const aspectRatio = getAspectRatio();
        const header = document.getElementById('header');
        const navMenuArea = document.getElementById('navMenu');
        const imgMenuIcon = document.getElementById('imgMenuIcon');
        if (aspectRatio < 4 / 3) {
            resetViewToPortrait(header, imgMenuIcon, navMenuArea);
        }
        else {
            resetViewToLandscape(header, imgMenuIcon, navMenuArea);
        }
    }, false);
}
function processScrollEvents() {
    const obj = { beforeY: 0, currentY: window.scrollY };
    window.addEventListener('scroll', () => {
        const aspectRatio = getAspectRatio();
        if (aspectRatio < 4 / 3) {
            obj.currentY = window.scrollY;
            judgeScrollDirection(obj.beforeY, obj.currentY);
            obj.beforeY = obj.currentY;
            if (obj.currentY == 0) {
                scrollShowHeader();
            }
        }
    }, false);
    window.addEventListener('scroll', () => {
        const aspectRatio = getAspectRatio();
        if (aspectRatio < 4 / 3) {
            const imgMenuIcon = document.getElementById('imgMenuIcon');
            const navMenuArea = document.getElementById('navMenu');
            clickCloseMenu(imgMenuIcon, navMenuArea);
        }
    }, false);
}
function processClickEvent() {
    document.getElementById('divOperationButtonLeft').addEventListener('click', () => {
        const aspectRatio = getAspectRatio();
        const flag = getFlagOpenNavMenu();
        if (aspectRatio < 4 / 3) {
            clickMenuBehavior(flag);
        }
    }, false);
}
processClickEvent();
processResizeEvents();
processScrollEvents();
/** a module file is end up here. : header/_script.js */ 
