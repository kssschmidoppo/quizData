<?php
// Start the session
session_start();

// Preset path to include folder
set_include_path($_SERVER['DOCUMENT_ROOT'] . '/quizK/php');

// Page includes
//include 'auth.php';
include 'quizDataK.php';


// Get quiz data
$quizData = qks_data();

//echo "hello" . $_POST['questionID'] . "<br>";

// Get the ID of the question from the post object
// Get the question data for the given ID
if (isset($_POST['questionID'])) {
    $questionID = $_POST['questionID'];
    $pageData = $quizData['quiz'][$questionID];
}

if (!isset($pageData)) {
    echo 'Question data for questionID="' . $questionID . '" not available.';
    exit;
}

// Session object: Update number of achieved points
// var_dump($_POST);
$_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/quizK/build/css/mockUp.css">
    <title>Quiz</title>
</head>
<body>
    <div class="row">
        <div id="page-wrap">
            <img src="/quizK/images/quiz-neon.jpg" alt="neon board" style="width: 100%; height: 200%;">
            <br>
            <h1>Where Summer Olympics were held?</h1>
            <span class="border">
                <?php
                echo '<a href="/index.php">' . $pageData['text'] . '</a>';
                ?>
            </span>
            <form action="<?php echo $pageData['nextAction']; ?>" method="post">
                <div class="question container" id="quiz">

                    <div class="row answer">
                        <label>
                            <input type="radio" id="answer0" name="radio" value="<?php echo $pageData['answers'][0][1]; ?>">
                            <img src="<?php echo $pageData['answers'][0][0]; ?>" for="answer0"><br>
                        </label>
                        <label>
                            <input type="radio" id="answer1" name="radio" value="<?php echo $pageData['answers'][1][1]; ?>">
                            <img src="<?php echo $pageData['answers'][1][0]; ?>" for="answer1"><br>
                        </label>
                        <label>
                            <input type="radio" id="answer2" name="radio" value="<?php echo $pageData['answers'][2][1]; ?>">
                            <img src="<?php echo $pageData['answers'][2][0]; ?>" for="answer2"><br><br>
                        </label>
                        <label>
                            <input type="radio" id="answer2" name="radio" value="<?php echo $pageData['answers'][3][1]; ?>">
                            <img src="<?php echo $pageData['answers'][3][0]; ?>" for="answer3"><br><br>
                        </label>
                        <label>
                            <input type="hidden" name="questionID" value="<?php echo $pageData['questionID']; ?>">
                            <input type="submit" value="NEXT">
                        </label>
                    </div>
            </form>
        </div>
</body>

</html>