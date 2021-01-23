<?php
  /**
   * 
   **/
  $page_title        = 'Web tools - HC';
  $pass_modules_page = $_SERVER['DOCUMENT_ROOT'] . '/web-tools-hc/modules/page';
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
            <input type="radio" name="hashAlgorithm" value="sha256" required><span>sha256</span>
          </label>
          <label class="tile">
            <input type="radio" name="hashAlgorithm" value="sha384"><span>sha384</span>
          </label>
          <label class="tile">
            <input type="radio" name="hashAlgorithm" value="sha512"><span>sha512</span>
          </label>
          <label class="tile">
            <input type="radio" name="hashAlgorithm" value="sha3-256"><span>sha3-256</span>
          </label>
          <label class="tile">
            <input type="radio" name="hashAlgorithm" value="sha3-384"><span>sha3-384</span>
          </label>
          <label class="tile">
            <input type="radio" name="hashAlgorithm" value="sha3-512"><span>sha3-512</span>
          </label>
          <label class="tile">
            <input type="radio" name="hashAlgorithm" value="ripemd160"><span>RIPEMD160</span>
          </label>
          <label class="tile">
            <input type="radio" name="hashAlgorithm" value="whirlpool"><span>Whirlpool</span>
          </label>
          <label class="tile">
            <input type="radio" name="hashAlgorithm" value="md5"><span>md5</span>
          </label>
        </form>
        <h2>2. Input text</h2>
          <textarea name="textareaInputArea" placeholder="Input area" form="main" required></textarea>
          <div class="generate-button">
            <input form="main" type="submit" value="Generate">
          </div>
        <h2 id="result">3. Result</h2>
          <textarea placeholder="Result">$outputResult</textarea>
      </section>
    </main>
    <footer>
      <section class="timestamp">
        <?php
          $cre_date = '22nd January, 2021';
          $mod_date = date( "jS F, Y", getlastmod() );
          echo '<p>';
          echo 'Created: ', $cre_date,' | Modified: ', $mod_date;
          echo '</p>';
        ?>
      </section>
      <section class="copyright">
        <p>Copyright 2021 Keisukes4n</p>
      </section>
    </footer>
  </body>
</html>