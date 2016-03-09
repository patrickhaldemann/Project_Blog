<?php 
require_once 'model/BlogModel.php';
class DefaultController{
	public function index()
	{
		$blogModel = new BlogModel();
		$view = new View('default_index');
		$view->title = 'Homepage';
		$view->heading = 'Latest Blogs';
		$view->blogs = $blogModel->readLastBlogs();
		$view->display();
	}
}
?>