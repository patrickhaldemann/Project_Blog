<?php
require_once 'model/UserModel.php';
class UserController {
	// Funktion um die Werte eines Users Anzuzeigen
	public function index() {
		$userModel = new UserModel ();
		
		$view = new View ( 'user_index' );
		$view->title = 'Users';
		$view->heading = 'Users';
		$view->users = $userModel->readAll ();
		$view->display ();
	}
	
	// Werte für View zum User erstellen
	public function create() {
		$view = new View ( 'user_create' );
		$view->title = 'Create User';
		$view->heading = 'Create User';
		$view->display ();
	}
	
	public function myAccount() {
		$userModel = new UserModel ();
		$view = new View ( 'user_account' );
		$view->title = 'My Account';
		$view->heading = 'My Account';
		$view->User = $userModel->readById($_SESSION['id']);
		$view->display ();
	}
	
	// Werte für View zum User Login
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
			$password = $_POST ['password'];
			
			if (isset($_POST['email']) && !empty($_POST['email'])) {
				$email = $_POST['email'];
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo 'The Email you entered is not a valid Email!';
				}
				else {
					echo 'Email not set';
				}
			}
			
			$userModel = new UserModel ();
			$userModel->create ( $firstName, $lastName, $email, $password );
		}
		
		// Anfrage an die URI / weiterleiten (HTTP 302)
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
				header ( 'Location: /user' );
			}
			else{
				// Anfrage an die URI / weiterleiten (HTTP 302)
				header ( 'Location: /' );
			}
		}
	}
	
	public function passwordUpdate() {
		if ($_POST ['send']) {
			$NewPassword = $_POST ['NewPassword'];
			$OldPassword = $_POST ['OldPassword'];	
			$userModel = new UserModel ();
			$User = $userModel->changePassword($OldPassword, $NewPassword, $_SESSION['id'] );
			header ( 'Location: /user/myAccount' );
		}
	}
	
	
	public function delete() {
		$userModel = new UserModel ();
		$userModel->deleteById ( $_GET ['id'] );
		
		// Anfrage an die URI / weiterleiten (HTTP 302)
		header ( 'Location: /user' );
	}
}
