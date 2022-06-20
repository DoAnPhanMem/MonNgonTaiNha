<?php
require_once("MVC/Models/theme.php");
class ThemeController
{
	var $theme_model;
	function __construct()
	{
		$this->theme_model = new theme();
	}

	public function list()
	{
		$data = array();
		$data = $this->theme_model->All(); 
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/list.php');
	}

	public function add()
	{
		$data = $this->theme_model->theme();
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/add.php');
	}
	public function store()
	{
		$target_dir = "../public/img/themes/";  // thư mục chứa file upload

        $HinhAnh = "";
        $target_file = $target_dir . basename($_FILES["HinhAnhChuDe"]["name"]); // link sẽ upload file lên

        $status_upload = move_uploaded_file($_FILES["HinhAnhChuDe"]["tmp_name"], $target_file);

        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh =  basename($_FILES["HinhAnhChuDe"]["name"]);
		}

		$data = array(
			'MaChuDe' => $_POST['MaChuDe'],
			'TenChuDe' => $_POST['TenChuDe'],
			'HinhAnhChuDe' => $HinhAnh,
		);
		foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
		}	
		$this->theme_model->store($data);
	}
	public function detail()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data = $this->theme_model->find($id);
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/detail.php');
	}
	public function delete()
	{
		if (isset($_GET['id'])) {
			$this->theme_model->delete($_GET['id']);
		}
	}
	public function edit()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data_detail = $this->theme_model->find($id);

		$data = $this->theme_model->theme();

		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/edit.php');
	}
	public function update()
	{
		$target_dir = "../public/img/themes/";  // thư mục chứa file upload

        $HinhAnh = "";
        $target_file = $target_dir . basename($_FILES["HinhAnhChuDe"]["name"]); // link sẽ upload file lên

        $status_upload = move_uploaded_file($_FILES["HinhAnhChuDe"]["tmp_name"], $target_file);

        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh =  basename($_FILES["HinhAnhChuDe"]["name"]);
		}

		$data = array(
			'MaChuDe' => $_POST['MaChuDe'],
			'TenChuDe' => $_POST['TenChuDe'],
			'HinhAnhChuDe' => $HinhAnh			
		);

		foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
		}
		if ($HinhAnh == "") {
            unset($data['HinhAnhChuDe']);
        }
		$this->theme_model->update($data);
	}

	public function create_action()
    {
        $imgFileName = '';
        if(isset($_FILES['post-img']) && $_FILES['post-img']['size'] > 0){
            $imgFile = $_FILES['post-img'] ;
            $imgFile['name'] = $imgFile['name'];
            $imgFileName = $imgFile['name'] ;
            $tmpimgPath = $imgFile['tmp_name'];
            $newimgPath = "./public/img/themes/" . $imgFile['name'];
            $status = move_uploaded_file($tmpimgPath, $newimgPath);
        }
        $data_theme = array(
            'MaChuDe'  => 'null',
            'TenChuDe' => $_POST['post-name'],
            'HinhAnhChuDe' =>  $imgFileName
        );
        $this->theme_model->create($data_theme);
        header('Location: ?act=personal&handle=create');
    }

}
