<?php
  /**
   * 
   * 
   */
  $page_title = 'String conversion';
  $page_dir   = '/string-conversion';
  $pass_front = $_SERVER['DOCUMENT_ROOT'] . $page_dir;
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
    <?php include $pass_front . '/modules/header/_header.php'; ?>

    <main>
      <h1><?php echo $page_title; ?></h1>
      <section class="string-conversion">
        <ul>
          <li>
            <div id="divCTH">change to Hash</div>
          </li>
          <li>
            <div id="divCTB">change to BASE64</div>
          </li>
        </ul>
        <?php
          $result_text = NULL;
          include_once $pass_front . '/functions/hash.php';
          include_once $pass_front . '/functions/base64.php';

          include_once $pass_front . '/functions/common/textarea.php';
        ?>
      </section>
    </main>

    <?php include $pass_front . '/modules/footer/_footer.php'; ?>
    <script src="<?php echo $page_dir; ?>/modules/javascript/_main.js"></script>
  </body>
</html>