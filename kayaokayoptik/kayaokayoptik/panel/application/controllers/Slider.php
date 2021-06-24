<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MY_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        if(!get_active_user()){
            redirect(base_url("login"));
        }
        $this->viewFolder = "slider";
        $this->load->model("slider_model");
        $this->load->library("form_validation");
    }

    public function index()
    {
        $slider = $this->slider_model->get_all([], "rank ASC");
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->rows = $slider;
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
        $services = $this->slider_model->get(["id" => $id]);
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->row = $services;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function addSlider()
    {
        $rules_config = [
            [
                'field' => 'name',
                'label' => 'Slider Adı',
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
            //Açıklama alanlarını json formatına dönüştür
            $jsonContent = json_encode($this->input->post("content"));

            $data = [
                "name" => $this->input->post("name"),
                "content" => $jsonContent,
                "isActive" => 1,
                "rank" => 0
            ];

            //Hizmet Görseli Boş Değilse
            if ($_FILES["image"]["name"] !== "") {
                $this->load->helper('string');
                $number = random_string('numeric',4);
                //Standart Hizmet Görseli Ölçüleri
                $slider_image_size = script_settings("slider_image_size");
                $slider_image_sizes = explode("*", $slider_image_size);

                //İçerik Görseli Yükleme
                $file_name = seo(pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME)) . "-" .$number."." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $image = upload_picture($_FILES["image"]["tmp_name"], "../uploads/slider/", $slider_image_sizes[0], $slider_image_sizes[1], $file_name);

                if ($image) {
                    $data["image"] = $file_name;
                } else {
                    $alert = [
                        "type" => "error",
                        "message" => "Slider görseli yüklenirken bir hata oluştu."
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("slider"));
                    die();
                }
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "Lütfen slider görseli seçiniz."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("slider/add"));
            }

            $insert = $this->slider_model->add($data);
            if ($insert) {
                $alert = [
                    "type" => "success",
                    "message" => "Slider başarıyla eklendi."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("slider"));
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "Slider eklenirken bir hata oluştu."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("slider"));
            }
        }
    }
    public function updateSlider($id)
    {
        $rules_config = [
            [
                'field' => 'name',
                'label' => 'Slider Adı',
                'rules' => 'required|trim'
            ]
        ];

        $message_config = [
            "required" => "<b>{field}</b> alanı boş bırakılamaz."
        ];

        $this->form_validation->set_rules($rules_config);
        $this->form_validation->set_message($message_config);

        if ($this->form_validation->run() == false) {
            $services = $this->slider_model->get(["id" => $id]);
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->row = $services;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            $jsonContent = json_encode($this->input->post("content"));
            $data = [
                "name" => $this->input->post("name"),
                "content" => $jsonContent
            ];

            //Slider Görseli Boş Değilse
            if ($_FILES["image"]["name"] !== ""){

                $this->load->helper('string');
                $number = random_string('numeric',4);

                //Standart Slider Görseli Ölçüleri

                $slider_image_size = script_settings("slider_image_size");
                $slider_image_sizes = explode("*", $slider_image_size);

                //Eski Slider Görseli Silme
                $row = $this->slider_model->get(["id" => $id]);
                $slider_image_size_replace = str_replace("*", "x", $slider_image_size);

                //Slider Görseli Yükleme
                $file_name = seo(pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME)) . "-" .$number."." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $image = upload_picture($_FILES["image"]["tmp_name"], "../uploads/slider/", $slider_image_sizes[0],$slider_image_sizes[1], $file_name);

                if ($image) {
                    unlink("../uploads/{$this->viewFolder}/$slider_image_size_replace/$row->image");
                    $data["image"] = $file_name;
                } else {
                    $alert = [
                        "type" => "error",
                        "message" => "Slider görseli yüklenirken bir hata oluştu."
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("slider"));
                    die();
                }
            }

            $update = $this->slider_model->update(["id" => $id],$data);
            if ($update) {
                $alert = [
                    "type" => "success",
                    "message" => "Slider başarıyla güncellendi."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("slider"));
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "Slider güncellenirken bir hata oluştu."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("slider"));
            }
        }
    }
    public function deleteSlider($id)
    {
        //Görsel Silme
        $row = $this->slider_model->get(["id" => $id]);
        $slider_image_size = script_settings("slider_image_size");
        $slider_image_size_replace = str_replace("*", "x", $slider_image_size);

        $delete = $this->slider_model->delete(["id" => $id]);
        if ($delete) {
            unlink("../uploads/slider/$slider_image_size_replace/$row->image");
            $alert = [
                "type" => "success",
                "message" => "Slider başarıyla silindi."
            ];
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("slider"));
        } else {
            $alert = [
                "type" => "error",
                "message" => "Slider silinirken bir hata oluştu."
            ];
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("slider"));
        }
    }

    public function sliderIsActive($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->slider_model->update(
                [
                    "id" => $id
                ],
                [
                    "isActive" => $isActive
                ]
            );
        }
    }

    public function sliderRankSetter()
    {
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->slider_model->update(
                [
                    "id" => $id,
                    "rank !=" => $rank
                ],
                [
                    "rank" => $rank
                ]
            );

        }
    }
}
