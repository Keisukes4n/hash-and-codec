<?php

declare( strict_types=1 );

/**
 * module file: _central.php
 * description: This file is called from index.php in front directory.
 */

class footer {
  private string $mod_date;
  private string $author_name;

  public function __construct() {
    $this->mod_date    = date( "jS F, Y", getlastmod() );
    $this->author_name = 'Keisukes4n';
  }

  public function getModDate(): string {
    return $this->mod_date;
  }

  public function getAuthorName(): string {
    return $this->author_name;
  }
}

$footer_instance = new footer;

?>

<footer>
  <div class="item">
    <p>Modified date: <?php echo htmlspecialchars( $footer_instance->getModDate(), ENT_QUOTES ); ?></p>
  </div>
  <div class="item">
    <p>License: Apache License Version 2.0, CC BY 4.0</p>
  </div>
  <div class="item">
    <p>Copyright 2021 <?php echo htmlspecialchars( $footer_instance->getAuthorName(), ENT_QUOTES ); ?></p>
  </div>
</footer>

<?php unset( $footer_instance ); ?>

<?php /** a module file is end up here. : footer/_central.php */ ?>