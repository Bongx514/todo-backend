<?php
include '../db.php'; // Ensure this file establishes a connection to the database

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Query to fetch all tasks
    $query = "SELECT Id, title, project_name, description, due_date, priority FROM tasks";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $tasks = [];

        // Fetch all tasks as an associative array
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }

        // Return tasks as JSON
        echo json_encode(['status' => 'success', 'tasks' => $tasks]);
    } else {
        echo json_encode(['status' => 'success', 'tasks' => []]); // No tasks found
    }

    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>