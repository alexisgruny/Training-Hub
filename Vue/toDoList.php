<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title></title>
</head>

<body>
    <h1>My To Do List </h1>
    <table>
        <tr>
            <td>To Do</td>
            <td>Dealine</td>
            <td>Priority</td>
            <td>Statement</td>
            <td>Creation Date</td>  
            <td>Supprimer</td>
        </tr>
        <?php
        foreach ($showTask  as $showTask ) {
        ?>
            <tr>
                <td><?= htmlspecialchars($showTask->text) ?></td>
                <td><?= $showTask->deadline ?></td>
                <td><?= $showTask->priority ?></td>
                <td><?= $showTask ->state ?></td>
                <td><?= $showTask->creationDate ?></td>
                <<td><a type="button" href="toDo.php?id=<?= $showTask->id ?>">Supprimer</a></td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>