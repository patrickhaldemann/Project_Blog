<?php
require_once 'lib/Model.php';
class UserModel extends Model {
	protected $tableName = 'user';
	public function create($firstName, $lastName, $email, $password) {
		$password = sha1 ( $password );
		
		$query = "INSERT INTO $this->tableName (FirstName, LastName, Email, Password) VALUES (?, ?, ?, ?)";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 'ssss', $firstName, $lastName, $email, $password );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
	}
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
		
		// Den gefundenen Datensatz zurückgeben
		return $row;
	}
	public function changePassword($OldPassword, $NewPassword, $id) {
		$OldPassword = sha1 ( $OldPassword );
		$NewPassword = sha1 ( $NewPassword );
		
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
		}
	}
}
