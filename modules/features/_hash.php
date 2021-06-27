<?php

declare( strict_types=1 );

/**
 * Hash generator main process file
 * description: This file is called from index.php in front directory.
 */

class hashProcess {
  private string $name_input;
  private string $name_textarea;
  private string $target_text;
  private string $hash_value;

  private string $algo_type;
  private array  $algo_list;

  public function __construct() {
    $this->name_input    = 'hash-algo';
    $this->name_textarea = 'hash-text';
    $this->algo_list     =  [
      'sha256',
      'sha384',
      'sha512',
      'sha3-256',
      'sha3-384',
      'sha3-512',
      'RIPEMD160',
      'Whirlpool',
      'md5'
    ];
  }

  public function getAlgoList(): array {
    return $this->algo_list;
  }

  public function getNameInput(): string {
    return $this->name_input;
  }

  public function getNameTextarea(): string {
    return $this->name_textarea;
  }

  public function convert( string $algo_type, string $target_text ): void {
    $this->hash_value  = hash( $algo_type, $target_text );
    $this->algo_type   = $algo_type;
    $this->target_text = $target_text;
  }

  public function result(): string {
    return <<< "EOD"
    * Hash value
    {$this->hash_value}
    * Hash algorithm
    {$this->algo_type}
    * Input string
    {$this->target_text}
    EOD;
  }
}

$hash_instance = new hashProcess;

?>

<form action="" class="hash-generation" id="formHashGenerator" method="POST">
  <input type="hidden" name="conversion-process" value="hash">

  <?php if ( isset( $_POST[$hash_instance->getNameInput()] ) ): ?>
    <?php if ( isset( $_POST[$hash_instance->getNameTextarea()] ) ): ?>
      <?php $hash_instance->convert( $_POST[$hash_instance->getNameInput()], $_POST[$hash_instance->getNameTextarea()] ); ?>
      <section class="result-area" id="sectionResultArea">
        <h2>Result</h2>
        <textarea><?php echo htmlspecialchars( $hash_instance->result(), ENT_QUOTES );?></textarea>
      </section>
    <?php endif; ?>
  <?php endif; ?>

  <section class="tile">
    <h2>1. Select the hash algorithm</h2>
    <div class="algorithm-list">
      <?php foreach ( $hash_instance->getAlgoList() as $value ): ?>
        <label>
          <input type="radio" name="<?php echo $hash_instance->getNameInput(); ?>" value="<?php echo mb_strtolower( $value ); ?>" required>
          <span><?php echo $value; ?></span>
        </label>
      <?php endforeach; ?>
      <?PHP unset( $value ); ?>
    </div>
  </section>

  <section class="tile">
    <h2>2. Input text</h2>
    <textarea name="<?php echo $hash_instance->getNameTextarea(); ?>" placeholder="text" required></textarea>
    <button class="post" type="submit">Post!</button>
    <p>The result wiil be displayed after posted.</p>
  </section>
</form>

<?php unset( $hash_instance ); ?>
<?php /** a module file is end up here. : _hash.php */ ?>