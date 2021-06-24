<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if(!get_active_user()){
            redirect(base_url("login"));
        }
        $this->viewFolder = "dashboard";

        $this->load->model('product_categories_model');
        $this->load->model('products_model');
        $this->load->model('brands_model');

    }

    public function index()
    {

        $products_cat_count = $this->product_categories_model->get_count();
        $product_count = $this->products_model->get_count();
        $brands_count = $this->brands_model->get_count();

        $count = [
          "product" => $product_count,
          "brand" => $brands_count,
          "product_cat" => $products_cat_count
        ];

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->count = $count;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }


}
