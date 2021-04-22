<?php
  /**
   * BASE64 Codec main process
   * 
   * This file is called from index.php in front directory.
   */
  $name_process_base64  = 'encode-or-decode-base64';
  $name_textarea_base64 = 'input-string-base64';

  if ( isset( $_POST[ $name_process_base64 ] ) ):
    if ( isset( $_POST[ $name_textarea_base64 ] ) ):
      $coding_process   = $_POST[ $name_process_base64 ];
      $converted_string = NULL;
      $input_string     = $_POST[ $name_textarea_base64 ];

      switch ( $coding_process ) {
        case 'encode':
          $converted_string = base64_encode( $_POST[ $name_textarea_base64 ] );
          break;
        case 'decode':
          $converted_string = base64_decode( $_POST[ $name_textarea_base64 ] );
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
      Base64 $coding_process
      EOD;
    endif;
  endif;

  unset( $coding_process, $converted_string, $input_string );
?>

<form action="" class="base64-codec" id="formBase64Codec" method="POST">
  <input type="hidden" name="conversion-method" value="base64">
  <section class="tile">
    <h2>1. Select "Encode" or "Decode"</h2>
    <div class="coding-process">
      <label>
        <input type="radio" name="<?php echo $name_process_base64; ?>" value="encode" required><span>Encode</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $name_process_base64; ?>" value="decode"><span>Decode</span>
      </label>
    </div>
  </section>
  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?php echo $name_textarea_base64; ?>" placeholder="text" required></textarea>
    <button class="submit" type="submit">Post!</button>
  </section>
</form>