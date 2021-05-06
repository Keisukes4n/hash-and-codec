<?php
  /**
   * BASE64 Codec main process
   * 
   * This file is called from index.php in front directory.
   */

  /** parameters */
  $name_process_uuencode  = 'encode-or-decode-uuencode';
  $name_textarea_uuencode = 'input-string-uuencode';
  
  /** functions */
  function uuencode_build_date( $process, $input ) {
    $cnvrt_str = uuencode_process_string( $process, $input );
    $result    = uuencode_form_text( $cnvrt_str, $process, $input );
    return $result;
  }

  function uuencode_form_text( $cnvrt_str, $process, $input ) {
    $result = <<< "EOD"
    * Result
    {$cnvrt_str}
    * Input string
    {$input}
    * Coding process
    {$process} (UUENCODE)
    EOD;

    return $result;
  }

  function uuencode_process_string( $process, $input ) {
    $result = null;
    switch ( $process ) {
      case 'encode':
        $result = convert_uuencode( $input );
        break;
      case 'decode':
        $result = convert_uudecode( $input );
        break;
    }
    return $result;
  }
?>

<form action="" class="uuencode-codec" id="formUuencodeCodec" method="POST">
  <input type="hidden" name="conversion-method" value="uuencode">

  <?php if ( isset( $_POST[$name_process_uuencode] ) && isset( $_POST[$name_textarea_uuencode] ) ): ?>
    <?php $uuencode_result = uuencode_build_date( $_POST[$name_process_uuencode] ,$_POST[$name_textarea_uuencode] ); ?>
    <section class="result-area">
      <h2>Result</h2>
      <textarea><?php echo htmlentities( $uuencode_result ); ?></textarea>
    </section>
    <hr>
  <?php endif; ?>

  <section class="tile">
    <h2>1. Select "Encode" or "Decode" (UUENODE)</h2>
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
    <button class="post" type="submit">Post!</button>
    <p>The result wiil be displayed after posted.</p>
  </section>
</form>