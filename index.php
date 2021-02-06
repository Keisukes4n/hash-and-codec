<?php
  /**
   * 
   * 
   */
  $page_title = 'String conversion';
  $page_dir   = '/string-conversion';
  $pass_front = $_SERVER['DOCUMENT_ROOT'] . $page_dir;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $page_dir; ?>/style.css" rel="stylesheet" type="text/css">
    <title><?php echo $page_title; ?></title>
  </head>
  <body>
    <?php include_once $pass_front . '/modules/header/_header.php'; ?>
    <main>
      <h1><?php echo $page_title; ?></h1>
      <section class="string-conversion">
        <div class="method-selector" id="dicMethodSelector">
          <button class="method-name" id="buttonMethodHash" type="button">Hash</button>
          <button class="method-name" id="buttonMethodBase64" type="button">Base64</button>
          <button class="method-name" id="buttonMethodUuencode" type="button">UUENCODE</button>
        </div>
        <?php
          $result_text = NULL;
          include_once $pass_front . '/functions/hash.php';
          include_once $pass_front . '/functions/base64.php';
          include_once $pass_front . '/functions/uuencode.php';
        ?>

        <img src="<?php echo $page_dir . '/modules/icon/arrow-down-icon-plane.svg'; ?>" alt="arrow-down-icon-plane.svg" class="arrow-icon">

        <section class="result-area" id="sectionResultArea">
          <h2>3. Result</h2>
          <textarea placeholder="Result"><?php echo $result_text; ?></textarea>
        </section>
      </section>
    </main>

    <?php include_once $pass_front . '/modules/footer/_footer.php'; ?>

    <script>
      const elementFormBase64Codec      = document.getElementById( 'formBase64Codec' );
      const elementFormHashGeneration   = document.getElementById( 'formHashGeneration' );
      const elementFormUuencodeCodec      = document.getElementById( 'formUuencodeCodec' );
      const elementButtonMethodHash     = document.getElementById( 'buttonMethodHash' );
      const elementButtonMethodBase64   = document.getElementById( 'buttonMethodBase64' );
      const elementButtonMethodUuencode = document.getElementById( 'buttonMethodUuencode' );

      function displayBase64() {
        elementFormBase64Codec.style.height    = 'auto';
        elementFormHashGeneration.style.height = '0';
        elementFormUuencodeCodec.style.height = '0';
        elementButtonMethodBase64.style.border = 'rgb(63, 63, 63) solid thin';
        elementButtonMethodHash.style.border   = 'none';
        elementButtonMethodUuencode.style.border = 'none';
      }

      function displayHash() {
        elementFormBase64Codec.style.height    = '0';
        elementFormHashGeneration.style.height = 'auto';
        elementFormUuencodeCodec.style.height = '0';
        elementButtonMethodBase64.style.border = 'none';
        elementButtonMethodHash.style.border   = 'rgb(63, 63, 63) solid thin';
        elementButtonMethodUuencode.style.border = 'none';
      }

      function displayUuencode() {
        elementFormBase64Codec.style.height    = '0';
        elementFormHashGeneration.style.height = '0';
        elementFormUuencodeCodec.style.height = 'auto';
        elementButtonMethodBase64.style.border = 'none';
        elementButtonMethodHash.style.border   = 'none';
        elementButtonMethodUuencode.style.border = 'rgb(63, 63, 63) solid thin';
      }

      elementButtonMethodBase64.addEventListener( 'click', () => {
        displayBase64();
      }, false );

      elementButtonMethodHash.addEventListener( 'click', () => {
        displayHash();
      }, false );
/*
      elementButtonMethodUuencode.addEventListener( 'click', () => {
        displayUuencode();
      }, false );
*/
      <?php if ( isset( $_POST['conversion-method'] ) ): ?>
        const elementSectionResultArea        = document.getElementById( 'sectionResultArea' );
        elementSectionResultArea.style.border = 'green solid thin';
        
        const conversionMethod = '<?php echo $_POST['conversion-method']; ?>';
        switch ( conversionMethod ) {
          case 'base64':
            displayBase64();
            break;
          case 'hash':
            displayHash();
            break;
          case 'uuencode':
            displayUuencode();
            break;
        }
      <?php else: ?>
        displayHash();
      <?php endif; ?>
    </script>
  </body>
</html>