<?php
  if (session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>scraper</title>
</head>
<body>

  <form action="index.php" method="post">
    <label for="httpAddress">Please enter full http address</label><br>
    <input type="text" name="httpAddress"><input type="submit" value="Submit">
  </form>

  <?php

    $httpAddress = $_POST['httpAddress'];
    $web = file_get_contents($httpAddress);

    echo '<h2>Liczba znaków przed przetworzeniem: '. strlen($web) . '</h2><br>';

    $textStripTags = strip_tags($web);

    echo '<h2>Liczba znaków po przetworzeniu '. strlen($textStripTags) . '</h2><br>';

    echo "<p>$textStripTags</p><br>";

    $doc = new DOMDocument($textStripTags);

    $doc->formatOutput = true;

    $date = date('YmdHis');
    $text = $doc->createTextNode($textStripTags);

    $formatFile = $date . '.txt';
    $doc->save($date . '.txt');
    echo $date;
    echo $formatFile;
  ?>
</body>
</html>