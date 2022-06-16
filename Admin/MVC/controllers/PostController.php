<?php
require_once("MVC/Models/post.php");
class PostController 
{
	var $post_model;
    public function __construct()
    {
        $this->post_model = new post();
    }

	public function list()
	{
		$data = array();
		$data = $this->post_model->All(); 
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/list.php');
	}

    public function add()
	{
		$data = $this->post_model->BaiDang();
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/add.php');
	}

	public function store()
	{
		$target_dir = "../public/img/company/";  // thư mục chứa file upload

        $HinhAnh = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh"]["name"]); // link sẽ upload file lên

        $status_upload = move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file);

        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh =  basename($_FILES["HinhAnh"]["name"]);
		}

		$data = array(
			'MaBaiDang' => $_POST['MaBaiDang'],
			'hoTen' => $_POST['hoTen'],
			'TieuDe' => $_POST['TieuDe'],
			'TrangThai' => $_POST['TrangThai']
		);
		foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
		}	
		$this->post_model->store($data);
	}

	public function detail()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data = $this->post_model->find($id);
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/detail.php');
	}

	

}