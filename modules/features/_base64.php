<?php

declare( strict_types=1 );

/**
 * BASE64 Codec main process file
 * description: This file is called from index.php in front directory.
 */

class base64Process {
  private string $name_input;
  private string $name_textarea;
  private string $action_type;
  private string $target_text;
  private string $converted_text;

  public function __construct() {
    $this->name_input    = 'base64-action';
    $this->name_textarea = 'base64-text';
  }

  public function getNameInput(): string {
    return $this->name_input;
  }

  public function getNameTextarea(): string {
    return $this->name_textarea;
  }

  public function convert( string $action_type, string $target_text ):void {
    switch ( $action_type ) {
      case 'encode':
        $this->converted_text = base64_encode( $target_text );
        break;
      case 'decode':
        $this->converted_text = base64_decode( $target_text );
        break;
      default:
        $this->converted_text = base64_encode( $target_text );
        break;
    }
    $this->action_type = $action_type;
    $this->target_text = $target_text;
  }

  public function result(): string {
    return <<< "EOD"
    * Result
    {$this->converted_text}
    * Action type
    {$this->action_type} (Base64)
    * Input string
    {$this->target_text}
    EOD;
  }
}

$base64_instance = new base64Process;

?>

<form action="" class="base64-codec" id="formBase64Codec" method="POST">
  <input type="hidden" name="conversion-process" value="base64">

  <?php if ( isset( $_POST[$base64_instance->getNameInput()] ) ): ?>
    <?php if ( isset( $_POST[$base64_instance->getNameTextarea()] ) ): ?>
      <?php $base64_instance->convert( $_POST[$base64_instance->getNameInput()], $_POST[$base64_instance->getNameTextarea()] ); ?>
      <section class="result-area" id="sectionResultArea">
        <h2>Result</h2>
        <textarea><?php echo htmlspecialchars( $base64_instance->result(), ENT_QUOTES ); ?></textarea>
      </section>
    <?php endif; ?>
  <?php endif; ?>

  <section class="tile">
    <h2>1. Select "Encode" or "Decode" (base64)</h2>
    <div class="coding-process">
      <label>
        <input type="radio" name="<?php echo $base64_instance->getNameInput(); ?>" value="encode" required><span>Encode</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $base64_instance->getNameInput(); ?>" value="decode"><span>Decode</span>
      </label>
    </div>
  </section>

  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?php echo $base64_instance->getNameTextarea(); ?>" placeholder="text" required></textarea>
    <button class="post" id="buttonPost" type="submit">Post!</button>
    <p>The result wiil be displayed after posted.</p>
  </section>
</form>

<?php unset( $base64_instance ); ?>
<?php /** a module file is end up here. : _base64.php */ ?>
