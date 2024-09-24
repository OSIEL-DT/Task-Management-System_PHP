<?php
// update_task.php
require_once 'functions.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$task = getTask($pdo, $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    updateTask($pdo, $_POST['id'], $_POST['task_name'], $_POST['task_description']);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
</head>
<body>
    <h1>Update Task</h1>

    <form method="POST" action="update_task.php?id=<?php echo $task['id']; ?>">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" value="<?php echo htmlspecialchars($task['name']); ?>" required>
        <br>
        <label for="task_description">Task Description:</label>
        <input type="text" id="task_description" name="task_description" value="<?php echo htmlspecialchars($task['description']); ?>" required>
        <br>
        <button type="submit">Update Task</button>
    </form>
</body>
</html>
