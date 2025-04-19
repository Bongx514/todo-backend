<?php
include '../db.php'; // Ensure this file establishes a connection to the database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the task ID from the POST request
    $taskId = $_POST['Id'] ?? null;

    // Validate the task ID
    if (!$taskId) {
        echo json_encode(['status' => 'error', 'message' => 'Task ID is required']);
        exit;
    }

    // Prepare the SQL query to delete the task
    $stmt = $conn->prepare("DELETE FROM tasks WHERE Id = ?");
    $stmt->bind_param("i", $taskId);

    // Execute the query
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Task deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Task not found']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete task']);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>