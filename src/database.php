<?php
class database
{
    protected $db;
    private $serverName = 'localhost';
    private $databaseName = 'todo';
    private $username = 'root';
    private $password = '';
    function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . $this->serverName . ';dbname=' . $this->databaseName . ';charset=utf8', $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
