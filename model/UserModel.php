<?php

require_once 'lib/Model.php';

class UserModel extends Model
{

    protected $tableName = 'user';


    public function create($firstName, $lastName, $email, $password)
    {
        $password = sha1($password);

        $query = "INSERT INTO $this->tableName (FirstName, LastName, Email, Password) VALUES (?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $firstName, $lastName, $email, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
    
    public function login($email, $password)
    {
    	$password = sha1($password);
    
    	$query = "SELECT * FROM $this->tableName WHERE email = ? AND password = ?";
    
    	$statement = ConnectionHandler::getConnection()->prepare($query);
    	$statement->bind_param('ss', $email, $password);
    	
    	// Das Statement absetzen
    	$statement->execute();
    	
    	// Resultat der Abfrage holen
    	$result = $statement->get_result();
    	if (!$result) {
    		throw new Exception($statement->error);
    	}
    	
    	// Ersten Datensatz aus dem Reultat holen
    	$row = $result->fetch_object();
    	
    	// Datenbankressourcen wieder freigeben
    	$result->close();
    	
    	// Den gefundenen Datensatz zurückgeben
    	return $row;
    	
    }
}
