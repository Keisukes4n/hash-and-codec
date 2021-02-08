<?php
  /**
   * Hash generator main process
   * 
   */
  $name_algos          = 'algos-hash';
  $name_textarea_hash  = 'input-string-hash';

  if ( isset( $_POST[ $name_algos ] ) ):
    if ( isset( $_POST[ $name_textarea_hash ] ) ):
      $hash_algorithm = $_POST[ $name_algos ];
      $input_string   = $_POST[ $name_textarea_hash ];

      $hash_value   = hash( $hash_algorithm, $input_string, false );

      $hash_algorithm = htmlentities( $hash_algorithm, ENT_QUOTES, 'UTF-8' );
      $hash_value     = htmlentities( $hash_value, ENT_QUOTES, 'UTF-8' );
      $input_string   = htmlentities( $input_string, ENT_QUOTES, 'UTF-8');

      $result_text  = <<< "EOD"
      * Hash value
      $hash_value
      * Input string
      $input_string
      * Hash algorithm
      $hash_algorithm
      EOD;
    endif;
  endif;

  unset( $hash_algorithm, $hash_value, $input_string );
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
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha384"><span>sha384</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha512"><span>sha512</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha3-256"><span>sha3-256</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha3-384"><span>sha3-384</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="sha3-512"><span>sha3-512</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="ripemd160"><span>RIPEMD160</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="whirlpool"><span>Whirlpool</span>
        </label>
      <label>
        <input type="radio" name="<?php echo $name_algos; ?>" value="md5"><span>md5</span>
        </label>
    </div>
  </section>
  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?php echo $name_textarea_hash; ?>" placeholder="text" required></textarea>
    <button class="submit" type="submit">Post!</button>
  </section>
</form>