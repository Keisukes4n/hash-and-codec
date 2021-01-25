<?php 
  /**
   * page module file: _footer.php
   * 
   */
?>

<footer>
  <section class="timestamp">
    <?php
      $cre_date = '22nd January, 2021';
      $mod_date = date( "jS F, Y", getlastmod() );
      echo '<p>';
      echo 'Created: ', $cre_date,' | Modified: ', $mod_date;
      echo '</p>';
    ?>
  </section>
  <section class="copyright">
    <p>Copyright 2021 Keisukes4n</p>
  </section>
</footer>