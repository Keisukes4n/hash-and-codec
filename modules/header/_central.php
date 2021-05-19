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
    <?php /* ?>
      <img src="<?php echo $pass_modules_icon; ?>/menu-icon-plain.svg" alt="menu-icon-plain.svg" id="imgMenuIcon">
    <?php */ ?>
    </div>
    <span class="website-title" id="spanWebsiteTitle">Web tools</span>
    <div class="operation-button-right ">
    </div>
  </section>
  
  <nav class="menu" id="navMenu">
    <ul>
      <span class="menu-head">list1</span>
      <a class="item" href="">
        <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/option-icon-plain.svg" alt="option-icon-plain.svg" >
        <li>item1-1</li>
      </a>
    </ul>
    <ul>
      <span class="menu-head">list2</span>
      <a class="item" href="">
        <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/guide-icon-plain.svg" alt="guide-icon-plain.svg">
        <li>item2-1</li>
      </a>
      <a class="item" href="">
        <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/guide-icon-plain.svg" alt="guide-icon-plain.svg">
        <li>item2-2</li>
      </a>
    </ul>
    <ul>
      <span class="menu-head">list3</span>
      <a class="item" href="" rel="noopener noreferrer" target="_balnk">
        <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/license-icon-plain.svg" alt="/icons/license-icon-plain.svg">
        <li>item3-1</li>
      </a>
      <a class="item" href="" rel="noopener noreferrer" target="_balnk">
        <img src="<?=htmlspecialchars( $pass_modules_icon, ENT_QUOTES );?>/information-icon-plain.svg" alt="information-icon-plain.svg" >
        <li>item3-2</li>
      </a>
    </ul>
  </nav>
  <script src="./modules/header/_script.js"></script>
</header>

<?php unset( $pass_modules_icon ); ?>

<?php /** a module file is end up here. : header/_central.php */ ?>