<?php
require_once 'model/BlogModel.php';
require_once 'lib/Model.php';
class BlogController{

	public function allBlogs()
	{
		$model = new BlogModel();
		$view = new View('blog_index');
		$view->title = 'All Blogs';
		$view->heading = 'All Blogs';
		$view->blogs = $model->readAll();
		$view->display();
	}
	//Werte für Blog Create View
	public function create() {
		$view = new View ( 'blog_create' );
		$view->title = 'Create Blog';
		$view->heading = 'Create Blog';
		$view->display ();
	}
	
	//Funktion zum erstellen des Blog Beitrags
	public function doCreate(){
		if ($_POST ['send']) {
			$BlogTitle = $_POST ['BlogTitle'];
			$BlogContent = $_POST ['BlogContent'];
				
			$blogModel = new BlogModel();
			$blogModel->create ($BlogTitle, $BlogContent);
		}
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /' );
	}
	
	public function delete() {
		$blogModel = new BlogModel();
		$blogModel->deleteById ( $_GET ['id'] );
	
		// Anfrage an die URI / weiterleiten (HTTP 302)
		header ( 'Location: /' );
	}
}