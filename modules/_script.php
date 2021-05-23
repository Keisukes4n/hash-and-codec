<?php
  /**
   * module file: _script.php
   * description: Javascript for index.php.
   */
?>

<script>
  /** functions */
  function displayBase64() {
    elementButtonProcessBase64.style.border   = 'rgb(127, 127, 127) solid thin';
    elementButtonProcessHash.style.border     = 'hidden';
    elementButtonProcessUuencode.style.border = 'hidden';
    elementFormBase64Codec.style.display      = 'flex';
    elementFormHashGeneration.style.display   = 'none';
    elementFormUuencodeCodec.style.display    = 'none';
  }

  function displayHash() {
    elementButtonProcessBase64.style.border   = 'hidden';
    elementButtonProcessHash.style.border     = 'rgb(127, 127, 127) solid thin';
    elementButtonProcessUuencode.style.border = 'hidden';
    elementFormBase64Codec.style.display      = 'none';
    elementFormHashGeneration.style.display   = 'flex';
    elementFormUuencodeCodec.style.display    = 'none';
  }

  function displayUuencode() {
    elementButtonProcessBase64.style.border   = 'hidden';
    elementButtonProcessHash.style.border     = 'hidden';
    elementButtonProcessUuencode.style.border = 'rgb(127, 127, 127) solid thin';
    elementFormBase64Codec.style.display      = 'none';
    elementFormHashGeneration.style.display   = 'none';
    elementFormUuencodeCodec.style.display    = 'flex';
  }

  /** actions when click elements */
  const elementButtonProcessBase64   = document.getElementById( 'buttonProcessBase64' );
  const elementButtonProcessHash     = document.getElementById( 'buttonProcessHash' );
  const elementButtonProcessUuencode = document.getElementById( 'buttonProcessUuencode' );
  const elementFormBase64Codec       = document.getElementById( 'formBase64Codec' );
  const elementFormHashGeneration    = document.getElementById( 'formHashGeneration' );
  const elementFormUuencodeCodec     = document.getElementById( 'formUuencodeCodec' );
  
  elementButtonProcessHash.addEventListener( 'click', () => {
    displayHash();
  });
  elementButtonProcessBase64.addEventListener( 'click', () => {
    displayBase64();
  });
  elementButtonProcessUuencode.addEventListener( 'click', () => {
    displayUuencode();
  });

  /** for display after string post */
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

    /** for css transition of result area */
    const elementSectionResultArea = document.getElementById( 'sectionResultArea' );
    window.addEventListener( 'load', () => {
      elementSectionResultArea.style.height = '14.0rem';
    });

  <?php else: ?>
    displayBase64();
  <?php endif; ?>
</script>

<?php /** A module file is end up here. : _script.php */ ?>