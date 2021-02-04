<?php
  /**
   * BASE64 Codec main process
   * 
   */
  $converted_string = NULL;
  
  if ( isset( $_POST['encode-or-decode'] ) ):
    $coding_process = $_POST['encode-or-decode'];

    if ( isset( $_POST['input-string'] ) ):
      $input_string   = htmlspecialchars( $_POST['input-string'], ENT_QUOTES, 'UTF-8' );
      switch ( $coding_process ) {
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
      * Coding process
      $coding_process
      EOD;
    endif;
  endif;
?>

<form action="" class="base64-codec" id="formBase64Codec" method="POST">
  <input type="hidden" name="conversion-method" value="base64">
  <section class="tile">
    <h2>1. Select "Encode" or "Decode"</h2>
    <div class="coding-process">
      <label class="tile">
        <input type="radio" name="encode-or-decode" value="encode" required><span>Encode</span>
      </label>
      <label class="tile">
        <input type="radio" name="encode-or-decode" value="decode"><span>Decode</span>
      </label>
    </div>
  </section>
  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="input-string" placeholder="text" required></textarea>
    <button class="submit" type="submit">click!</button>
  </section>
</form>