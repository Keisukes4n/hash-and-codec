<?php

declare( strict_types=1 );

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
    <title><?php echo htmlspecialchars( $_SERVER['PHP_SELF'], ENT_QUOTES ); ?></title>
    <script defer src="./modules/index/_script.js"></script>
    <script defer src="./modules/header/_script.js"></script>
  </head>
  <body>
    <?php include_once './modules/header/_central.php'; ?>

    <main>
      <h1><?php echo htmlspecialchars( $_SERVER['PHP_SELF'], ENT_QUOTES ); ?></h1>
      <div class="process-selector" id="divProcessSelector">
        <label id="labelProcessBase64">
          <input type="radio" name="selector" value="base64">
          <div>Base64</div>
        </label>
        <label id="labelProcessHash">
          <input type="radio" name="selector" value="hash">
          <div>Hash</div>
        </label>
        <label id="labelProcessUuencode">
          <input type="radio" name="selector" value="uuencode">
          <div>UUENCODE</div>
        </label>
      </div>
      <?php include_once './modules/features/_base64.php'; ?>
      <?php include_once './modules/features/_hash.php'; ?>
      <?php include_once './modules/features/_uuencode.php'; ?>
    </main>
    
    <?php include_once './modules/footer/_central.php'; ?>
  </body>
</html>