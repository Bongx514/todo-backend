<?php
header('Content-Type: application/json');

// Display available API endpoints
echo json_encode([
    'status' => 'success',
    'message' => 'Welcome to the Todo API',
    'endpoints' => [
        'createTask' => '/todo-endpoints/api/createTask.php',
        'getTasks' => '/todo-endpoints/api/getTasks.php',
        'deleteTask' => '/todo-endpoints/api/deleteTask.php'
    ]
]);
?>