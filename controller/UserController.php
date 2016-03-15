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
	public function create($validData = true) {
		$view = new View ( 'user_create' );
		$view->title = 'Create User';
		$view->heading = 'Create User';
		$view->validData = $validData;
		$view->display ();
	}
	
	// Werte für MyAccount View
	public function myAccount($samePwd = false) {
		$userModel = new UserModel ();
		$view = new View ( 'user_account' );
		$view->title = 'My Account';
		$view->heading = 'My Account';
		$view->User = $userModel->readById ( $_SESSION ['id'] );
		
		$view->samePwd = $samePwd;
		
		$view->display ();
	}
	
	// Werte für View zum User Login
	public function login($validData = true) {
		$view = new View ( 'user_login' );
		$view->title = 'Login';
		$view->heading = 'Login';
		$view->validData = $validData;
		$view->display ();
	}
	public function signout() {
		session_destroy ();
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /' );
	}
	
	// Funktion zum erstellen des Users
	public function doCreate() {
		if ($_POST ['send']) {
			$firstName = $_POST ['firstName'];
			$lastName = $_POST ['lastName'];
			$password = $_POST ['password'];
			
			if (isset ( $_POST ['email'] ) && ! empty ( $_POST ['email'] )) {
				$email = $_POST ['email'];
				if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
					echo'The Email you entered is not a valid Email!';
				}
				
				else {
					echo'Email not set!';
				}
			}
			$userModel = new UserModel ();
			$row = $userModel->create ( $firstName, $lastName, $email, $password );
			if ($row) {
				// Anfrage an die URI / weiterleiten (HTTP 302)
				header ( 'Location: /' );
			} else {
				$this->create ( false );
			}
		}
	}
	
	// Benutzer Login
	public function doLogin() {
		if ($_POST ['send']) {
			$email = $_POST ['email'];
			$password = $_POST ['password'];
			
			$userModel = new UserModel ();
			$User = $userModel->login ( $email, $password );
			
			if ($User) {
				if (isset ( $User->id )) {
					$_SESSION ['id'] = $User->id;
				}
				if (isset ( $User->IsAdmin )) {
					$_SESSION ['IsAdmin'] = $User->IsAdmin;
					header ( 'Location: /' );
				} else {
					// Anfrage an die URI / weiterleiten (HTTP 302)
					header ( 'Location: /' );
				}
			} else {
				$this->login ( false );
			}
		}
	}
	
	// Funktion zum Updaten des Passwords
	public function passwordUpdate() {
		if ($_POST ['send']) {
			$NewPassword = $_POST ['NewPassword'];
			$OldPassword = $_POST ['OldPassword'];
			$userModel = new UserModel ();
			$Updated = $userModel->changePassword ( $OldPassword, $NewPassword, $_SESSION ['id'] );
			
			if ($Updated) {
				header ( 'Location: /user/myAccount' );
			} else {
				$this->myAccount ( true );
			}
		}
	}
	
	// Funktion zum Löschen eines Users
	public function delete() {
		$userModel = new UserModel ();
		$userModel->deleteById ( $_GET ['id'] );
		
		// Anfrage an die URI / weiterleiten (HTTP 302)
		header ( 'Location: /user' );
	}
}
