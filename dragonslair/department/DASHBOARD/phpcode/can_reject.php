<?php
session_start();
include ('../connection/db.php');

if (isset($_GET['id'])) {
    $app_id = $_GET['id'];

    // Database connection
    $dsn = 'mysql:host=localhost;dbname=webp3';
    $username = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
        $pdo = new PDO($dsn, $username, $password, $options);

        // Delete the candidate from the database
        $query = "DELETE FROM `applied_jobs` WHERE `app_id` = '$app_id'; ";
        $stmt = $pdo->prepare($query);
        $s = $stmt->execute();

        if ($s) {
            $_SESSION['status'] = "Candidate rejected successfully";
            // Redirect back to candidates.php
            header('location: candidates.php');
            exit();
        } else {
            $_SESSION['status'] = "Unsuccessful";
            // Redirect back to candidates.php
            header('location: candidates.php');
            exit();
        }

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit();
    }

} else {
    echo 'Connection f';
}
?>