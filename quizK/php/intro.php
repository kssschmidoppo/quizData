<?php
// start session and initialize achieved number of points
session_start();

// Preset path to include folder
set_include_path($_SERVER['DOCUMENT_ROOT'] . '/quizK/php');

include 'quizDataK.php';


// Get quiz data
$quizData = qks_data();
$pageData = $quizData['intro'];

// Initialize achieved number of points
$_SESSION['achievedPoints'] = 0;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/quizK/build/css/mockUp.css">
    <title>My First Quiz</title>
</head>

<body>
    <div class="caption">
    <img src="<?php echo $pageData['imageURL']; ?>">
        <span class="border">
            <?php
            echo '<a href="/index.php">'  . '</a>';
            ?></span>
        <form action="<?php echo $pageData['nextAction']; ?>" method="post">
            <input type="hidden" name="questionID" value="<?php echo $pageData['questionID']; ?>">
            <input type="submit" value="START">
        </form>
    </div>
</body>

</html>