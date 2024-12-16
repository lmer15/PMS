// update_task_status.php
<?php
include 'db_connection.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['task_id']) && isset($data['status'])) {
    $task_id = $data['task_id'];
    $status = $data['status'];  // Either 'completed' or 'incomplete'

    $query = "UPDATE tasks SET status = '$status' WHERE id = '$task_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(['message' => 'Task status updated successfully']);
    } else {
        echo json_encode(['message' => 'Error updating task status']);
    }
}
?>
