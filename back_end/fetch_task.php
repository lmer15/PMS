// fetch_tasks.php
<?php
include 'db_connection.php';

if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];
    $query = "SELECT * FROM tasks WHERE project_id = '$project_id'";
    $result = mysqli_query($conn, $query);

    $tasks = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $tasks[] = [
            'id' => $row['id'],
            'task_name' => $row['task_name'],
            'due_date' => $row['due_date'],
            'status' => $row['status']
        ];
    }

    echo json_encode($tasks);
}
?>
