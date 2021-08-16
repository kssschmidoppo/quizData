<?php
include 'php/auth.php';

function addLinks()
{
  $links = scandir("projects/");             // creating an array with all items(files and folders) in the choosen folder(path) including the . and ..
  $links = array_splice($links, 2, count($links));  // get rid of the . and ..
  $links = array_values($links);        // reseting the indexes starting from 0

  foreach ($links as $i => $value) {
    if (file_exists('projects/' . $value . '/info.php')) {
      require_once 'projects/' . $value . '/info.php';
      //echo "index = " . $i . " / value = " . $value . "<br>";
      echo '<a href="/projects/' . $value . '/' . $projData["StartPage"] . '">' . $projData["ProjectName"] . '</a><br>';
    }
  }
}


?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <mete name="description" content="quiz game about olympics">
    <title>Hello Quiz</title>
</head>

<body>
  <div class="bgimg-1">
    <div class="caption">
      <span class="border"><?php addLinks(); ?></span>
    </div>
  </div>
</body>

</html>