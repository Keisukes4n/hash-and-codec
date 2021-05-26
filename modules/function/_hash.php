<?php
  /**
   * Hash generator main process file
   * description: This file is called from index.php in front directory.
   */

  /** parameters */
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

  /** functions */
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

<form action="" class="hash-generation" id="formHashGenerator" method="POST">
  <input type="hidden" name="conversion-process" value="hash">

  <?php if ( isset( $_POST[$name_algos] ) && isset( $_POST[$name_textarea_hash] ) ): ?>
    <?php $hash_result = hash_build_date( $_POST[$name_algos], $_POST[$name_textarea_hash] ); ?>
    <section class="result-area" id="sectionResultArea">
      <h2>Result</h2>
      <textarea><?=htmlspecialchars( $hash_result, ENT_QUOTES );?></textarea>
    </section>
    <hr>
  <?php endif; ?>

  <section class="tile">
    <h2>1. Select the hash algorithm</h2>
    <div class="algorithm-list">
      <?php foreach ( $algo_list as $value ): ?>
        <label>
          <input type="radio" name="<?php echo $name_algos; ?>" value="<?php echo mb_strtolower( $value ); ?>" required>
          <span><?=htmlspecialchars( $value, ENT_QUOTES );?></span>
        </label>
      <?php endforeach; ?>
      <?PHP unset( $value ); ?>
    </div>
  </section>

  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?=htmlspecialchars( $name_textarea_hash, ENT_QUOTES );?>" placeholder="text" required></textarea>
    <button class="post" type="submit">Post!</button>
    <p>The result wiil be displayed after posted.</p>
  </section>
</form>

<?php unset( $name_algos, $name_textarea_hash, $algo_list ) ?>

<?php /** a module file is end up here. : _hash.php */ ?>