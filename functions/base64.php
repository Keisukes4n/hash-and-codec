<?php
  /**
   * BASE64 Codec main process
   * 
   */
  $converted_string = NULL;
  
  if ( isset( $_POST['encode-or-decode'] ) ):
    $convertion_process = $_POST['encode-or-decode'];

    if ( isset( $_POST['input-string'] ) ):
      $input_string   = htmlspecialchars( $_POST['input-string'], ENT_QUOTES, 'UTF-8' );

      switch ( $convertion_process ) {
        case 'encode':
          $converted_string = base64_encode( $input_string );
          break;
        case 'decode':
          $converted_string = base64_decode( $input_string );
          break;
      }

      $result_text = <<< "EOD"
      * Result
      $converted_string
      * Input string
      $input_string
      * Convertion process
      $convertion_process
      EOD;
    endif;
  endif;
?>

<form action="#result" class="base64-codec" id="formBase64Codec" method="POST">
  <span>BASE64</span>
  <h2>1. Select "Encode" or "Decode"</h2>
  <div class="conversion-process">
    <label class="tile">
      <input type="radio" name="encode-or-decode" value="encode" required><span>Encode</span>
    </label>
    <label class="tile">
      <input type="radio" name="encode-or-decode" value="decode"><span>Decode</span>
    </label>
  </div>
  <h2>2. Input text</h2>
  <textarea name="input-string" placeholder="text" required></textarea>
  <button class="submit" type="submit">click!</button>
</form>