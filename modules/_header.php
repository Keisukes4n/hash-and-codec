<?php 
  /**
   * module file: _header.php
   * 
   * This file is called from index.php in front directory.
   */

  /** parameters */
  $pass_modules_icon = './modules/icon';
?>

<header id="header">
  <section class="primary">
    <div class="operation-button-left" id="divOperationButtonLeft">
    <!--
      <img src="<?php echo $pass_modules_icon; ?>/menu-icon-plain.svg" alt="menu-icon-plain.svg" id="imgMenuIcon">
    -->
    </div>
    <span class="website-title" id="spanWebsiteTitle">Web tools</span>
    <div class="operation-button-right ">
    </div>
  </section>
  <nav class="menu" id="navMenu">
    <ul>
      <span class="menu-head">list1</span>
      <a class="item" href="">
        <img src="<?php echo $pass_modules_icon; ?>/option-icon-plain.svg" alt="option-icon-plain.svg" >
        <li>item1-1</li>
      </a>
    </ul>
    <ul>
      <span class="menu-head">list2</span>
      <a class="item" href="">
        <img src="<?php echo $pass_modules_icon; ?>/guide-icon-plain.svg" alt="guide-icon-plain.svg">
        <li>item2-1</li>
      </a>
      <a class="item" href="">
        <img src="<?php echo $pass_modules_icon; ?>/guide-icon-plain.svg" alt="guide-icon-plain.svg">
        <li>item2-2</li>
      </a>
    </ul>
    <ul>
      <span class="menu-head">list3</span>
      <a class="item" href="" rel="noopener noreferrer" target="_balnk">
        <img src="<?php echo $pass_modules_icon; ?>/license-icon-plain.svg" alt="/icons/license-icon-plain.svg">
        <li>item3-1</li>
      </a>
      <a class="item" href="" rel="noopener noreferrer" target="_balnk">
        <img src="<?php echo $pass_modules_icon; ?>/information-icon-plain.svg" alt="information-icon-plain.svg" >
        <li>item3-2</li>
      </a>
    </ul>
  </nav>

  <?php /* ?>
  <script>
    const elementdivOperationButtonLeft = document.getElementById( 'divOperationButtonLeft' );
    const elementImgMenuIcon            = document.getElementById( 'imgMenuIcon' );
    const elementNavMenuArea            = document.getElementById( 'navMenu' );
    let openFlagOfMenu  = 'close';
    let tempSrcProperty = 'temp';

    elementdivOperationButtonLeft.addEventListener( 'click', () => {
      switch ( openFlagOfMenu ) {
        case 'close':
          openFlagOfMenu  = 'open';
          tempSrcProperty = elementImgMenuIcon.src;
          elementImgMenuIcon.src = tempSrcProperty.replace('menu-icon', 'close-icon');
          elementNavMenuArea.style.maxHeight = '80vw';
          break;
        case 'open':
          openFlagOfMenu = 'close';
          tempSrcProperty = elementImgMenuIcon.src;
          elementImgMenuIcon.src = tempSrcProperty.replace('close-icon', 'menu-icon');
          elementNavMenuArea.style.maxHeight = '0vw';
          break;
      }
    }, false );

    document.addEventListener( 'scroll', () => {
      if ( openFlagOfMenu == 'open' ) {
        openFlagOfMenu  = 'close';
        tempSrcProperty = elementImgMenuIcon.src;
        elementImgMenuIcon.src = tempSrcProperty.replace('close-icon', 'menu-icon');
        elementNavMenuArea.style.maxHeight = '0vw';
      }
    }, false );
  </script>
  <?php */ ?>
</header>

<script>
/**
    let scrlCurrentY = window.scrollY;
    window.addEventListener( 'scroll', () => {
      const scrlBefore = scrlCurrentY
      scrlCurrentY     = window.scrollY;
      const scrlFlc    = scrlCurrentY - scrlBefore;
      let direction = null;
      if ( scrlFlc > 0) {
        direction = 'down';
      } else if ( scrlFlc < 0) {
        direction = 'up';
      }
      return direction;
    }, false );
*/

  function setHeaderPositionFixed() {
    const elementHeader = document.getElementById( 'header' );
    elementHeader.style.position = 'fixed';
  }

  function setHeaderPositionStatic() {
    const elementHeader = document.getElementById( 'header' );
    elementHeader.style.position = 'static';
  }

  function judgeScrollDirection( beforeY, currentY ) {
    let result      = null;
    let fluctuation = currentY - beforeY;
    if ( fluctuation > 0) {
      result = 'down';
      setHeaderPositionStatic();
    } else {
      result = 'up';
      setHeaderPositionFixed();
    }
    return result;
  }

  const scrollObject = { beforeY: 0, currentY: window.scrollY, directionY: null };
  window.addEventListener( 'scroll', () => {
    scrollObject.currentY   = window.scrollY;    
    scrollObject.directionY = judgeScrollDirection( scrollObject.beforeY, scrollObject.currentY );
    scrollObject.beforeY    = scrollObject.currentY;

    if ( scrollObject.currentY == 0 ) {
      setHeaderPositionStatic();
    }
    console.log( scrollObject.directionY );

  }, false );

</script>

<?php unset( $pass_modules_icon ); ?>
<?php /** A module file is end up here. : _base64.php */ ?>