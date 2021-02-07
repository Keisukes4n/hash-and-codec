<?php
  /**
   * BASE64 Codec main process
   * 
   */
  $name_process_uuencode  = 'encode-or-decode-uuencode';
  $name_textarea_uuencode = 'input-string-uuencode';
  
  if ( isset( $_POST["$name_process_uuencode"] ) ):
    if ( isset( $_POST["$name_textarea_uuencode"] ) ):
      $coding_process   = $_POST["$name_process_uuencode"];
      $converted_string = NULL;
      $input_string     = $_POST["$name_textarea_uuencode"];

      switch ( $coding_process ) {
        case 'encode':
          $converted_string = convert_uuencode( $input_string );
          break;
        case 'decode':
          $converted_string = convert_uudecode( $input_string );
          break;
      }

      $coding_process   = htmlentities( $coding_process, ENT_QUOTES, 'UTF-8' );
      $converted_string = htmlentities( $converted_string, ENT_QUOTES, 'UTF-8' );
      $input_string     = htmlentities( $input_string, ENT_QUOTES, 'UTF-8' );

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

  unset( $coding_process, $converted_string, $input_string );
?>

<form action="" class="uuencode-codec" id="formUuencodeCodec" method="POST">
  <input type="hidden" name="conversion-method" value="uuencode">
  <section class="tile">
    <h2>1. Select "Encode" or "Decode"</h2>
    <div class="coding-process">
      <label>
        <input type="radio" name="<?php echo $name_process_uuencode; ?>" value="encode" required><span>Encode</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_process_uuencode; ?>" value="decode"><span>Decode</span>
      </label>
    </div>
  </section>
  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?php echo $name_textarea_uuencode; ?>" placeholder="text" required></textarea>
    <button class="submit" type="submit">click!</button>
  </section>
</form>