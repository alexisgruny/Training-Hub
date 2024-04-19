<?php
require('../src/database.php');
require('../src/task.php');

$formError = array();


if (isset($_POST['addTask'])) {
    $newTask = new task();
    if (isset($_POST['addText'])) {
        $newTask->text = htmlspecialchars($_POST['addText']);
        if (empty($newTask->text))
            $formError['text'] = 'Champ requis.';
    };

    if (isset($_POST['addDeadline'])) {
        $newTask->deadline = ($_POST['addDeadline']);
        if (empty($newTask->deadline)) {
            $formError['deadline'] = 'Champ requis.';
        }
        if ($newTask->deadline < date('Y/m/d')) {
            $formError['deadline'] = 'Date Invalide.';
        }
    }
    if (isset($_POST['addPriority'])) {
        $newTask->priority = ($_POST['addPriority']);
        if (empty($newTask->priority))
            $formError['priority'] = 'Champ requis.';
    }
    $newTask->creationDate = date('Y/m/d');
    $newTask->state = 0;
    $newTask->priority = round($newTask->priority/20);
    if (empty($formError)) {
        $newTask->newTask();
    }
}

require('../vue/addTaskForm.php');
