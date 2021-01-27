<?php 
  /**
   * page module file: _footer.php
   * 
   */

  $mod_date    = date( "jS F, Y", getlastmod() );
  $author_name = 'Keisukes4n';
?>

<footer>
  <section class="timestamp">
    <p>Modified date: <?php echo $mod_date; ?></p>
  </section>
  <section class="copyright">
    <p>Copyright 2021 <?php echo $author_name; ?></p>
  </section>
</footer>