<?php
include "../config.php";


if (isset($_POST['nextQuestionID'])) {
    $questionID = $_POST['nextQuestionID'];
    //echo "hell id..." . $questionID . "<br>";

    //echo "hello" . $_SESSION['quizID'] . "<br>";

    $pageData = questionDataFromDB($_SESSION['quizID'], $questionID);
}


if (isset($_POST['radio'])) {
    $_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <mete name="description" content="quiz game about olympics">
    <link rel="stylesheet" href="../css/style.css">
    <title>Quiz</title>
</head>

<body>
    <!-- BANNER -->
    <div class="row">
        <div id="page-wrap">
        <img src="../images/quiz-neon.jpg" alt="neon board with quiz written on" style="width: 100%; height: 200%;">
        <br>
        <!-- MAIN QUESTION -->
        <h1>Where Summer Olympics were held?</h1>
            <div class="caption" alt="quiz display, where question and few offered answers">
            <!-- SECOND QUESTION -->
                <span class="border" alt="question, where offered years changes">
                    <?php
                        echo '<a href="/index.php">' . $pageData['text'] . '</a>';
                    ?>
                </span>
                <!--  ANSWERS AREA  -->
                    <form action="<?php echo $pageData['nextAction']; ?>" method="post" alt="function what changes next question and offerd answers">
                        <div class="question container" id="quiz">
                            <?php
                                $answers = $pageData['answers'];
                                    
                                $answersCount = 0;
                                //var_dump($pageData);


                                foreach ($answers as $answer) {
                                   // var_dump($answer);

                                    if($pageData['type'] == 'img'){
                                        echo '<img src="' . $answer['text'] . '">'; 

                                        echo '<input type="radio" id="answers' . $answersCount . '" name="radio" value="' . $answer['isCorrect'] . '">';
                                        echo PHP_EOL;
                                    } 
                                    else {

                                        echo '<input type="radio" id="answers' . $answersCount . '" name="radio" value="' . $answer['isCorrect'] . '">';
                                        echo PHP_EOL; 

                                        // ... a label ...
                                        echo '<label for="answers' . $answersCount . '">' . $answer['text'] . '</label>';

                                        // ... and a line break at the end.
                                        echo '<br>' . PHP_EOL;
                                        
                                    }
                                        // prepare next answer ID
                                        $answersCount++;
                                }   
                            ?>
                            <!-- DISPLAYED BUTTON -->
                            <label alt="displayed button and next question function">
                                <input type="hidden" name="nextQuestionID" 
                                    value="<?php echo $pageData['nextQuestionID']; ?> ">
                                    <br>
                                <button type="submit">NEXT</button>  
                            </label>
                        </div>
                    </form>
            </div>
        </div>
    </div>                          

</body>

</html>