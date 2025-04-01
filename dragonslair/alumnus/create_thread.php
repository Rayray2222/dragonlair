<?php
// Include necessary files (e.g., database connection, session check)
include('session/session_check.php');
include('../connection/db.php');

session_start();

// Check if the user is logged in (assuming session stores candidate info)
if (!isset($_SESSION['candidate_id'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to post a thread']);
    exit();
}

// Get candidate ID from session
$candidate_id = $_SESSION['candidate_id'];

// Get form data
$title = isset($_POST['title']) ? $_POST['title'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';

// Validate input data
if (empty($title) || empty($content)) {
    echo json_encode(['success' => false, 'message' => 'Title and content are required']);
    exit();
}

// Insert the new forum thread into the database
$sql = "INSERT INTO forum_threads (candidate_id, title, content, created_at) VALUES (?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param('iss', $candidate_id, $title, $content);

if ($stmt->execute()) {
    $thread_id = $stmt->insert_id;

    // Handle file uploads (if any)
    if (isset($_FILES['attachments'])) {
        foreach ($_FILES['attachments']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['attachments']['name'][$key];
            $file_tmp = $_FILES['attachments']['tmp_name'][$key];
            $file_path = 'uploads/' . $file_name;

            // Move the file to the server
            if (move_uploaded_file($file_tmp, $file_path)) {
                // Insert file info into the database
                $sql_file = "INSERT INTO forum_attachments (thread_id, file_name, file_path) VALUES (?, ?, ?)";
                $stmt_file = $conn->prepare($sql_file);
                $stmt_file->bind_param('iss', $thread_id, $file_name, $file_path);
                $stmt_file->execute();
            }
        }
    }

    echo json_encode(['success' => true, 'message' => 'Thread created successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to create thread']);
}

$stmt->close();
$conn->close();
?>
