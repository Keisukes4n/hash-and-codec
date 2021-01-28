<?php
  $page_title   = 'Web tools - BASE64 codec';
  $pass_modules_header = $_SERVER['DOCUMENT_ROOT'] . '/web-tools-string-conversion/modules/header';
  $pass_modules_footer = $_SERVER['DOCUMENT_ROOT'] . '/web-tools-string-conversion/modules/footer';

  $result_text      = NULL;
  $converted_string = NULL;
  
  if ( isset( $_POST['encode-or-decode'] ) ):
    $convertion_process = $_POST['encode-or-decode'];

    if ( isset( $_POST['input-string'] ) ):
      $input_string   = htmlspecialchars( $_POST['input-string'], ENT_QUOTES, 'UTF-8' );

      switch ( $convertion_process ) {
        case 'encode':
          $converted_string = base64_encode( $input_string );
          break;
        case 'decode':
          $converted_string = base64_decode( $input_string );
          break;
      }

      $result_text = <<< "EOD"
      * Result
      $converted_string
      * Input string
      $input_string
      * Convertion process
      $convertion_process
      EOD;
    endif;
  endif;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/web-tools-string-conversion/style.css" rel="stylesheet" type="text/css">
    <title><?php echo $page_title; ?></title>
  </head>
  <body>
    <?php include $pass_modules_header . '/_header.php'; ?>
    <main>
      <h1><?php echo $page_title; ?></h1>
      <section class="base64-codec">
        <h2>1. Select "Encode" or "Decode"</h2>
        <form action="#result" class="convertion-process" id="main" method="POST">
          <label class="tile">
            <input type="radio" name="encode-or-decode" value="encode" required><span>Encode</span>
          </label>
          <label class="tile">
            <input type="radio" name="encode-or-decode" value="decode"><span>Decode</span>
          </label>
        </form>
        <h2>2. Input text</h2>
          <textarea name="input-string" placeholder="text" form="main" required></textarea>
          <input class="submit-button" form="main" type="submit" value="Convert!">
        <h2 id="result">3. Result</h2>
          <textarea placeholder="Result"><?php echo $result_text; ?></textarea>
      </section>
    </main>
    <?php include $pass_modules_footer . '/_footer.php'; ?>
  </body>
</html>