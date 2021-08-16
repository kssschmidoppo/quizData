<?php

include "../config.php";


    if(isset($_GET['qid'])){
        $quizID = $_GET['qid'];
    }
    else {
        $quizID = 1;
    }


$_SESSION ['quizID'] = $quizID;

$pageData = introductionDataFromDB($quizID);


// Initialize achieved number of points
$_SESSION['achievedPoints'] = 0;

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <mete name="description" content="quiz game about olympics">
    <link rel="stylesheet" href="../css/style.css">
    <title>My First Quiz</title>
</head>

<body>
<!-- BANNER -->
<div class="row">
   <div class="caption" alt="welcoming to quiz area, there picture with olympic flag and start button">
        <span class="spBorder">
            <img src="<?php echo $pageData['imageURL']; ?>" class="olyPic">
        <?php
            echo '<a href="/index.php">' . '</a>';
        ?></span>
        <!-- BUTTON -->
            <form action="<?php echo $pageData['nextAction']; ?>" method="post">
                <input type="hidden" name="nextQuestionID" 
                    value="<?php echo $pageData['nextQuestionID']; ?>">
                <button type="submit">START</button>
            </form>
    </div>
</div>    
</body>

</html>