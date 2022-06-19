<?php 
    require_once("MVC/Models/statistical.php");
    class StatisticalController {
        var $statistical_model;
        public function __construct()
        {
            $this->statistical_model = new statistical();
        }
        public function statistical()
        {
            $m = date("m");
            $data_countM = $this->statistical_model->tk_dsothang($m);
            $y = "20".date("y");
            $data_countY = $this->statistical_model->tk_dsonam($y);
            $data_nguoidung = $this->statistical_model->tk_nguoidung(1);
            $data_nhanvien = $this->statistical_model->tk_nguoidung(2);

            $dataTopTheme =  $this->statistical_model->tk_top_chude(3);

            $data_hd = $this->statistical_model->tk_thongbao();

            $data_topbaidang = $this->statistical_model->tk_top_baidang(5);
            $sumView_topbaidang = $this->statistical_model->sumView_topbaidang(5);
            $sumViewBaiDang = $this->statistical_model->sumViewAll();

            $viewConLai = $sumViewBaiDang['sumALl'] - $sumView_topbaidang['sum'] ;
            require_once("MVC/Views/statistical/statistical.php");
        }

    }
?>