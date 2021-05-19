<?php
  /**
   * BASE64 Codec main process file
   * description: This file is called from index.php in front directory.
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
  <input type="hidden" name="conversion-process" value="uuencode">

  <?php if ( isset( $_POST[$name_process_uuencode] ) && isset( $_POST[$name_textarea_uuencode] ) ): ?>
    <?php $uuencode_result = uuencode_build_date( $_POST[$name_process_uuencode] ,$_POST[$name_textarea_uuencode] ); ?>
    <section class="result-area" id="sectionResultArea">
      <h2>Result</h2>
      <textarea><?=htmlspecialchars( $uuencode_result, ENT_QUOTES );?></textarea>
    </section>
    <hr>
  <?php endif; ?>

  <section class="tile">
    <h2>1. Select "Encode" or "Decode" (UUENODE)</h2>
    <div class="coding-process">
      <label>
        <input type="radio" name="<?=htmlspecialchars( $name_process_uuencode, ENT_QUOTES );?>" value="encode" required><span>Encode</span>
      </label>
      <label>
        <input type="radio" name="<?=htmlspecialchars( $name_process_uuencode, ENT_QUOTES );?>" value="decode"><span>Decode</span>
      </label>
    </div>
  </section>

  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?=htmlspecialchars( $name_textarea_uuencode, ENT_QUOTES );?>" placeholder="text" required></textarea>
    <button class="post" type="submit">Post!</button>
    <p>The result wiil be displayed after posted.</p>
  </section>
</form>

<?php unset( $name_process_uuencode, $name_textarea_uuencode ) ?>

<?php /** a module file is end up here. : _uuencode.php */ ?>