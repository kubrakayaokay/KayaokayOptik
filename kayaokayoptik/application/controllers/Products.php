<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MY_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->viewFolder = "products";
        $this->load->model("products_model");
        $this->load->model("brands_model");
        $this->load->model("product_categories_model");
        $this->load->model("product_image_gallery_model");
    }

    public function index($url)
    {

        $category = $this->product_categories_model->get(["url" => $url]);

        if (!$category) {
            redirect(base_url());
        }


        if ($category->parent_category_id === 0) {
            $sub_categories = $this->product_categories_model->get_all(["parent_category_id" => $category->id]);
            $sub_ar = array();
            foreach ($sub_categories as $sub) {
                array_push($sub_ar, $sub->id);
            }
        } else {
            $products = $this->products_model->get_all(["isActive" => 1, "category_id" => $category->id], "id ASC");
            if (!$products) {
                redirect(base_url());
            }
            $product_ids = get_product_id($products);
            $images = $this->product_image_gallery_model->get_image_gallery_categories($product_ids);
        }

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "detail";

        $viewData->products = $products;
        $viewData->cat = $category;
        $viewData->images = $images;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function show($url)
    {

        $product = $this->products_model->get(["url" => $url], "id ASC");
        $images = $this->product_image_gallery_model->get_all(["isActive" => 1, "product_id" => $product->id]);
        $similar_products = $this->products_model->get_all(["category_id" => $product->category_id, "id<>" => $product->id], "id ASC");
        $similar_products_id = get_product_id($similar_products);
        $similar_images = $this->product_image_gallery_model->get_image_gallery_categories($similar_products_id);

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "show";
        $viewData->product = $product;
        $viewData->images = $images;
        $viewData->similar_products = $similar_products;
        $viewData->similar_images = $similar_images;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function brand($url)
    {

        $brand_id = $this->brands_model->get(["url" => $url]);

        if (!$brand_id) {
            redirect(base_url());
        }

        $products = $this->products_model->get_all(["brand_id" => $brand_id->id]);

        if (!$products) {
            redirect(base_url());
        }

        $product_ids = get_product_id($products);

        $images = $this->product_image_gallery_model->get_image_gallery_categories($product_ids);
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "detail";
        $viewData->products = $products;
        $viewData->cat = null;
        $viewData->images = $images;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function category($url)
    {

        $category = $this->product_categories_model->get(["url" => $url]);
        if (!$category) {
            redirect(base_url());
        }
        $data = $this->product_categories_model->getCategoriesByParentId($category->id);


        $cat_id_ar = array();
        for ($i = 0; $i < count($data); $i++) {
            array_push($cat_id_ar, $data[$i]['id']);
        }

        $products = $this->products_model->get_products($cat_id_ar);

        if (!$products) {
            redirect(base_url());
        }

        $product_id_ar = get_product_id($products);
        $images = $this->product_image_gallery_model->get_image_gallery_categories($product_id_ar);

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "detail";
        $viewData->products = $products;
        $viewData->cat = null;
        $viewData->images = $images;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }


    public function get_all()
    {


        $products = $this->products_model->get_all(["isActive" => 1]);
        $images = $this->product_image_gallery_model->get_all();

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "detail";
        $viewData->products = $products;
        $viewData->cat = null;
        $viewData->images = $images;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function filter(){
        $data['brand_data'] = $this->products_model->fetch_filter_type('brand_id');
        $data['frame_color_data'] = $this->products_model->fetch_filter_type('frame_color');
        $data['glass_material_data'] = $this->products_model->fetch_filter_type('glass_material');
        $data['frame_material_data'] = $this->products_model->fetch_filter_type('frame_material');

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "filter";
        $viewData->data = $data;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

//    public function tutorial()
//    {
//
//        $data['brand_data'] = $this->products_model->fetch_filter_type('brand_id');
//        $data['frame_color_data'] = $this->products_model->fetch_filter_type('frame_color');
//        $data['glass_material_data'] = $this->products_model->fetch_filter_type('glass_material');
//        $data['frame_material_data'] = $this->products_model->fetch_filter_type('frame_material');
//        // die(print_r($data['glass_material_data']->result_array()));
//
//        $viewData = new stdClass();
//        $viewData->viewFolder = $this->viewFolder;
//        $viewData->subViewFolder = "tutorial";
//        $viewData->data = $data;
//        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
//
//    }

    function fetch_data()
    {
        sleep(1);

        $brand = $this->input->post('brand');
        $frame_material = $this->input->post('frame');
        $glass_material = $this->input->post('glass');
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->products_model->count_all($brand, $frame_material ,$glass_material);
        $config['per_page'] = 8;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 3;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config['per_page'];
        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'product_list'   => $this->products_model->fetch_data($config["per_page"], $start, $brand, $frame_material, $glass_material)
        );

        echo json_encode($output);
    }



}
