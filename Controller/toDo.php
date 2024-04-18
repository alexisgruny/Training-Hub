<?php
require('../src/database.php');
require('../src/task.php');
 
$task =new task();
$showTask = $task->getTask();

if (isset($_GET['id'])) {
    // Instanciatiation de la classe user
    $deleteTask = NEW task();
    // Récupération de l''id par l'url
    $deleteTask->id = $_GET['id'];
    // Appel de la méthode userDelete
    $deleteTask->deleteTask();
}

require('../Vue/toDoList.php');

?>