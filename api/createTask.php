<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];

    if (!$title || !$project_name || !$description || !$due_date || !$priority) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO tasks (title, project_name, description, due_date, priority) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $project_name, $description, $due_date, $priority);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Task created successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to create task.']);
    }

    $stmt->close();
    $conn->close();

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

?>