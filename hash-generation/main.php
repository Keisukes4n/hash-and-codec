<?php
  $result_text_hash = NULL;
  
  if ( isset( $_POST['hash-algorithm'] ) ):
    $hash_algorithm = $_POST['hash-algorithm'];

    if ( isset( $_POST['input-string'] ) ):
      $input_string   = htmlspecialchars( $_POST['input-string'], ENT_QUOTES, 'UTF-8' );

      $hash_value       = hash( $hash_algorithm, $input_string, false );
      $result_text_hash = <<< "EOD"
      * Hash value
      $hash_value
      * Input string
      $input_string
      * Hash algorithm
      $hash_algorithm
      EOD;
    endif;
  endif;
?>

<h2>1. Select hash algorithm</h2>
<form action="#result" class="select-algorithm" id="formSelectAlgorithm" method="POST">
  <label class="tile">
    <input type="radio" name="hash-algorithm" value="sha256" required><span>sha256</span>
  </label>
  <label class="tile">
    <input type="radio" name="hash-algorithm" value="sha384"><span>sha384</span>
  </label>
  <label class="tile">
    <input type="radio" name="hash-algorithm" value="sha512"><span>sha512</span>
  </label>
  <label class="tile">
    <input type="radio" name="hash-algorithm" value="sha3-256"><span>sha3-256</span>
  </label>
  <label class="tile">
    <input type="radio" name="hash-algorithm" value="sha3-384"><span>sha3-384</span>
  </label>
  <label class="tile">
    <input type="radio" name="hash-algorithm" value="sha3-512"><span>sha3-512</span>
  </label>
  <label class="tile">
    <input type="radio" name="hash-algorithm" value="ripemd160"><span>RIPEMD160</span>
  </label>
  <label class="tile">
    <input type="radio" name="hash-algorithm" value="whirlpool"><span>Whirlpool</span>
  </label>
  <label class="tile">
    <input type="radio" name="hash-algorithm" value="md5"><span>md5</span>
  </label>   
</form>
<h2>2. Input text</h2>
  <textarea name="input-string" placeholder="text" form="formSelectAlgorithm" required></textarea>
  <input class="submit-button" form="formSelectAlgorithm" type="submit">
<h2 id="result">3. Result</h2>
  <textarea placeholder="Result"><?php echo $result_text_hash; ?></textarea>