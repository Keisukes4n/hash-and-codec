<?php

  $result_text_base64 = NULL;
  $converted_string   = NULL;
  
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

      $result_text_base64 = <<< "EOD"
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

<h2>1. Select "Encode" or "Decode"</h2>
<form action="#result" class="convertion-process" id="formEncodeOrDecode" method="POST">
  <label class="tile">
    <input type="radio" name="encode-or-decode" value="encode" required><span>Encode</span>
  </label>
  <label class="tile">
    <input type="radio" name="encode-or-decode" value="decode"><span>Decode</span>
  </label>
</form>
<h2>2. Input text</h2>
  <textarea name="input-string" placeholder="text" form="formEncodeOrDecode" required></textarea>
  <input class="submit-button" form="formEncodeOrDecode" type="submit">
<h2 id="result">3. Result</h2>
  <textarea placeholder="Result"><?php echo $result_text_base64; ?></textarea>