<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->load->library("form_validation");
        $this->load->helper("send_email");
        $this->load->model("services_model");
        $this->load->model("cv_model");

        $this->viewFolder = "home";
    }

    public function sendContact()
    {
        $this->form_validation->set_rules('name', 'Ad Soyad', 'trim|required');
        $this->form_validation->set_rules('phone', 'Telefon', 'trim|required|min_length[10]|numeric|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('message', 'Mesaj', 'trim|required');
        $this->form_validation->set_message(
            [
                "required" => "<b>{field}</b> alanının doldurulması zorunludur.",
                "valid_email" => "Lütfen geçerli bir <b>email</b> adresi giriniz.",
                "numeric" => "<b>{field}</b> alanında yalnızca rakam kullanılabilir.",
                "min_length" => "<b>{field}</b> alanında min. <b>{param}</b> karakter kullanılmalıdır.",
                "max_length" => "<b>{field}</b> alanında max. <b>{param}</b> karakter kullanılmalıdır."
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "contact";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {

            $contactData = [
                "name" => $this->input->post("name"),
                "email" => $this->input->post("email"),
                "message" => $this->input->post("message"),
                "phone" => $this->input->post("phone"),
                "createdAt" => date("d.m.Y", time())
            ];

            $contact = json_decode(get_settings("contact"), true);

            $viewData = new stdClass();
            $viewData->data = $contactData;
            $message = $this->load->view("email_templates/sendContact", $viewData, TRUE);
            //send_mail helper - Kime, konu, mesaj
            $send = send_mail($contact["email"], "İletişim Formu", $message);
            if ($send) {
                $this->session->set_flashdata('sendTrue', 'true');
                redirect(base_url("iletisim"));
            } else {
                $this->session->set_flashdata('sendFalse', 'false');
                redirect(base_url("iletisim"));
            }
        }
    }

    public function sendHomeForm()
    {
        $this->form_validation->set_rules('name', 'Ad Soyad', 'trim|required');
        $this->form_validation->set_rules('phone', 'Telefon', 'trim|required|min_length[10]|numeric|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('message', 'Mesaj', 'trim|required');
        $this->form_validation->set_message(
            [
                "required" => "<b>{field}</b> alanının doldurulması zorunludur.",
                "valid_email" => "Lütfen geçerli bir <b>email</b> adresi giriniz.",
                "numeric" => "<b>{field}</b> alanında yalnızca rakam kullanılabilir.",
                "min_length" => "<b>{field}</b> alanında min. <b>{param}</b> karakter kullanılmalıdır.",
                "max_length" => "<b>{field}</b> alanında max. <b>{param}</b> karakter kullanılmalıdır."
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "list";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {

            $contactData = [
                "name" => $this->input->post("name"),
                "email" => $this->input->post("email"),
                "message" => $this->input->post("message"),
                "phone" => $this->input->post("phone"),
                "createdAt" => date("d.m.Y", time())
            ];

            $contact = json_decode(get_settings("contact"), true);

            $viewData = new stdClass();
            $viewData->data = $contactData;
            $message = $this->load->view("email_templates/sendContact", $viewData, TRUE);
            //send_mail helper - Kime, konu, mesaj
            $send = send_mail($contact["email"], "Hızlı İletişim Formu", $message);
            if ($send) {
                $this->session->set_flashdata('sendTrue', 'true');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('sendFalse', 'false');
                redirect(base_url());
            }
        }
    }

    public function sendOffer()
    {
        $this->form_validation->set_rules('name', 'Ad Soyad', 'trim|required');
        $this->form_validation->set_rules('phone', 'Telefon', 'trim|required|min_length[10]|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('product', 'İlgilendiğiniz Ürün', 'trim|required');
        $this->form_validation->set_rules('message', 'Eklemek İstedikleriniz', 'trim');
        $this->form_validation->set_message(
            [
                "required" => "<b>{field}</b> alanının doldurulması zorunludur.",
                "valid_email" => "Lütfen geçerli bir <b>email</b> adresi giriniz.",
                "numeric" => "<b>{field}</b> alanında yalnızca rakam kullanılabilir.",
                "min_length" => "<b>{field}</b> alanında min. <b>{param}</b> karakter kullanılmalıdır."
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "offer";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {

            $contactData = [
                "name" => $this->input->post("name"),
                "email" => $this->input->post("email"),
                "message" => $this->input->post("message"),
                "product" => $this->input->post("product"),
                "phone" => $this->input->post("phone"),
                "createdAt" => date("d.m.Y", time())
            ];

            $contact = json_decode(get_settings("contact"), true);

            $viewData = new stdClass();
            $viewData->data = $contactData;
            $message = $this->load->view("email_templates/sendOffer", $viewData, TRUE);
            //send_mail helper - Kime, konu, mesaj
            $send = send_mail($contact["email"], "Fiyat Teklifi Formu", $message);
            if ($send) {
                $this->session->set_flashdata('sendTrue', 'true');
                redirect(base_url("fiyat-teklifi"));
            } else {
                $this->session->set_flashdata('sendFalse', 'false');
                redirect(base_url("fiyat-teklifi"));
            }
        }
    }



    public function sendSiziArayalim()
    {
        $this->form_validation->set_rules('telefon', 'Telefon', 'trim|required|min_length[10]|numeric');
        $this->form_validation->set_rules('tarih', 'Tarih', 'trim|required');
        $this->form_validation->set_rules('saat', 'Saat', 'trim|required');
        $this->form_validation->set_message(
            [
                "required" => "<b>{field}</b> alanının doldurulması zorunludur.",
                "numeric" => "<b>{field}</b> alanınında sadece rakam kullanılabilir.",
                "valid_email" => "Lütfen geçerli bir <b>email</b> adresi giriniz.",
                "min_length" => "<b>{field}</b> alanında min. <b>{param}</b> karakter kullanılmalıdır."
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            echo form_error("telefon");
            echo form_error("tarih");
            echo form_error("saat");
        } else {
            $data = [
                "telefon" => $this->input->post("telefon"),
                "tarih" => $this->input->post("tarih"),
                "saat" => $this->input->post("saat"),
                "createdAt" => date("d.m.Y", time())
            ];
            $contact = json_decode(get_settings("contact"), true);

            $viewData = new stdClass();
            $viewData->data = $data;
            $message = $this->load->view("email_templates/sendSiziArayalim", $viewData, TRUE);

            $send = send_mail($contact["email"], "Sizi Arayalım Formu", $message);
            if ($send) {
                $this->session->set_userdata('siziArayalim', 'true');
                echo "Belirlediğiniz çağrı zamanında temsilcilerimiz tarafınıza geri dönüş sağlayacaklardır.";
            } else {
                echo "Bir hata meydana geldi.";
            }

        }
    }
}
