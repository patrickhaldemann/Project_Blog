<?php
require_once 'lib/Model.php';
class BlogModel extends Model {
	protected $tableName = 'blog';
	
	public function create($BlogTitle, $BlogContent){
		$userId = $_SESSION['id'];
		$currentDate = date("Y/m/d");
		
		$query = "INSERT INTO $this->tableName (BlogTitle, BlogContent, CreateDate, FK_User) VALUES (?, ?, ?, ?)";
		
		$statement = ConnectionHandler::getConnection()->prepare($query);
		if ($statement == false)
			echo '<p>Falsches SQL Query. </p>';
		$statement->bind_param('sssi', $BlogTitle, $BlogContent, $currentDate, $userId);
		
		if (!$statement->execute()) {
			throw new Exception($statement->error);
		}
	}
}