<?php
  $page_title   = 'Web tools - BASE64 codec';
  $pass_modules_header = $_SERVER['DOCUMENT_ROOT'] . '/web-tools-string-conversion/modules/header';
  $pass_modules_footer = $_SERVER['DOCUMENT_ROOT'] . '/web-tools-string-conversion/modules/footer';

  $result_text = NULL;
  
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

      
    </main>
    <?php include $pass_modules_footer . '/_footer.php'; ?>
  </body>
</html>