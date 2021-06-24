<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends MY_Controller
{

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
        $this->viewFolder = "brands";
        $this->load->model("brands_model");
        $this->load->library("form_validation");
    }

    public function index()
    {
        //Pagination
        $per_page = 10;
        $uri_segments = 3;
        pagination_create($per_page, $uri_segments, "brand/index", $this->brands_model->get_count());
        $page = ($this->uri->segment($uri_segments)) ? $this->uri->segment($uri_segments) : 0;
        $brand = $this->brands_model->get_all_limit([], "id DESC", $per_page, $page);

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->rows = $brand;
        $viewData->pagination_links = $this->pagination->create_links();
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $brand = $this->brands_model->get(["id" => $id]);
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->row = $brand;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    //Brand İşlemleri
    public function addBrand()
    {
        $rules_config = [
            [
                'field' => 'name',
                'label' => 'Marka Adı',
                'rules' => 'required|trim'
            ]
        ];

        $message_config = [
            "required" => "<b>{field}</b> alanı boş bırakılamaz."
        ];

        $this->form_validation->set_rules($rules_config);
        $this->form_validation->set_message($message_config);

        if ($this->form_validation->run() == false) {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {

            $data = [
                "name" => $this->input->post("name"),
                "createdAt" => date("Y-m-d H:i:s"),
                "url" => seo($this->input->post("name")),
                "isActive" => 1
            ];

            //İçerik Görseli Boş Değilse
            if ($_FILES["image"]["name"] !== "") {
                $this->load->helper('string');
                $number = random_string('numeric', 4);

                //Standart İçerik Görseli Ölçüleri
                $brand_image_size = script_settings("brand_image_size");
                $brand_image_sizes = explode("*", $brand_image_size);

                //İçerik Görseli Yükleme
                $file_name = seo(pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME)) . "-" . $number . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $image = upload_picture($_FILES["image"]["tmp_name"], "../uploads/brand/", $brand_image_sizes[0], $brand_image_sizes[1], $file_name);
                $image760x600 = upload_picture($_FILES["image"]["tmp_name"], "../uploads/brand/", 760, 600, $file_name);

                if ($image && $image760x600) {
                    $data["image"] = $file_name;
                } else {
                    $alert = [
                        "type" => "error",
                        "message" => "İçerik görseli yüklenirken bir hata oluştu."
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("brand"));
                    die();
                }
            }

            $insert = $this->brands_model->add($data);
            if ($insert) {
                $alert = [
                    "type" => "success",
                    "message" => "İçerik başarıyla eklendi."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("brand"));
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "İçerik eklenirken bir hata oluştu."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("brand"));
            }
        }
    }



    public function updateBrand($id)
    {
        $rules_config = [
            [
                'field' => 'name',
                'label' => 'Marka Adı',
                'rules' => 'required|trim'
            ]
        ];

        $message_config = [
            "required" => "<b>{field}</b> alanı boş bırakılamaz."
        ];

        $this->form_validation->set_rules($rules_config);
        $this->form_validation->set_message($message_config);

        if ($this->form_validation->run() == false) {
            $brand = $this->brands_model->get(["id" => $id]);
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->row = $brand;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {

            $data = [
                "name" => $this->input->post("name"),
                "updatedAt" =>date("Y-m-d H:i:s"),
                "url" => seo($this->input->post("name"))
            ];

            //İçerik Görseli Boş Değilse
            if ($_FILES["image"]["name"] !== "") {
                $this->load->helper('string');
                $number = random_string('numeric', 4);

                //Standart İçerik Görseli Ölçüleri
                $brand_image_size = script_settings("brand_image_size");
                $brand_image_sizes = explode("*", $brand_image_size);

                //Eski İçerik Görseli Silme
                $row = $this->brands_model->get(["id" => $id]);
                $brand_image_size_replace = str_replace("*", "x", $brand_image_size);

                //İçerik Görseli Yükleme
                $file_name = seo(pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME)) . "-" . $number . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $image = upload_picture($_FILES["image"]["tmp_name"], "../uploads/brand/", $brand_image_sizes[0], $brand_image_sizes[1], $file_name);
                if ($image) {
                    unlink("../uploads/brand/$brand_image_size_replace/$row->image");
                    $data["image"] = $file_name;
                } else {
                    $alert = [
                        "type" => "error",
                        "message" => "İçerik görseli yüklenirken bir hata oluştu."
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("brand"));
                    die();
                }
            }

            $update = $this->brands_model->update(["id" => $id], $data);
            if ($update) {
                $alert = [
                    "type" => "success",
                    "message" => "İçerik başarıyla güncellendi."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("brand"));
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "İçerik güncellenirken bir hata oluştu."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("brand"));
            }
        }
    }

    public function brandIsActive($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->brands_model->update(
                [
                    "id" => $id
                ],
                [
                    "isActive" => $isActive
                ]
            );
        }
    }

    public function deleteBrand($id)
    {
        //Görsel Silme
        $row = $this->brands_model->get(["id" => $id]);
        $brand_image_size = script_settings("brand_image_size");
        $brand_image_size_replace = str_replace("*", "x", $brand_image_size);

        $delete = $this->brands_model->delete(["id" => $id]);
        if ($delete) {
            unlink("../uploads/brand/$brand_image_size_replace/$row->image");
            $alert = [
                "type" => "success",
                "message" => "İçerik başarıyla silindi."
            ];
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("brand"));
        } else {
            $alert = [
                "type" => "error",
                "message" => "İçerik silinirken bir hata oluştu."
            ];
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("brand"));
        }
    }


}
