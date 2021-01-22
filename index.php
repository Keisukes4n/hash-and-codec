<?php
  $page_title = 'Web tools - HC';
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
    <header>
      <section>
        <div class="operation-button-left" id="divOperationButtonLeft">
          <img alt="menu-icon-plain.svg" id="imgMenuIcon" src="/icons/menu-icon-plain.svg">
          <span>MENU</span>
        </div>
        <span class="website-title" id="spanWebsiteTitle">Website title</span>
        <div class="operation-button-right "></div>
      </section>
      <nav class="menu" id="navMenuArea">
        <ul>
          <span class="menu-head">Options</span>
          <a class="item" href="/documents/options/option-page.html">
            <img alt="option-icon-plain.svg" class="icon" src="/icons/option-icon-plain.svg" >
            <li>Option</li>
          </a>
        </ul>
        <ul>
          <span class="menu-head">Guides</span>
          <a class="item" href="/documents/guides/en/guide-page.html">
            <img alt="guide-icon-plain.svg" class="icon" src="/icons/guide-icon-plain.svg">
            <li>English</li>
          </a>
          <a class="item" href="/documents/guides/ja/guide-page.html">
            <img alt="guide-icon-plain.svg" class="icon" src="/icons/guide-icon-plain.svg">
            <li>日本語</li>
          </a>
        </ul>
        <ul>
          <span class="menu-head">About add-on</span>
          <a class="item" href="/License" rel="noopener noreferrer" target="_balnk">
            <img alt="/icons/license-icon-plain.svg" class="icon" src="/icons/license-icon-plain.svg">
            <li>License</li>
          </a>
          <a class="item" href="https://addons.mozilla.org/en-US/firefox/addon/quicktranslator/" rel="noopener noreferrer" target="_balnk">
            <img alt="information-icon-plain.svg" class="icon" src="/icons/information-icon-plain.svg">
            <li>Product page</li>
          </a>
        </ul>
      </nav>
    </header>
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
          echo 'Created: ', $cre_date,' | Modified: ', $mod_date;
        ?>
      </section>
      <section class="copyright">
        Copyright 2021 Keisukes4n
      </section>
    </footer>
  </body>
</html>