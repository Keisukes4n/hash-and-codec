<?php
  /**
   * BASE64 Codec main process
   * 
   * This file is called from index.php in front directory.
   */

   // parameters
  $name_process_base64  = 'encode-or-decode-base64';
  $name_textarea_base64 = 'input-string-base64';

  // functions
  function process_string_base64( $process, $input ) {
    $converted_string = null;
    switch ( $process ) {
      case 'encode':
        $converted_string = base64_encode( $input );
        break;
      case 'decode':
        $converted_string = base64_decode( $input );
        break;
    }

    $result = [
      'converted' => $converted_string,
      'input'     => $input,
      'process'   => $process,
    ];

    return $result;
  }

  function construct_result_base64( $str_array ) {
    $result = <<< "EOD"
    * Result
    {$str_array['converted']}
    * Input string
    {$str_array['input']}
    * Coding process
    {$str_array['process']} Base64 
    EOD;

    return $result;
  }

  // set a result
  if ( isset( $_POST[$name_process_base64] ) && isset( $_POST[$name_textarea_base64] ) ):
    $str_array   = process_string_base64( $_POST[$name_process_base64], $_POST[$name_textarea_base64] );
    $result_text = construct_result_base64( $str_array );
  endif;
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