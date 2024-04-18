<?php
class task extends database
{
    public $text;
    public $deadline;
    public $priority;
    public $creationDate;
    public $state;
    public $id;

    function getTask()
    {   //Déclaration de la requête SQL qui permet de récupérer les données dans la base de données
        $request = "SELECT * FROM `task`";
        //Préparation de la requête SQL
        $task = $this->db->prepare($request);
        // si la requête c'est éxécuté retourne un object dans la variable $task
        if ($task->execute()) {
            return $task->fetchAll(PDO::FETCH_OBJ);
        }
    }


    function  newTask()
    {
        //Déclaration de la requête SQL qui permet de stocker les données d'une nouvelle music dans la base de donnée
        $request = 'INSERT INTO `task` (`text`, `creationDate`, `deadline`, `state`, `priority` ) '
            . 'VALUES ( :text, :creationDate, :deadline, :state, :priority)';
        // Préparation de la requête SQL pour éviter les injections SQL
        $newTask = $this->db->prepare($request);
        // Remplacement des marqueurs nominatif
        $newTask->bindValue(':text', $this->text, PDO::PARAM_STR);
        $newTask->bindValue(':creationDate', $this->creationDate, PDO::PARAM_STR);
        $newTask->bindValue(':deadline', $this->deadline, PDO::PARAM_STR);
        $newTask->bindValue(':state', $this->state, PDO::PARAM_STR);
        $newTask->bindValue(':priority', $this->priority, PDO::PARAM_STR);
        // Si la requête c'est éxécuté on termine la fonction 
        if ($newTask->execute()) {
            return;
        } else {
            // Si la requête ne c'est pas éxécuté on stock un message d'érreur dans le tableau d'érreur pour informer l'utilisateur
            $formError['execute'] = 'une erreur dans le processus d\'inscription';
        }
    }


    function deleteTask()
    {
        // Prépare la requête SQL qui permet de supprimer un utilisateur
        $request = 'DELETE FROM `task` WHERE `id` = :id';

        $deleteTask = $this->db->prepare($request);
        // Remplacement des marqueurs nominatif
        $deleteTask->bindValue(':id', $this->id, PDO::PARAM_INT);
        // Execute la requête 
        $deleteTask->execute();
        return $deleteTask;
    }
}
