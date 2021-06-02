<?php 
  /**
   * module file: _header.php
   * description: This file is called from index.php in front directory.
   */

  /** parameters */
  $pass_modules_icon = './modules/icon';
?>

<header id="header">
  <section class="primary">
    <div class="operation-button-left" id="divOperationButtonLeft">
    
      <img src="<?php echo $pass_modules_icon; ?>/menu-icon-plain.svg" alt="menu-icon-plain.svg" id="imgMenuIcon">
    
    </div>
    <span class="website-title" id="spanWebsiteTitle">Web tools</span>
    <div class="operation-button-right" id="divOperationButtonRight">
    </div>
  </section>
  
  <!--
  <nav class="menu" id="navMenu">
    <div class="categories">
      <ul>
        <h3>list1</h3>
        <a class="item" href="">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/option-icon-plain.svg" alt="option-icon-plain.svg" >
          <li>item1-1</li>
        </a>
      </ul>
      <ul>
        <h3>list2</h3>
        <a class="item" href="">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/guide-icon-plain.svg" alt="guide-icon-plain.svg">
          <li>item2-1</li>
        </a>
        <a class="item" href="">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/guide-icon-plain.svg" alt="guide-icon-plain.svg">
          <li>item2-2</li>
        </a>
        <a class="item" href="">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/guide-icon-plain.svg" alt="guide-icon-plain.svg">
          <li>item2-3</li>
        </a>
      </ul>
      <ul>
        <h3>list3</h3>
          <a class="item" href="" rel="noopener noreferrer" target="_balnk">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/license-icon-plain.svg" alt="/icons/license-icon-plain.svg">
          <li>item3-1</li>
        </a>
        <a class="item" href="" rel="noopener noreferrer" target="_balnk">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/information-icon-plain.svg" alt="information-icon-plain.svg" >
          <li>item3-2</li>
        </a>
        <a class="item" href="" rel="noopener noreferrer" target="_balnk">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/information-icon-plain.svg" alt="information-icon-plain.svg" >
          <li>item3-3</li>
        </a>
        <a class="item" href="" rel="noopener noreferrer" target="_balnk">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/information-icon-plain.svg" alt="information-icon-plain.svg" >
          <li>item3-4</li>
        </a>
      </ul>
      <ul>
        <h3>list4</h3>
        <a class="item" href="">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/guide-icon-plain.svg" alt="guide-icon-plain.svg">
          <li>item4-1</li>
        </a>
        <a class="item" href="">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/guide-icon-plain.svg" alt="guide-icon-plain.svg">
          <li>item4-2</li>
        </a>
        <a class="item" href="">
          <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/guide-icon-plain.svg" alt="guide-icon-plain.svg">
          <li>item4-3</li>
        </a>
      </ul>
    </div>
    <p>Click an icon at upper left side to close this menu.</p>
  </nav>
  -->
</header>

<?php unset( $pass_modules_icon ); ?>

<?php /** a module file is end up here. : header/_central.php */ ?>