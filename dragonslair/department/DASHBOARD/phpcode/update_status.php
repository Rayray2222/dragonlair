<?php
session_start();
include ('../connection/db.php');

if (isset($_POST['app_id']) && isset($_POST['status'])) {
    $app_id = $_POST['app_id'];
    $newStatus = $_POST['status'];

    // Update the status in the database
    $query = "UPDATE `applied_jobs` SET `statut` = ? WHERE `app_id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $newStatus, $can_id);
    if ($stmt->execute()) {
        // Status updated successfully
        echo "Status updated successfully";
    } else {
        // Failed to update status
        echo "Failed to update status";
    }
} else {
    // Invalid request
    echo "Invalid request";
}
?>