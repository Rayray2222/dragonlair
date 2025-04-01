<?php
session_start();
include ('../connection/db.php');

if (isset($_SESSION['rec_id'])) {
    echo $_SESSION['rec_id'];
    $recid = $_SESSION['rec_id'];
}

foreach ($_POST as $key => $val)
    echo $key . " " . $val . "<br/>";

//INSERTION
if (isset ($_POST['submit'])) {
    // Collect input data
    $job_title = $_POST['job_title'];
    $job_description = $_POST['description'];
    $job_type = $_POST['jobType'];
    $requirements = $_POST['requirements'];
    $benefits = $_POST['benefits'];
    $salary = $_POST['salary'];

    // Ensure the data is sanitized and prepared for insertion (using prepared statements with placeholders)
    $fk_recruiter = $_SESSION['rec_id'];

    // Database connection
    $dsn = 'mysql:host=localhost;dbname=webp3';
    $username = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
        $pdo = new PDO($dsn, $username, $password, $options);
        echo 'Database connection established';

        // Use a prepared statement with placeholders
        $insert_query = "INSERT INTO job_offer 
                         (job_title, job_description, job_type, requirements, benefits, salary, rec_id)
                         VALUES 
                         (:job_title, :job_description, :job_type, :requirements, :benefits, :salary, :fk_recruiter)";

        $stmt = $pdo->prepare($insert_query);
        
        // Bind the values to the placeholders
        $stmt->bindParam(':job_title', $job_title);
        $stmt->bindParam(':job_description', $job_description);
        $stmt->bindParam(':job_type', $job_type);
        $stmt->bindParam(':requirements', $requirements);
        $stmt->bindParam(':benefits', $benefits);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':fk_recruiter', $fk_recruiter);

        // Execute the prepared statement
        $s = $stmt->execute();

        if ($s) {
            $_SESSION['status'] = "Job posted successfully";
            header('location: ../postjob.php');
            exit();
        } else {
            $_SESSION['status'] = "Unsuccessful";
        }

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit();
    }
}
?>
