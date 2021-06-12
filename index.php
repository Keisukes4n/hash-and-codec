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
    <script defer src="./modules/index/_script.js"></script>
    <script defer src="./modules/header/_script.js"></script>
  </head>
  <body>
    <?php include_once './modules/header/_central.php'; ?>

    <main>
      <h1><?=htmlspecialchars( $_SERVER['PHP_SELF'], ENT_QUOTES );?></h1>
      <div class="process-selector" id="divProcessSelector">
        <button type="button" id="buttonProcessBase64">Base64</button>
        <button type="button" id="buttonProcessHash">Hash</button>
        <button type="button" id="buttonProcessUuencode">UUENOCDE</button>
      </div>
      <?php include_once './modules/function/_base64.php'; ?>
      <?php include_once './modules/function/_hash.php'; ?>
      <?php include_once './modules/function/_uuencode.php'; ?>
    </main>
    
    <?php include_once './modules/footer/_central.php'; ?>
  </body>
</html>