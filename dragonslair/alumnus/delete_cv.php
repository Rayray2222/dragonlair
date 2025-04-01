<?php
include('session/session_check.php');
include('../connection/db.php');

// Ensure the user is logged in and has a CV to delete
$edit = $_SESSION['can_id'];
if (empty($edit)) {
    header('Location: login.php'); // Redirect to login if no session
    exit();
}

try {
    // Create a PDO instance to interact with the database
    $conn2 = new PDO("mysql:host=$servername;dbname=$database", $username, '');
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the current user's CV filename
    $stmt = $conn2->prepare("SELECT cv FROM Candidates WHERE can_id = :can_id");
    $stmt->bindParam(':can_id', $edit, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $cv = $result['cv'];

        // If there's a CV, proceed to delete it
        if ($cv != 'noCV.pdf' && file_exists('../uploads/' . $cv)) {
            // Delete the file from the server
            unlink('../uploads/' . $cv);
        }

        // Update the database to set cv back to 'noCV.pdf'
        $updateStmt = $conn2->prepare("UPDATE Candidates SET cv = 'noCV.pdf' WHERE can_id = :can_id");
        $updateStmt->bindParam(':can_id', $edit, PDO::PARAM_INT);
        $updateStmt->execute();

        // Set a session message to confirm the action
        $_SESSION['status'] = "Your CV has been deleted successfully.";
    } else {
        $_SESSION['status'] = "No CV found to delete.";
    }
} catch (PDOException $e) {
    $_SESSION['status'] = "Error: " . $e->getMessage();
}

// Redirect back to the profile page
header("Location: profile.php");
exit();
?>