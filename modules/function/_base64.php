<?php

declare( strict_types=1 );

/**
 * BASE64 Codec main process file
 * description: This file is called from index.php in front directory.
 */

class base64Process {
  private string $input_name;
  private string $textarea_name;

  public function __construct() {
    $this->input_name    = 'base64-action';
    $this->textarea_name = 'base64-text';
  }

  public function getInputName(): string {
    return $this->input_name;
  }

  public function getTextareaName(): string {
    return $this->textarea_name;
  }
}

$base64_instance = new base64Process;

  /** parameters */
  $name_process_base64  = 'base64-action';
  $name_textarea_base64 = 'base64-text';

  /** functions */
  function base64_build_date( $process, $input ) {
    $cnvrt_str = base64_process_string( $process, $input );
    $result    = base64_form_text( $cnvrt_str, $process, $input );
    return $result;
  }

  function base64_form_text( $cnvrt_str, $process, $input ) {
    $result = <<< "EOD"
    * Result
    {$cnvrt_str}
    * Coding process
    {$process} (Base64)
    * Input string
    {$input}
    EOD;
    return $result;
  }

  function base64_process_string( $process, $input ) {
    $result = null;
    switch ( $process ) {
      case 'encode':
        $result = base64_encode( $input );
        break;
      case 'decode':
        $result = base64_decode( $input );
        break;
    }
    return $result;
  }
?>

<form action="" class="base64-codec" id="formBase64Codec" method="POST">
  <input type="hidden" name="conversion-process" value="base64">

  <?php if ( isset( $_POST[$base64_instance->getInputName()] ) && isset( $_POST[$base64_instance->getTextareaName()] ) ): ?>
    <?php $base64_result = base64_build_date( $_POST[$base64_instance->getInputName()], $_POST[$base64_instance->getTextareaName()] ); ?>
    <section class="result-area" id="sectionResultArea">
      <h2>Result</h2>
      <textarea><?=htmlspecialchars( $base64_result, ENT_QUOTES );?></textarea>
    </section>
    <hr>
  <?php endif; ?>
  

  <section class="tile">
    <h2>1. Select "Encode" or "Decode" (base64)</h2>
    <div class="coding-process">
      <label>
        <input type="radio" name="<?php echo $base64_instance->getInputName(); ?>" value="encode" required><span>Encode</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $base64_instance->getInputName(); ?>" value="decode"><span>Decode</span>
      </label>
    </div>
  </section>

  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?php echo $base64_instance->getTextareaName(); ?>" placeholder="text" required></textarea>
    <button class="post" id="buttonPost" type="submit">Post!</button>
    <p>The result wiil be displayed after posted.</p>
  </section>
</form>

<?php unset( $name_process_base64, $name_textarea_base64 ) ?>

<?php /** a module file is end up here. : _base64.php */ ?>
