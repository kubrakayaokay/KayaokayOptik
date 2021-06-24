<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        if(!get_active_user()){
            redirect(base_url("login"));
        }
        $this->viewFolder = "settings";
        $this->load->model("settings_model");
        $this->load->library("form_validation");
    }

    public function index()
    {
        $settings = $this->settings_model->get(["id" => 1]);
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->row = $settings;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update()
    {
        $rules_config = [
            [
                'field' => 'title',
                'label' => 'Başlık',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'description',
                'label' => 'Açıklama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'keywords',
                'label' => 'Anahtar Kelimeler',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'contact[email]',
                'label' => 'İletişim Eposta',
                'rules' => 'valid_email|trim'
            ],
            [
                'field' => 'smtp_mail[email]',
                'label' => 'SMTP Eposta',
                'rules' => 'valid_email|trim'
            ]
        ];

        $message_config = [
            "required" => "<b>{field}</b> alanı boş bırakılamaz.",
            "valid_email" => "<b>{field}</b> alanı geçerli değil."
        ];

        $this->form_validation->set_rules($rules_config);
        $this->form_validation->set_message($message_config);

        if ($this->form_validation->run() == false) {
            $settings = $this->settings_model->get(["id" => 1]);
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "list";
            $viewData->row = $settings;
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {

            //Mevcut Logo & Favicon
            $setting =     $settings = $this->settings_model->get(["id" => 1]);
            $logo = $setting->logo;
            $footer_logo = $setting->footer_logo;
            $favicon = $setting->favicon;

            //Bilgileri JSON Formatına Dönüştür
            $contact = json_encode($this->input->post("contact"));

            $social_media = json_encode($this->input->post("social_media"));
            $smtp_mail = json_encode($this->input->post("smtp_mail"));

            $data = [
                "title" => $this->input->post("title"),
                "description" => $this->input->post("description"),
                "keywords" => $this->input->post("keywords"),
                "contact" => $contact,
                "about_us" => $this->input->post("about_us"),
                "mission" => $this->input->post("mission"),
                "vision" => $this->input->post("vision"),
                "site_url" => $this->input->post("site_url"),
                "social_media" => $social_media,
                "smtp_mail" => $smtp_mail,
            ];

            //Logo Boş Değilse
            if ($_FILES["logo"]["name"] !== "") {

                // Upload Süreci...
                $file_name = seo(pathinfo($_FILES["logo"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
                $config["allowed_types"] = "jpg|jpeg|png|gif";
                $config["upload_path"]   = "../uploads/logo";
                $config['max_size']      = 1024*2;
                $config["file_name"]     = $file_name;
                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("logo");

                if ($upload) {
                    unlink("../uploads/logo/$logo");
                    $data["logo"] = $file_name;
                } else {
                    $alert = [
                        "type" => "error",
                        "message" => "Logo yüklenirken bir hata oluştu."
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("settings"));
                    die();
                }
            }


            $update = $this->settings_model->update(["id" => 1], $data);

            if ($update){
                $alert = [
                    "type" => "success",
                    "message" => "Ayarlar başarıyla güncellendi."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("settings"));
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "Ayarlar güncellenirken bir hata oluştu."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("settings"));
            }

        }
    }

}
