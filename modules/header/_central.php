<?php

declare( strict_types=1 );

/**
 * module file: _header.php
 * description: This file is called from index.php in front directory.
 */

class header {
  private string $icons_pass;
  private string $license_pass;

  public function __construct() {
    $this->icons_pass   = './modules/icon';
    $this->license_pass = './license';
  }

  public function getIconsPass(): string {
    return $this->icons_pass;
  }

  public function getLicensePass(): string {
    return $this->license_pass;
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
        <h3>Information</h3>
        <a class="item" href="<?php echo $header_instance->getLicensePass(); ?>">
          <img src="<?php echo $header_instance->getIconsPass(); ?>/license-icon-plain.svg" alt="license-icon-plain.svg" >
          <li>License</li>
        </a>
      </ul>
    </div>
    <p>Click an icon at upper left side to close this menu.</p>
  </nav>
</header>

<?php unset( $header_instance ); ?>

<?php /** a module file is end up here. : header/_central.php */ ?>