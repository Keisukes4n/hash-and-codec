<?php
  /**
   * description: Main file of string conversion
   */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title><?=htmlspecialchars( $_SERVER['PHP_SELF'], ENT_QUOTES );?></title>
  </head>
  <body>
    <?php include_once './modules/header/_central.php'; ?>
    <main>
      <h1><?=htmlspecialchars( $_SERVER['PHP_SELF'], ENT_QUOTES );?></h1>
      <div class="process-selector" id="divMethodSelector">
        <button id="buttonProcessBase64" type="button">Base64</button>
        <button id="buttonProcessHash" type="button">Hash</button>
        <button id="buttonProcessUuencode" type="button">UUENCODE</button>
      </div>
      <?php include_once './modules/function/_base64.php'; ?>
      <?php include_once './modules/function/_hash.php'; ?>
      <?php include_once './modules/function/_uuencode.php'; ?>
      <?php include_once './modules/footer/_central.php'; ?>
    </main>

    <?php include_once './modules/_script.php'; ?>
  </body>
</html>