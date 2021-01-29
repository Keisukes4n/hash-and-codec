<?php
  /**
   * 
   * 
   */
  $page_title          = 'Web tools - String conversion';
  $pass_front          = $_SERVER['DOCUMENT_ROOT'] . '/web-tools-string-conversion';
  $pass_modules_header = $pass_front . '/modules/header';
  $pass_modules_footer = $pass_front . '/modules/footer';
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
      <div id="divToolsHash">Hash</div>
      <div id="divToolsBase64">BASE64</div>
      <section class="string-conversion">
        <div class="hash-generation" id="divHashGeneration">
          <?php include './hash-generation/main.php'; ?>
        </div>
        <div class="base64-codec" id="divBase64Codec">
          <?php include './base64-codec/main.php'; ?>
        </div>
      </section>
    </main>
    <?php include $pass_modules_footer . '/_footer.php'; ?>

    <script src="/web-tools-string-conversion/modules/javascript/_main.js"></script>
  </body>
</html>