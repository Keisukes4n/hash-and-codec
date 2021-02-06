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
          $converted_string = convert_uuencode( $input_string );
          break;
        case 'decode':
          $converted_string = convert_uudecode( $input_string );
          break;
      }

      $result_text = <<< "EOD"
      * Result
      $converted_string
      * Input string
      $input_string
      * Coding process
      UUENCODE $coding_process
      EOD;
    endif;
  endif;
?>

<form action="" class="uuencode-codec" id="formUuencodeCodec" method="POST">
  <input type="hidden" name="conversion-method" value="uuencode">
  <section class="tile">
    <h2>1. Select "Encode" or "Decode"</h2>
    <div class="coding-process">
      <label>
        <input type="radio" name="encode-or-decode" value="encode" required><span>Encode</span>
      </label>
      <label>
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