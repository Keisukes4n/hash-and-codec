<?php

declare( strict_types=1 );

/**
 * BASE64 Codec main process file
 * description: This file is called from index.php in front directory.
 */

class uuencodeProcess {
  private string $name_input;
  private string $name_textarea;
  private string $action_type;
  private string $target_text;
  private string $converted_text;

  public function __construct() {
    $this->name_input    = 'uuencode-action';
    $this->name_textarea = 'uuencode-text';
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
        $this->converted_text = convert_uuencode( $target_text );
        break;
      case 'decode':
        $this->converted_text = convert_uudecode( $target_text );
        break;
      default:
        $this->converted_text = convert_uuencode( $target_text );
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
    {$this->action_type} (UUENCODE)
    * Input string
    {$this->target_text}
    EOD;
  }
}

$uuencode_instance = new uuencodeProcess;

?>

<form action="" class="uuencode-codec" id="formUuencodeCodec" method="POST">
  <input type="hidden" name="conversion-process" value="uuencode">

  <?php if ( isset( $_POST[$uuencode_instance->getNameInput()] ) ): ?>
    <?php if ( isset( $_POST[$uuencode_instance->getNameTextarea()] ) ): ?>
      <?php $uuencode_instance->convert( $_POST[$uuencode_instance->getNameInput()], $_POST[$uuencode_instance->getNameTextarea()] ); ?>
      <section class="result-area" id="sectionResultArea">
        <h2>Result</h2>
        <textarea><?php echo htmlspecialchars( $uuencode_instance->result(), ENT_QUOTES ); ?></textarea>
      </section>
    <?php endif; ?>
  <?php endif; ?>

  <section class="tile">
    <h2>1. Select "Encode" or "Decode" (UUENODE)</h2>
    <div class="coding-process">
      <label>
        <input type="radio" name="<?php echo $uuencode_instance->getNameInput(); ?>" value="encode" required><span>Encode</span>
      </label>
      <label>
        <input type="radio" name="<?php echo $uuencode_instance->getNameInput(); ?>" value="decode"><span>Decode</span>
      </label>
    </div>
  </section>

  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?php echo $uuencode_instance->getNameTextarea(); ?>" placeholder="text" required></textarea>
    <button class="post" type="submit">Post!</button>
    <p>The result wiil be displayed after posted.</p>
  </section>
</form>

<?php unset( $uuencode_instance ); ?>
<?php /** a module file is end up here. : _uuencode.php */ ?>