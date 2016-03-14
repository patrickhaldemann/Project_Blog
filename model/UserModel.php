<?php
require_once 'lib/Model.php';
class UserModel extends Model {
	protected $tableName = 'user';
	
	//Funktion zum erstellen eines Users
	public function create($firstName, $lastName, $email, $password) {
		$password = sha1 ( $password );
		
		$query = "INSERT INTO $this->tableName (FirstName, LastName, Email, Password) VALUES (?, ?, ?, ?)";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 'ssss', $firstName, $lastName, $email, $password );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
	}
	
	//Funktion für das Login
	public function login($email, $password) {
		$password = sha1 ( $password );
		
		$query = "SELECT * FROM $this->tableName WHERE email = ? AND password = ?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 'ss', $email, $password );
		
		// Das Statement absetzen
		$statement->execute ();
		
		// Resultat der Abfrage holen
		$result = $statement->get_result ();
		if (! $result) {
			throw new Exception ( $statement->error );
		}
		
		// Ersten Datensatz aus dem Reultat holen
		$row = $result->fetch_object ();
		
		// Datenbankressourcen wieder freigeben
		$result->close ();
		
		// Den gefundenen Datensatz zurÃ¼ckgeben
		return $row;
	}
	
	//Funktion  die benötigt wird um das Passwort zu ändern
	public function changePassword($OldPassword, $NewPassword) {
		$OldPassword = sha1 ( $OldPassword );
		$NewPassword = sha1 ( $NewPassword );
		$works = false;
		
		$queryCheck = "SELECT * FROM user WHERE Password = ?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $queryCheck );
		$statement->bind_param ( 's', $OldPassword );
		
		// Das Statement absetzen
		$statement->execute ();
		
		// Resultat der Abfrage holen
		$result = $statement->get_result ();
		if (! $result) {
			throw new Exception ( $statement->error );
		}
		
		// Ersten Datensatz aus dem Reultat holen
		$row = $result->fetch_object ();
		
		// Datenbankressourcen wieder freigeben
		$result->close ();
		
		if (isset ( $row )) {
			$query = "UPDATE user SET Password = ? WHERE id = ?";
			
			$statement = ConnectionHandler::getConnection ()->prepare ( $query );
			$statement->bind_param ( 'si', $NewPassword, $id );
			if (! $statement->execute ()) {
				throw new Exception ( $statement->error );
			}
			$works = true;
		}
		return $works;
	}
	
	//Funktion die Login Daten Prüft
	public function checkPassword($password, $email) {
		$password = sha1($password);
		$works = false;
		
		$query = "SELECT * FROM user WHERE Password = ? AND Email = ?";
		
		$statement = ConnectionHandler::getConnection()->prepare($query);
		$statement->bind_param('ss', $password, $email);
		
		// Das Statement absetzen
		$statement->execute ();
		
		// Resultat der Abfrage holen
		$result = $statement->get_result ();
		if (!$result) {
			throw new Exception ( $statement->error );
		}
		else {
			$works = true;
		}
		
		// Ersten Datensatz aus dem Resultat holen
		$row = $result->fetch_object();
		
		// Datenbankressourcen wieder freigeben
		$result->close ();
		return $works;
	}
}
