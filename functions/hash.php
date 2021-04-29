<?php
  /**
   * Hash generator main process
   * 
   * This file is called from index.php in front directory.
   */

  // parameters
  $name_algos         = 'algos-hash';
  $name_textarea_hash = 'input-string-hash';

  $algo_list = [
    'sha256',
    'sha384',
    'sha512',
    'sha3-256',
    'sha3-384',
    'sha3-512',
    'RIPEMD160',
    'Whirlpool',
    'md5'
  ];

  // functions
  function hash_build_date( $algo, $input ) {
    $hash_value = hash( $algo, $input, false );
    $result     = hash_form_text( $hash_value, $algo, $input );
    return $result;
  }

  function hash_form_text( $hash_value, $algo, $input ) {
    $result = <<< "EOD"
    * Hash value
    {$hash_value}
    * Hash algorithm
    {$algo}
    * Input string
    {$input}
    EOD;
    return $result;
  }
?>

<?php if ( isset( $_POST[$name_algos] ) ): ?>
  <?php if ( isset( $_POST[$name_textarea_hash] ) ): ?>
    <?php $hash_result = hash_build_date( $_POST[$name_algos], $_POST[$name_textarea_hash] ); ?>
    <section class="result-area" id="sectionResultArea">
      <h2>Result</h2>
      <textarea><?php echo htmlentities( $hash_result ); ?></textarea>
    </section>
  <?php endif; ?>
<?php endif; ?>

<form action="" class="hash-generation" id="formHashGeneration" method="POST">
  <input type="hidden" name="conversion-method" value="hash">
  <section class="tile">
    <h2>1. Select the hash algorithm</h2>
    <div class="algorithm-list">
      <?php foreach ( $algo_list as $value ): ?>
        <label>
          <input type="radio" name="<?php echo $name_algos; ?>" value="<?php echo mb_strtolower( $value ); ?>" required>
          <span><?php echo $value; ?></span>
        </label>
      <?php endforeach; ?>
      <?PHP unset( $value ); ?>
    </div>
  </section>
  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?php echo $name_textarea_hash; ?>" placeholder="text" required></textarea>
    <button class="post" type="submit">Post!</button>
  </section>
</form>