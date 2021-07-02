/**
 * module file: _script.js
 * description: 
 */

class headerControl {
  private buttonLeft:  HTMLElement|null;
  private header:      HTMLElement|null;
  private menu:        HTMLElement|null;
  private menuIcon:    HTMLElement|null;
  private scroll:      scrollParams;

  constructor() {
    this.header      = document.getElementById( 'header' );
    this.menu        = document.getElementById( 'navMenu' );
    this.menuIcon    = document.getElementById( 'imgMenuIcon' );
    this.buttonLeft  = document.getElementById( 'divOperationButtonLeft' );
    this.scroll      = {
      beforeY:  0,
    }

    this.prepareHeaderActionScroll();
    this.prepareMenuActionClick();
    this.prepareMenuActionScroll();
    this.prepareLayoutChangeResize();
  }

  public currentAspectRatio(): number {
    return window.innerWidth / window.innerHeight;
  }

  public watchScrollDirection(): string {
    const currentY: number    = window.scrollY;
    const fluctuation: number = currentY - this.scroll.beforeY;
    let result: string = '';
    if ( fluctuation > 0 ) {
      result = 'down';
    } else if ( fluctuation < 0) {
      result = 'up';
    }
    this.scroll.beforeY  = currentY;
    return result;
  }

  public prepareMenuActionScroll(): void {
    let menu: HTMLElement;
    if ( this.menu instanceof HTMLElement ) {
      menu = this.menu;
    }
    let icon: HTMLImageElement;
    if ( this.menuIcon instanceof HTMLImageElement ) {
      icon = this.menuIcon;
    }
    window.addEventListener( 'scroll', () => {
      if ( ( this.currentAspectRatio() < 4/3 ) && ( menu.style.height == '70vh' ) ) {
        icon.src          = icon.src.replace( 'menu-up', 'menu' );
        menu.style.height = '0px';
      }
    }, false );
  }

  public prepareMenuActionClick(): void {
    let menu: HTMLElement;
    if ( this.menu instanceof HTMLElement ) {
      menu = this.menu;
    }
    let icon: HTMLImageElement;
    if ( this.menuIcon instanceof HTMLImageElement ) {
      icon = this.menuIcon;
    }
    this.buttonLeft?.addEventListener( 'click', () => {
      switch ( menu.style.height ) {
        case '':
        case '0px':
          icon.src          = icon.src.replace( 'menu', 'menu-up' );
          menu.style.height = '70vh';
          break;
        case '70vh':
          icon.src          = icon.src.replace( 'menu-up', 'menu' );
          menu.style.height = '0px';
          break;
      }
    }, false );
  }

  public prepareHeaderActionScroll(): void {
    let header: HTMLElement;
    if ( this.header instanceof HTMLElement ) {
      header = this.header;
    }
    window.addEventListener( 'scroll', () => {
      if ( this.currentAspectRatio() < 4/3 ) {
        const direction = this.watchScrollDirection();
        switch ( direction ) {
          case 'up':
            header.style.height = '4.0rem';
            setTimeout( () => {
              header.style.overflowY = 'visible';
            }, 200);
            break;
          case 'down':
            header.style.height    = '0';
            header.style.overflowY = 'hidden';
            break;
        }
      }
    }, false );
  }

  public prepareLayoutChangeResize(): void {
    let header: HTMLElement;
    if ( this.header instanceof HTMLElement ) {
      header = this.header;
    }
    let menu: HTMLElement;
    if ( this.menu instanceof HTMLElement ) {
      menu = this.menu;
    }
    let icon: HTMLImageElement;
    if ( this.menuIcon instanceof HTMLImageElement ) {
      icon = this.menuIcon;
    }
    window.addEventListener( 'resize', () => {
      icon.src               = icon.src.replace( 'menu-up', 'menu' );
      if ( this.currentAspectRatio() < 4/3 ) {
        header.style.height    = '4.0rem';
        header.style.overflowY = 'visible';
        menu.style.height      = '0px';
      } else {
        header.style.height    = '100vh';  
        header.style.overflowY = 'scroll';
        menu.style.height      = '100vh';
      }
    }, false );
  }
}

const headerControlInstance = new headerControl;

/** a module file is end up here. : header/_script.js */