<?php
  /**
   * 
   * 
   */
  $page_title        = 'Web tools - String conversion';
  $pass_modules_page = $_SERVER['DOCUMENT_ROOT'] . '/web-tools-string-conversion/modules/page';

  $result_text = NULL;
  
  if ( isset( $_POST['hash-algorithm'] ) ):
    $hash_algorithm = $_POST['hash-algorithm'];
    $input_string   = htmlspecialchars( $_POST['input-string'], ENT_QUOTES, 'UTF-8' );

    $hash_value  = hash( $hash_algorithm, $input_string, false );
    $result_text = <<< "EOD"
    * Hash value
    $hash_value
    * Input string
    $input_string
    * Hash algorithm
    $hash_algorithm
    EOD;
  endif;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css" rel="stylesheet" type="text/css">
    <title><?php echo $page_title; ?></title>
  </head>
  <body>
    <?php include $pass_modules_page . '/_header.php'; ?>
    <main>
      <h1><?php echo $page_title; ?></h1>

      <section class="hash-generator">
        <h2>1. Select hash algorithm</h2>
        <form class="select-algorithm" action="#result" method="POST" id="main">
          <label class="tile">
            <input type="radio" name="hash-algorithm" value="sha256" required><span>sha256</span>
          </label>
          <label class="tile">
            <input type="radio" name="hash-algorithm" value="sha384"><span>sha384</span>
          </label>
          <label class="tile">
            <input type="radio" name="hash-algorithm" value="sha512"><span>sha512</span>
          </label>
          <label class="tile">
            <input type="radio" name="hash-algorithm" value="sha3-256"><span>sha3-256</span>
          </label>
          <label class="tile">
            <input type="radio" name="hash-algorithm" value="sha3-384"><span>sha3-384</span>
          </label>
          <label class="tile">
            <input type="radio" name="hash-algorithm" value="sha3-512"><span>sha3-512</span>
          </label>
          <label class="tile">
            <input type="radio" name="hash-algorithm" value="ripemd160"><span>RIPEMD160</span>
          </label>
          <label class="tile">
            <input type="radio" name="hash-algorithm" value="whirlpool"><span>Whirlpool</span>
          </label>
          <label class="tile">
            <input type="radio" name="hash-algorithm" value="md5"><span>md5</span>
          </label>
        </form>
        <h2>2. Input text</h2>
          <textarea name="input-string" placeholder="Input area" form="main" required></textarea>
          <input class="submit-button" form="main" type="submit" value="Generate!">
        <h2 id="result">3. Result</h2>
          <textarea placeholder="Result"><?php echo $result_text; ?></textarea>
      </section>
    </main>
    <?php include $pass_modules_page . '/_footer.php'; ?>
  </body>
</html>