<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title></title>
</head>

<body>
<form action="addTask.php" method="post">
   <label>Task</label>
   <input name="addText" id="addText" type="textarea" />
   <p class="text-warning"><?= isset($formError['text']) ? $formError['text'] : ''; ?></p>

   <label>Priority</label>
   <input name="addPriority" id="addPriority" type="range" />
   <p class="text-warning"><?= isset($formError['priority']) ? $formError['priority'] : ''; ?></p>

   <label>Deadline</label>
   <input name="addDeadline" id="addDeadline" type="date" /></p>
   <p class="text-warning"><?= isset($formError['deadline']) ? $formError['deadline'] : ''; ?></p>


   <button name="addTask" type="submit">Valider</button>
</form>

    </table>
</body>