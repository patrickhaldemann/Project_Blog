<?php 
require_once 'lib/Model.php';
class DefaultController{
	public function index()
	{
		$model = new Model();
		$view = new View('default_index');
		$view->title = 'Homepage';
		$view->heading = '';
		$view->blogs = $model->readAll ();
		$view->display();
	}
}
?>