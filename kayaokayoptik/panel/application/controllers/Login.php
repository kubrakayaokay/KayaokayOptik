<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "login";
        $this->load->model("users_model");
        $this->load->library("form_validation");
        $this->load->helper('captcha');
        $this->load->helper('cookie');
    }

    public function index()
    {
        if (get_active_user()) {
            redirect(base_url("dashboard"));
        }
        $vals = [
            'img_path' => '../uploads/captcha/',
            'img_url' => base_url("../uploads/captcha/"),
            'img_width' => '335',
            'img_height' => 50,
            'expiration' => 250,
            'word_length' => 6,
            'img_id' => 'captchaID',
            'pool' => '0123456789',
            'colors' => [
                'background' => [77, 106, 255],
                'border' => [0, 0, 0],
                'text' => [255, 255, 255],
                'grid' => [255, 5, 1]
            ]
        ];
        $captcha = create_captcha($vals);
        $this->session->set_userdata("captcha", $captcha["word"]);
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->captcha = $captcha;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function go()
    {
        if (get_active_user()) {
            redirect(base_url("dashboard"));
        }

        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[6]|max_length[12]");
        $this->form_validation->set_rules("security_code", "Güvenlik Kodu", "required|trim|min_length[6]|max_length[12]");

        $this->form_validation->set_message(
            [
                "required" => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir <b>email</b> adresi giriniz",
                "min_length" => "<b>{field}</b> en az <b>{param}</b> karakterden oluşmalıdır",
                "max_length" => "<b>{field}</b> en fazla <b>{param}</b> karakterden oluşmalıdır",
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $vals = [
                'img_path' => '../uploads/captcha/',
                'img_url' => base_url("../uploads/captcha/"),
                'img_width' => '335',
                'img_height' => 50,
                'expiration' => 250,
                'word_length' => 6,
                'img_id' => 'captchaID',
                'pool' => '0123456789',

                'colors' => [
                    'background' => [77, 106, 255],
                    'border' => [0, 0, 0],
                    'text' => [255, 255, 255],
                    'grid' => [255, 5, 1]
                ]
            ];
            $captcha = create_captcha($vals);
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "list";
            $viewData->form_error = true;
            $viewData->captcha = $captcha;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {
            $user = $this->users_model->get(
                [
                    "email" => $this->input->post("email"),
                    "password" => md5($this->input->post("password")),
                    "isActive" => 1
                ]
            );
            if ($user) {
                $security_code = $this->input->post("security_code");
                $captcha = $this->session->userdata("captcha");

                if ($captcha == $security_code) {

                    $alert = [
                        "type" => "success",
                        "message" => "$user->full_name, hoşgeldiniz. Hazırsanız panelinizi kullanmaya başlayabilirsiniz. :)"
                    ];
                    $this->session->set_userdata("user", $user);
                    $this->session->set_flashdata("alert", $alert);

                    if ($this->input->post("remember_me") == "on") {

                        $remember_me = array(
                            "email" => $this->input->post("email"),
                            "password" => $this->input->post("password")
                        );
                        set_cookie("remember_me", json_encode($remember_me), time() + 60 * 60 * 24 * 30);

                    } else {
                        delete_cookie("remember_me");
                    }

                    redirect(base_url("dashboard"));
                } else {
                    $alert = [
                        "type" => "error",
                        "message" => "Doğrulama kodu hatalı."
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("login"));
                }
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "Giriş işlemi başarısız. Kullanıcı adı veya şifre yanlış."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("login"));
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("user");
        $alert = [
            "type" => "success",
            "message" => "Başarıyla çıkış yaptınız."
        ];
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("login"));

    }


}
