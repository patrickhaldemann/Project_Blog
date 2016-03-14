<?php
require_once "model/ImpressumModel.php";
class ImpressumController {
	//Werte für About Seite
	public function about() {
		$impressumModel = new ImpressumModel();
		$view = new View ( 'impressum' );
		$view->title = 'About';
		$view->heading = '';
		$view->display ();
	}
	
}