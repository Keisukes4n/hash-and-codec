<?php
  /**
   * 
   * 
   */
  $page_title       = 'String conversion';
  $page_dir         = '/string-conversion';
  $pass_front       = $_SERVER['DOCUMENT_ROOT'] . $page_dir;
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
        <ul>
          <li>
            <div id="divDisplayHash">change to Hash</div>
          </li>
          <li>
            <div id="divDisplayBase64">change to BASE64</div>
          </li>
        </ul>

        <?php
          $result_text = NULL;
          include_once $pass_front . '/functions/hash.php';
          include_once $pass_front . '/functions/base64.php';
        ?>

        <h2>3. Result</h2>
        <textarea id="textareaResult" placeholder="Result"><?php echo $result_text; ?></textarea>
      </section>
    </main>
    <?php include_once $pass_front . '/modules/footer/_footer.php'; ?>

    <script>
      const elementFormBase64Codec    = document.getElementById( 'formBase64Codec' );
      const elementFormHashGeneration = document.getElementById( 'formHashGeneration' );
      const elementDivDisplayBase64   = document.getElementById( 'divDisplayBase64' );
      const elementDivDisplayHash     = document.getElementById( 'divDisplayHash' );

      elementDivDisplayBase64.addEventListener( 'click', () => {
        elementFormBase64Codec.style.display    = 'block';
        elementFormHashGeneration.style.display = 'none';
      }, false );

      elementDivDisplayHash.addEventListener( 'click', () => {
        elementFormBase64Codec.style.display    = 'none';
        elementFormHashGeneration.style.display = 'block';
      }, false );

      <?php if ( isset( $_POST['conversion-method'] ) ): ?>
        const elementTextareaResult        = document.getElementById( 'textareaResult' );
        elementTextareaResult.style.border = 'green solid thin';
        
        const conversionMethod = '<?php echo $_POST['conversion-method']; ?>';
        switch ( conversionMethod ) {
          case 'base64':
            elementFormBase64Codec.style.display    = 'block';
            elementFormHashGeneration.style.display = 'none';
            break;
          case 'hash':
            elementFormBase64Codec.style.display    = 'none';
            elementFormHashGeneration.style.display = 'block';
            break;
          default:
            elementFormBase64Codec.style.height    = 'none';
            elementFormHashGeneration.style.height = 'block';
            break;
        }
      <?php endif; ?>
    </script>
  </body>
</html>