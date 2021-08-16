<?php
    include "../config.php";

    $pageData = reportDataFromDB($_SESSION['quizID']);  

    
    if (isset($_POST['radio'])) {         
        $_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];     
        }

    $questionNum = questionNumFromDB($_SESSION['quizID']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <mete name="description" content="quiz game about olympics">
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>
    <!-- TEXT AREA --> 
    <div class="row">    
        <div class="caption" alt=" display area for result">
            <span class="border">
            <img src="<?php echo $pageData['imageURL']; ?>">
            <?php
                $percentage = $_SESSION ['achievedPoints'] / $questionNum * 100;
                echo '<a href="/index.php">' . $pageData['title'] . '</a>';
                echo '<p>You have answered ' . $_SESSION['achievedPoints'];
                echo ' question(s) correctly (' . $percentage . '%).' .  '</p>';
                
                if ($percentage >= 100) {
                    echo '<p>' . $pageData ['feedback_60'] . '</p>';   
                } 
                else if($percentage >= 50) {
                    echo '<p>' . $pageData ['feedback_50'] . '</p>';
                } 
                else {
                    echo '<p>' . $pageData ['feedback_40'] . '</p>';  
                }

            ?></span>
        </div> 
    </div>       
</body>
</html>

