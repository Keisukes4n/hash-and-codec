<?php 
  /**
   * page module file: _footer.php
   * 
   * This file is called from index.php in front directory.
   */

  /** parameters */
  $mod_date    = date( "jS F, Y", getlastmod() );
  $author_name = 'Keisukes4n';
?>

<footer>
  <div class="item">
    <p>Modified date: <?php echo htmlentities( $mod_date ); ?></p>
  </div>
  <div class="item">
    <p>License: Apache License Version 2.0, CC BY 4.0</p>
  </div>
  <div class="item">
    <p>Copyright 2021 <?php echo htmlentities( $author_name ); ?></p>
  </div>
</footer>