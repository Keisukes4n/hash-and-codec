<?php
  /**
   * main file of string conversion
   * 
   */
  $page_dir   = '/string_conversion';
  $pass_front = $_SERVER['DOCUMENT_ROOT'] . $page_dir;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title><?php echo htmlentities( $_SERVER['PHP_SELF'] ); ?></title>
  </head>
  <body>
    <?php include_once './modules/_header.php'; ?>

    <main>
      <h1><?php echo htmlentities( $_SERVER['PHP_SELF'] ); ?></h1>
      <section class="string-conversion">
        <div class="method-selector" id="divMethodSelector">
          <button class="method-name" id="buttonMethodHash" type="button">Hash</button>
          <button class="method-name" id="buttonMethodBase64" type="button">Base64</button>
          <button class="method-name" id="buttonMethodUuencode" type="button">UUENCODE</button>
        </div>

        <?php
          $result_text = null;
          include_once './functions/hash.php';
          include_once './functions/base64.php';
          include_once './functions/uuencode.php';
        ?>

        <img src="<?php echo './modules/icon/arrow-down-icon-plane.svg'; ?>" alt="arrow-down-icon-plane.svg" class="arrow-icon">
      </section>
    </main>

    <?php include_once './modules/_footer.php'; ?>

    <script>
      // HTML elements
      const elementFormHashGeneration   = document.getElementById( 'formHashGeneration' );
      const elementFormBase64Codec      = document.getElementById( 'formBase64Codec' );
      const elementFormUuencodeCodec    = document.getElementById( 'formUuencodeCodec' );
      const elementButtonMethodHash     = document.getElementById( 'buttonMethodHash' );
      const elementButtonMethodBase64   = document.getElementById( 'buttonMethodBase64' );
      const elementButtonMethodUuencode = document.getElementById( 'buttonMethodUuencode' );

      // functions
      function displayHash() {
        elementFormHashGeneration.style.height   = 'auto';
        elementFormBase64Codec.style.height      = '0';
        elementFormUuencodeCodec.style.height    = '0';
        elementButtonMethodHash.style.border     = 'rgb(127, 127, 127) solid thin';
        elementButtonMethodBase64.style.border   = 'hidden';
        elementButtonMethodUuencode.style.border = 'hidden';
      }

      function displayBase64() {
        elementFormHashGeneration.style.height   = '0';
        elementFormBase64Codec.style.height      = 'auto';
        elementFormUuencodeCodec.style.height    = '0';
        elementButtonMethodHash.style.border     = 'hidden';
        elementButtonMethodBase64.style.border   = 'rgb(127, 127, 127) solid thin';
        elementButtonMethodUuencode.style.border = 'hidden';
      }

      function displayUuencode() {
        elementFormHashGeneration.style.height   = '0';
        elementFormBase64Codec.style.height      = '0';
        elementFormUuencodeCodec.style.height    = 'auto';
        elementButtonMethodHash.style.border     = 'hidden';
        elementButtonMethodBase64.style.border   = 'hidden';
        elementButtonMethodUuencode.style.border = 'rgb(127, 127, 127) solid thin';
      }

      // Actions when click elements
      elementButtonMethodHash.addEventListener( 'click', () => {
        displayHash();
      }, false );

      elementButtonMethodBase64.addEventListener( 'click', () => {
        displayBase64();
      }, false );

      elementButtonMethodUuencode.addEventListener( 'click', () => {
        displayUuencode();
      }, false );

      // For display after string post
      <?php if ( isset( $_POST[ 'conversion-method' ] ) ): ?>
        const elementSectionResultArea        = document.getElementById( 'sectionResultArea' );
        elementSectionResultArea.style.border = 'green solid medium';
        
        const conversionMethod = '<?php echo $_POST[ 'conversion-method' ]; ?>';
        switch ( conversionMethod ) {
          case 'hash':
            displayHash();
            break;
          case 'base64':
            displayBase64();
            break;
          case 'uuencode':
            displayUuencode();
            break;
          default:
            displayHash();
            break;
        }
      <?php else: ?>
        displayHash();
      <?php endif; ?>
    </script>
  </body>
</html>