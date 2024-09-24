<?php
// functions.php
require_once 'db.php';

// Fetch all tasks
function getTasks($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM tasks ORDER BY id DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add a new task
function addTask($pdo, $task_name, $task_description) {
    $stmt = $pdo->prepare("INSERT INTO tasks (name, description) VALUES (:name, :description)");
    $stmt->execute(['name' => $task_name, 'description' => $task_description]);
}

// Get task by ID
function getTask($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Update task
function updateTask($pdo, $id, $task_name, $task_description) {
    $stmt = $pdo->prepare("UPDATE tasks SET name = :name, description = :description WHERE id = :id");
    $stmt->execute(['id' => $id, 'name' => $task_name, 'description' => $task_description]);
}

// Delete task
function deleteTask($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->execute(['id' => $id]);
}
?>
