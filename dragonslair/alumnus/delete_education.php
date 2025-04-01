<?php
include('session/session_check.php');
include('../connection/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['education_id'])) {
        $education_id = $_POST['education_id'];

        try {
            $conn2 = new PDO("mysql:host=$servername;dbname=$database", $username, '');
            $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare the delete statement
            $stmt = $conn2->prepare("DELETE FROM education WHERE id = :id");
            $stmt->bindParam(':id', $education_id);
            $stmt->execute();

            // Redirect back with a success message
            $_SESSION['status'] = "Education entry deleted successfully.";
            header("Location: education.php"); // Change this to the correct page
            exit;

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    } else {
        die("No education ID provided.");
    }
} else {
    die("Invalid request method.");
}
?>