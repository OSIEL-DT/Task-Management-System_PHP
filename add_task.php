<?php
// add_task.php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    addTask($pdo, $_POST['task_name'], $_POST['task_description']);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
</head>
<body>
    <h1>Add New Task</h1>

    <form method="POST" action="add_task.php">
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" required>
        <br>
        <label for="task_description">Task Description:</label>
        <input type="text" id="task_description" name="task_description" required>
        <br>
        <button type="submit">Add Task</button>
    </form>
</body>
</html>
