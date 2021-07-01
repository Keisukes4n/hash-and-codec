<?php

declare( strict_types=1 );

/**
 * module file: _header.php
 * description: This file is called from index.php in front directory.
 */

class header {
  private string $icons_pass;

  public function __construct() {
    $this->icons_pass   = './modules/icon';
  }

  public function getIconsPass(): string {
    return $this->icons_pass;
  }
}

$header_instance = new header;

?>

<header id="header">
  <section class="primary">
    <div class="operation-button-left" id="divOperationButtonLeft">
      <img src="<?php echo $header_instance->getIconsPass(); ?>/menu-icon-plain.svg" alt="menu-icon-plain.svg" id="imgMenuIcon">
    </div>
    <span class="website-title" id="spanWebsiteTitle">Web tools</span>
    <div class="operation-button-right" id="divOperationButtonRight">
    </div>
  </section>
  
  <nav class="menu" id="navMenu">
    <div class="categories">
      <ul>
        <h3>License</h3>
        <a class="item" href="https://www.apache.org/licenses/LICENSE-2.0.html" target="_blank" rel="noreferrer">
          <img src="<?php echo $header_instance->getIconsPass(); ?>/license-icon-plain.svg" alt="license-icon-plain.svg" >
          <li>Apache License, Version 2.0</li>
        </a>
        <a class="item" href="https://creativecommons.org/licenses/by/4.0/deed.en" target="_blank" rel="noreferrer">
          <img src="<?php echo $header_instance->getIconsPass(); ?>/license-icon-plain.svg" alt="license-icon-plain.svg" >
          <li>CC BY 4.0</li>
        </a>
      </ul>
    </div>
    <p>Click an icon at upper left side to close this menu.</p>
  </nav>
</header>

<?php unset( $header_instance ); ?>
<?php /** a module file is end up here. : header/_central.php */ ?>