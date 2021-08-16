<?php


if (strpos($_SERVER['HTTP_HOST'], 'localhost:') !== false) {
    //echo 'dp-access.php::0<br>';
    // DB runs in local Docker container.
    define('DB_HOST', getenv('DB_HOST'));
    define('DB_NAME', getenv('DB_NAME'));
    define('DB_USER', getenv('DB_USER'));
    define('DB_PASSWORD', getenv('DB_PASSWORD'));
}
else {
    //echo 'dp-access.php::1<br>';

    define('DB_HOST', 'ipiluwig.mysql.db.internal');/// same for all
    define('DB_NAME', 'ipiluwig_ks');
    define('DB_USER', 'ipiluwig_01');
    define('DB_PASSWORD', '.....');
}

//Creates or reuses a single PDO connection object.
 
function DBConnection() {
    
    try {
        $connection = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', 
            DB_USER, 
            DB_PASSWORD
        );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo '<p>DB connection failed: ' . $e->getMessage() . '</p>'; //variable $e = value for exception 
        echo 'HTTP_HOST = ' . $_SERVER['HTTP_HOST'] . '<br>';
        echo 'DB_NAME = ' . DB_NAME . '<br>';
        echo 'DB_USER = ' . DB_USER . '<br>';
        echo 'DB_PASSWORD = ' . DB_PASSWORD . '<br>';
        echo 'DB_HOST = ' . DB_HOST . '<br>';
        exit;
    }

    return $connection;
}

/**
 * Gets the data for the introduction page.
 * 
 * @param integer $quizID   The id of the quiz the introduction is associated to.
 * 
 * @return Pagedata in form of an associative array.
 */
/////into/////

function introductionDataFromDB($quizID){
    //if(TRACE_DB_ACCESS) print "<h1>INTRODUCTION</h1>";

    $query  = DBConnection()->prepare("SELECT * FROM introduction WHERE quizID = ?");
    $query->bindValue(1, $quizID);
    $query->execute();

    $introduction = $query->fetch(PDO::FETCH_ASSOC);

    //if(TRACE_DB_ACCESS){
       // var_dump($introduction);
        //echo "<p>------------------------------------------<p>";
    //}
    return $introduction;
}  
/////quiz/////

function questionDataFromDB($quizID, $questionID) {
    //if(TRACE_DB_ACCESS) print "<h1>QEUSTION DATA</h1>";

    $query  = DBConnection()->prepare("SELECT * FROM questions WHERE quizID = ? AND questionID =?" );
    $query->bindValue(1, $quizID);
    $query->bindValue(2, $questionID);
    $query->execute();

    $data = $query->fetch(PDO::FETCH_ASSOC);

    //if(TRACE_DB_ACCESS){
        //var_dump($data);
        //echo "<p>------------------------------------------<p>";
    //}

    $data['answers'] = answerDataFromDB($questionID);

    return $data;

}
/////answers//////

function answerDataFromDB($questionID){
        //if(TRACE_DB_ACCESS)print "<h1>ANSWER DATA </h1>";
        $query  = DBConnection()->prepare("SELECT text, isCorrect FROM answers WHERE questionID =?" );
        $query->bindValue(1, $questionID);
        $query->execute();

        $answers = $query->fetchAll(PDO::FETCH_ASSOC);

        //if(TRACE_DB_ACCESS){
            //var_dump($answers);
            //echo "<p>------------------------------------------<p>";
        //}

        return $answers;
}

function reportDataFromDB($quizID) {
    // Prepare, bind and execute SELECT statement
    $query = DBConnection()->prepare("SELECT * FROM result WHERE quizID = ?");
    $query->bindValue(1, $quizID);
    $query->execute();
    
    // Fetch the record (whole first row) as assoc array.
    $data = $query->fetch(PDO::FETCH_ASSOC); // fetch() instead of fetchAll()

    if (TRACE_DB_ACCESS) {
        print "<h1>REPORT DATA</h1>";
        prettyEcho($data);
        echo '<p>-------------------------------------</p>'; // echo separator line
    }

    return $data;
}

    
function questionIdsFromDB($quizID) {
    ///if(TRACE_DB_ACCESS) print "<h1>QEUSTION id</h1>";

    $query  = DBConnection()->prepare("SELECT * FROM questions WHERE quizID = ?" );
    $query->bindValue(1, $quizID);
    $query->execute();

    $questionIDs = $query->fetchAll(PDO::FETCH_ASSOC);

    if(TRACE_DB_ACCESS){
        var_dump($questionIDs);
        echo "<p>------------------------------------------<p>";
    }


    return $questionIDs;
} 

function questionNumFromDB($quizID) {
    return count ( questionIDsFromDB ($quizID) );
} 

function prettyEcho($data) {
    echo '<pre>' . var_export($data, true) . '</pre>';
}

?>