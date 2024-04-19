<?php
require('../src/database.php');
require('../src/task.php');
 
$task =new task();
$showTask = $task->getTask();

if (isset($_GET['delete'])) {
    // Instanciatiation de la classe task
    $deleteTask = new task();
    // Récupération de l''id par l'url
    $deleteTask->id = $_GET['id'];
    // Appel de la méthode deleteTask
    $deleteTask->deleteTask();
}

if (isset($_GET['modify'])) {
    require('../Vue/modifyTask.php');
}
if (isset($_POST['modifyTask'])) {
    $modifyTask = new task();
    if (isset($_POST['modifyText'])) {
        $modifyTask->text = htmlspecialchars($_POST['modifyText']);
        if (empty($modifyTask->text))
            $formError['text'] = 'Champ requis.';
    };

    if (isset($_POST['modifyDeadline'])) {
        $modifyTask->deadline = ($_POST['modifyDeadline']);
        if (empty($modifyTask->deadline)) {
            $formError['deadline'] = 'Champ requis.';
        }
        if ($modifyTask->deadline < date('Y/m/d')) {
            $formError['deadline'] = 'Date Invalide.';
        }
    }
    if (isset($_POST['modifyPriority'])) {
        $modifyTask->priority = ($_POST['modifyPriority']);
        if (empty($modifyTask->priority))
            $formError['priority'] = 'Champ requis.';
    }
    $modifyTask->priority = round($modifyTask->priority/20);
    $modifyTask->id = $_GET['id'];
    if (empty($formError)) {
        $modifyTask->modifyTask();
    }
}

require('../Vue/toDoList.php');

?>