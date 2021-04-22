<?php
  /**
   * Hash generator main process
   * 
   * This file is called from index.php in front directory.
   */

  // param
  $name_algos         = 'algos-hash';
  $name_textarea_hash = 'input-string-hash';

  // func
  function main_hash( $algo, $input ) {
    $hash   = hash( $algo, $input, false );
    $result = <<< "EOD"
    * Hash value
    {$hash}
    * Input string
    {$input}
    * Hash algorithm
    {$algo}
    EOD;

    return $result;
  }

  // set a result
  if ( isset( $_POST[$name_algos] ) && isset( $_POST[$name_textarea_hash] ) ):
    $result_text = main_hash( $_POST[$name_algos], $_POST[$name_textarea_hash] );
  endif;
?>

<form action="" class="hash-generation" id="formHashGeneration" method="POST">
  <input type="hidden" name="conversion-method" value="hash">
  <section class="tile">
    <h2>1. Select hash algorithm</h2>
    <div class="algorithm-list">
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha256" required><span>sha256</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha384" required><span>sha384</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha512" required><span>sha512</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha3-256" required><span>sha3-256</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha3-384" required><span>sha3-384</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha3-512" required><span>sha3-512</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="ripemd160" required><span>RIPEMD160</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="whirlpool" required><span>Whirlpool</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="md5" required><span>md5</span>
      </label>
    </div>
  </section>
  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?php echo $name_textarea_hash; ?>" placeholder="text" required></textarea>
    <button class="submit" type="submit">Post!</button>
  </section>
</form>