<?php
require_once 'model/UserModel.php';
class UserController {
	// Funktion um die Werte eines Users Anzuzeigen
	public function index() {
		$userModel = new UserModel ();
		
		$view = new View ( 'user_index' );
		$view->title = 'Benutzer';
		$view->heading = 'Benutzer';
		$view->users = $userModel->readAll ();
		$view->display ();
	}
	
	// Werte f�r View zum User erstellen
	public function create() {
		$view = new View ( 'user_create' );
		$view->title = 'Benutzer erstellen';
		$view->heading = 'Benutzer erstellen';
		$view->display ();
	}
	
	// Werte f�r View zum User Login
	public function login() {
		$view = new View ( 'user_login' );
		$view->title = 'Login';
		$view->heading = 'Login';
		$view->display ();
	}
	public function signout() {
		session_destroy();
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /' );
	}
	
	// Funktion zum erstellen des Users
	public function doCreate() {
		if ($_POST ['send']) {
			$firstName = $_POST ['firstName'];
			$lastName = $_POST ['lastName'];
			$email = $_POST ['email'];
			$password = $_POST ['password'];
			
			$userModel = new UserModel ();
			$userModel->create ( $firstName, $lastName, $email, $password );
		}
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /' );
	}
	
	// Benutzer Login
	public function doLogin() {
		if ($_POST ['send']) {
			$email = $_POST ['email'];
			$password = $_POST ['password'];
			
			$userModel = new UserModel ();
			$User = $userModel->login ( $email, $password );
			if (isset($User->id)) {
				$_SESSION['id'] = $User->id;
			}
			if(isset($User->IsAdmin))
			{
				$_SESSION['IsAdmin'] = $User->IsAdmin;
			}
			header ( 'Location: /user' );
		}
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /' );
	}
	public function delete() {
		$userModel = new UserModel ();
		$userModel->deleteById ( $_GET ['id'] );
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /user' );
	}
}
