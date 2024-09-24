<?php
// index.php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_task'])) {
    addTask($pdo, $_POST['task_name'], $_POST['task_description']);
    header("Location: index.php");
}

if (isset($_GET['delete'])) {
    deleteTask($pdo, $_GET['delete']);
    header("Location: index.php");
}

$tasks = getTasks($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <h1>Task Manager</h1>

    <!-- Add New Task Form -->
    <form method="POST" action="index.php">
        <input type="text" name="task_name" placeholder="Task Name" required>
        <input type="text" name="task_description" placeholder="Task Description" required>
        <button type="submit" name="add_task">Add Task</button>
    </form>

    <!-- Task List -->
    <table border="1">
        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?php echo htmlspecialchars($task['name']); ?></td>
            <td><?php echo htmlspecialchars($task['description']); ?></td>
            <td>
                <a href="update_task.php?id=<?php echo $task['id']; ?>">Edit</a>
                <a href="index.php?delete=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
