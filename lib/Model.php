<?php

require_once 'ConnectionHandler.php';
class Model
{
    protected $tableName = null;
    
    //Standart-Funktion um nur ganz Bestimmten Datensatz zu laden
    public function readById($id)
    {
        $query = "SELECT * FROM $this->tableName WHERE id=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);
        $statement->execute();
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        $row = $result->fetch_object();
        $result->close();
        return $row;
    }
    
    //Standart-Funktion um bestimmte Datensätze zu lesen
    public function readAll($max = 100)
    {
        $query = "SELECT * FROM $this->tableName ORDER BY id DESC LIMIT 0, $max";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }
    
    //Standart-Funktion die zum Löschen verwendet wird
    public function deleteById($id)
    {
        $query = "DELETE FROM $this->tableName WHERE id=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
