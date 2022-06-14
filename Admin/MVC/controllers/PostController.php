<?php
require_once("MVC/Models/post.php");
class PostController 
{
    public function add()
	{
		$data = $this->theme_model->BaiDang();
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/add.php');
	}

	public function detail()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data = $this->theme_model->find($id);
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/detail.php');
	}

}