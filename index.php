<?php
  /**
   * main file of string conversion
   */

  /** parameters */
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
    <?php include_once './modules/header/_central.php'; ?>
    <main>
      <h1><?php echo htmlentities( $_SERVER['PHP_SELF'] ); ?></h1>
      <section class="string-conversion">
        <div class="process-selector" id="divMethodSelector">
          <p>Process</p>
          <button id="buttonProcessBase64" type="button">Base64</button>
          <button id="buttonProcessHash" type="button">Hash</button>
          <button id="buttonProcessUuencode" type="button">UUENCODE</button>
        </div>

        <?php include_once './modules/function/_base64.php'; ?>
        <?php include_once './modules/function/_hash.php'; ?>
        <?php include_once './modules/function/_uuencode.php'; ?>
      </section>
    </main>
    <?php include_once './modules/_footer.php'; ?>

    <?php include_once './modules/_script.php'; ?>
  </body>
</html>