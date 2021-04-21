<?php 
  /**
   * module file: _header.php
   * 
   * This file is called from index.php in front directory.
   */
  $pass_modules_icon = './modules/icon';
?>

<header>
  <section class="primary">
    <div class="operation-button-left" id="divOperationButtonLeft">
      <img src="<?php echo $pass_modules_icon; ?>/menu-icon-plain.svg" alt="menu-icon-plain.svg" id="imgMenuIcon">
    </div>
    <span class="website-title" id="spanWebsiteTitle">Tools</span>
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
</header>

<?php unset( $pass_modules_icon ); ?>