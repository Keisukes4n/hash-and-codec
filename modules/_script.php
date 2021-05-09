<?php
  /**
   * module file: _script.php
   * 
   * This file is called from index.php in front directory.
   */

  /** parameters */
?>

<script>
  /** HTML elements */
  const elementFormBase64Codec       = document.getElementById( 'formBase64Codec' );
  const elementFormHashGeneration    = document.getElementById( 'formHashGeneration' );
  const elementFormUuencodeCodec     = document.getElementById( 'formUuencodeCodec' );
  const elementbuttonProcessBase64   = document.getElementById( 'buttonProcessBase64' );
  const elementbuttonProcessHash     = document.getElementById( 'buttonProcessHash' );
  const elementbuttonProcessUuencode = document.getElementById( 'buttonProcessUuencode' );

  /** functions */
  function displayBase64() {
    elementFormBase64Codec.style.display      = 'flex';
    elementFormHashGeneration.style.display   = 'none';
    elementFormUuencodeCodec.style.display    = 'none';
    elementbuttonProcessHash.style.border     = 'hidden';
    elementbuttonProcessBase64.style.border   = 'rgb(127, 127, 127) solid thin';
    elementbuttonProcessUuencode.style.border = 'hidden';
  }

  function displayHash() {
    elementFormBase64Codec.style.display      = 'none';
    elementFormHashGeneration.style.display   = 'flex';
    elementFormUuencodeCodec.style.display    = 'none';
    elementbuttonProcessHash.style.border     = 'rgb(127, 127, 127) solid thin';
    elementbuttonProcessBase64.style.border   = 'hidden';
    elementbuttonProcessUuencode.style.border = 'hidden';
  }

  function displayUuencode() {
    elementFormBase64Codec.style.display      = 'none';
    elementFormHashGeneration.style.display   = 'none';
    elementFormUuencodeCodec.style.display    = 'flex';
    elementbuttonProcessHash.style.border     = 'hidden';
    elementbuttonProcessBase64.style.border   = 'hidden';
    elementbuttonProcessUuencode.style.border = 'rgb(127, 127, 127) solid thin';
  }

  /** Actions when click elements */
  elementbuttonProcessHash.addEventListener( 'click', () => {
    displayHash();
  }, false );

  elementbuttonProcessBase64.addEventListener( 'click', () => {
    displayBase64();
  }, false );

  elementbuttonProcessUuencode.addEventListener( 'click', () => {
    displayUuencode();
  }, false );

  /** For display after string post */
  <?php if ( isset( $_POST[ 'conversion-process' ] ) ): ?>
    const conversionProcess = '<?php echo $_POST[ 'conversion-process' ]; ?>';
    switch ( conversionProcess ) {
      case 'base64':
        displayBase64();
        break;
      case 'hash':
        displayHash();
        break;
      case 'uuencode':
        displayUuencode();
        break;
      default:
        displayBase64();
        break;
    }

    /** For css transition of result area */
    const elementSectionResultArea = document.getElementById( 'sectionResultArea' );
    elementSectionResultArea.style.height  = '14.0rem';

  <?php else: ?>
    displayBase64();
  <?php endif; ?>
</script>

<?php
  /** A module file is end up here. : _script.php */
?>