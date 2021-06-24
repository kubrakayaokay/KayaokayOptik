<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "home";
        $this->load->library('cart');
        $this->load->model("slider_model");
        $this->load->model("product_image_gallery_model");
        $this->load->model("products_model");
        $this->load->model("product_categories_model");
        $this->load->model("brands_model");
        $this->load->library("form_validation");

    }

    public function index()
    {



        $this->load->library('cart');
        $gallery = $this->product_image_gallery_model->get_all_limit(["isActive" => 1, "product_id" => 5], "rank DESC", 6, 0);
        $sliders = $this->slider_model->get_all(["isActive" => 1], "rank ASC");
        $cats = $this->product_categories_model->get_all(["parent_category_id"=>0], "id ASC");
        $products = $this->products_model->get_all(["isActive" => 1], "id ASC");
        $brands = $this->brands_model->get_all(["isActive" => 1], "id ASC");

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";

        $viewData->sliders = $sliders;
        $viewData->gallery = $gallery;
        $viewData->cats = $cats;
        $viewData->products = $products;
        $viewData->brands = $brands;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }




    public function about_us()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "about_us";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function subscribeForm()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_message(
            [
                "valid_email" => "Lütfen geçerli bir <b>email</b> adresi giriniz."
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $blog_categories = $this->blog_categories_model->get_all([], "rank ASC");
            $services = $this->services_model->get_all_limit(["isActive" => 1], "rank ASC", 3, 0);
            $blogs = $this->blogs_model->get_all_limit(["isActive" => 1], "id DESC", 4, 0);
            $references = $this->references_model->get_all_limit(["isActive" => 1], "rank ASC", 3, 0);
            $customers = $this->customer_model->get_all(["isActive" => 1], "rank ASC");
            $sliders = $this->slider_model->get_all(["isActive" => 1], "rank ASC");

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "list";

            $viewData->sliders = $sliders;
            $viewData->customers = $customers;
            $viewData->references = $references;
            $viewData->blogs = $blogs;
            $viewData->blog_categories = $blog_categories;
            $viewData->services = $services;
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            $insert = $this->subscribe_model->add(["email" => $this->input->post("email")]);
            if ($insert) {
                $this->session->set_flashdata('sendTrue', 'true');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('sendFalse', 'false');
                redirect(base_url());
            }
        }
    }
    public function error_404()
    {

        $this->load->view("errors/404");
    }



}
