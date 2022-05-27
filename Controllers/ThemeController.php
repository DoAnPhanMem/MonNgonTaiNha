<?php
require_once("Models/theme.php");
class ThemeController
{
    var $theme_model;
    public function __construct()
    {
        $this->theme_model = new theme();
    }
    function list()
    {

        $data_danhmuc = $this->theme_model->danhmuc();

        $data_loaisp = $this->theme_model->loaisp(0, 8);

        $data_chitietDM = array();

        for ($i = 1; $i <= count($data_danhmuc); $i++) {
            $data_chitietDM[$i] = $this->theme_model->chitietdanhmuc($i);
        }


        if (isset($_GET['sp']) and isset($_GET['loai'])) {
            $data_loai = $this->theme_model->chitiet_loai($_GET['loai'], $_GET['sp']);
            if ($data_loai != null) {
                $data = $this->theme_model->chitiet($data_loai[0]['MaLSP'], $_GET['sp']);
                $data_noibat = $this->theme_model->sanpham_noibat();
                $data_count = $this->theme_model->count_sp_ctdm($_GET['sp'], $data_loai[0]['MaLSP']);
                $data_tong = $data_count['tong'];
            }
        } else {
            if (isset($_GET['sp'])) {
                $data = $this->theme_model->sanpham_danhmuc(0, 9, $_GET['sp']);
                $data_noibat = $this->theme_model->sanpham_noibat();
                $data_count = $this->theme_model->count_sp_dm($_GET['sp']);
                $data_tong = $data_count['tong'];
            } else {
                if (isset($_POST['theme'])) {
                    $chuoi = $_POST['theme'];
                    $arr = explode("-", $chuoi);
                    $data = $this->theme_model->dongia($arr['0'], $arr['1']);
                    $data_tong = count($data);
                } else {
                    if (isset($_POST['keyword'])) {
                        $data = $this->theme_model->keywork($_POST['keyword']);
                        $data_noibat = $this->theme_model->sanpham_noibat();

                        $data_tong = count($data);
                    } else {
                        $id = isset($_GET['trang']) ? $_GET['trang'] : 1;
                        $limit = 9;
                        $start = ($id - 1) * $limit;
                        $data = $this->theme_model->limit($start, $limit);
                        $data_noibat = $this->theme_model->sanpham_noibat();
                        //$data_tong = 9;
                        // $data = $this->theme_model->limit(0, 9);
                        // $data_noibat = $this->theme_model->sanpham_noibat();
                         $data_count = $this->theme_model->count_sp();
                         $data_tong = $data_count['tong'];
                         $test = 0;
                    }
                }
            }
        }

        require_once('Views/index.php');
    }
}
