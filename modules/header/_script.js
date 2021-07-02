"use strict";
/**
 * module file: _script.js
 * description:
 */
class headerControl {
    constructor() {
        this.header = document.getElementById('header');
        this.menu = document.getElementById('navMenu');
        this.menuIcon = document.getElementById('imgMenuIcon');
        this.buttonLeft = document.getElementById('divOperationButtonLeft');
        this.scroll = {
            beforeY: 0,
        };
        this.prepareHeaderActionScroll();
        this.prepareMenuActionClick();
        this.prepareMenuActionScroll();
        this.prepareLayoutChangeResize();
    }
    currentAspectRatio() {
        return window.innerWidth / window.innerHeight;
    }
    watchScrollDirection() {
        const currentY = window.scrollY;
        const fluctuation = currentY - this.scroll.beforeY;
        let result = '';
        if (fluctuation > 0) {
            result = 'down';
        }
        else if (fluctuation < 0) {
            result = 'up';
        }
        this.scroll.beforeY = currentY;
        return result;
    }
    prepareMenuActionScroll() {
        let menu;
        if (this.menu instanceof HTMLElement) {
            menu = this.menu;
        }
        let icon;
        if (this.menuIcon instanceof HTMLImageElement) {
            icon = this.menuIcon;
        }
        window.addEventListener('scroll', () => {
            if ((this.currentAspectRatio() < 4 / 3) && (menu.style.height == '70vh')) {
                icon.src = icon.src.replace('menu-up', 'menu');
                menu.style.height = '0px';
            }
        }, false);
    }
    prepareMenuActionClick() {
        var _a;
        let menu;
        if (this.menu instanceof HTMLElement) {
            menu = this.menu;
        }
        let icon;
        if (this.menuIcon instanceof HTMLImageElement) {
            icon = this.menuIcon;
        }
        (_a = this.buttonLeft) === null || _a === void 0 ? void 0 : _a.addEventListener('click', () => {
            switch (menu.style.height) {
                case '':
                case '0px':
                    icon.src = icon.src.replace('menu', 'menu-up');
                    menu.style.height = '70vh';
                    break;
                case '70vh':
                    icon.src = icon.src.replace('menu-up', 'menu');
                    menu.style.height = '0px';
                    break;
            }
        }, false);
    }
    prepareHeaderActionScroll() {
        let header;
        if (this.header instanceof HTMLElement) {
            header = this.header;
        }
        window.addEventListener('scroll', () => {
            if (this.currentAspectRatio() < 4 / 3) {
                const direction = this.watchScrollDirection();
                switch (direction) {
                    case 'up':
                        header.style.height = '4.0rem';
                        setTimeout(() => {
                            header.style.overflowY = 'visible';
                        }, 200);
                        break;
                    case 'down':
                        header.style.height = '0';
                        header.style.overflowY = 'hidden';
                        break;
                }
            }
        }, false);
    }
    prepareLayoutChangeResize() {
        let header;
        if (this.header instanceof HTMLElement) {
            header = this.header;
        }
        let menu;
        if (this.menu instanceof HTMLElement) {
            menu = this.menu;
        }
        let icon;
        if (this.menuIcon instanceof HTMLImageElement) {
            icon = this.menuIcon;
        }
        window.addEventListener('resize', () => {
            icon.src = icon.src.replace('menu-up', 'menu');
            if (this.currentAspectRatio() < 4 / 3) {
                header.style.height = '4.0rem';
                header.style.overflowY = 'visible';
                menu.style.height = '0px';
            }
            else {
                header.style.height = '100vh';
                header.style.overflowY = 'scroll';
                menu.style.height = '100vh';
            }
        }, false);
    }
}
const headerControlInstance = new headerControl;
/** a module file is end up here. : header/_script.js */ 
