// add_task.php
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $project_id = $_POST['project_id'];  // Get the project ID from the request
    $task_name = $_POST['task_name'];
    $due_date = $_POST['due_date'];

    $query = "INSERT INTO tasks (project_id, task_name, due_date) VALUES ('$project_id', '$task_name', '$due_date')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo json_encode(['message' => 'Task added successfully']);
    } else {
        echo json_encode(['message' => 'Error adding task']);
    }
}
