<?php 
  /**
   * page module file: _header.php
   * 
   */

  $pass_modules = '/web-tools-string-conversion/modules';
?>

<header>
  <section class="primary">
    <div class="operation-button-left" id="divOperationButtonLeft">
      <img src="<?php echo $pass_modules; ?>/icon/menu-icon-plain.svg" alt="menu-icon-plain.svg" id="imgMenuIcon">
    </div>
    <span class="website-title" id="spanWebsiteTitle">Website title</span>
    <div class="operation-button-right ">
    </div>
  </section>
  <nav class="menu" id="navMenu">
    <ul>
      <span class="menu-head">list1</span>
      <a class="item" href="">
        <img src="<?php echo $pass_modules; ?>/icon/option-icon-plain.svg" alt="option-icon-plain.svg" >
        <li>item1-1</li>
      </a>
    </ul>
    <ul>
      <span class="menu-head">list2</span>
      <a class="item" href="">
        <img src="<?php echo $pass_modules; ?>/icon/guide-icon-plain.svg" alt="guide-icon-plain.svg">
        <li>item2-1</li>
      </a>
      <a class="item" href="">
        <img src="<?php echo $pass_modules; ?>/icon/guide-icon-plain.svg" alt="guide-icon-plain.svg">
        <li>item2-2</li>
      </a>
    </ul>
    <ul>
      <span class="menu-head">list3</span>
      <a class="item" href="" rel="noopener noreferrer" target="_balnk">
        <img src="<?php echo $pass_modules; ?>/icon/license-icon-plain.svg" alt="/icons/license-icon-plain.svg">
        <li>item3-1</li>
      </a>
      <a class="item" href="" rel="noopener noreferrer" target="_balnk">
        <img src="<?php echo $pass_modules; ?>/icon/information-icon-plain.svg" alt="information-icon-plain.svg" >
        <li>item3-2</li>
      </a>
    </ul>
  </nav>

  <script type="text/javascript" src="<?php echo $pass_modules; ?>/header/_script.js"></script>
</header>