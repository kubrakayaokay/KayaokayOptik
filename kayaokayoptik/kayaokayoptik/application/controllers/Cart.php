<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends MY_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->library("form_validation");
        $this->viewFolder = "cart";
        $this->load->model("products_model");

    }

    public function index()
    {

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }


    public function address()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "address";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }


    public function payment()
    {


        $rules_config = [
            [
                'field' => 'firstname',
                'label' => 'İsim',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'lastname',
                'label' => 'Soyisim',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'address',
                'label' => 'Adres',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'zipcode',
                'label' => 'Posta Kodu',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'city',
                'label' => 'İl',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'district',
                'label' => 'İlçe',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'email',
                'label' => 'E-posta Adresi',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'phone',
                'label' => 'Telefon Bilginiz',
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
            $viewData->form_error = true;
            $viewData->subViewFolder = "address";
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }else{

            $_SESSION["first_name"] = $this->input->post("firstname");
            $_SESSION["last_name"] = $this->input->post("lastname");
            $_SESSION["address"] = $this->input->post("address");
            $_SESSION["zipcode"] = $this->input->post("zipcode");
            $_SESSION["phone"] = $this->input->post("phone");
            $_SESSION["district"] = $this->input->post("district");
            $_SESSION["email"] = $this->input->post("email");
            $_SESSION["city"] = $this->input->post("city");
            $_SESSION["time"] = date("Y-m-d H:i:s");


            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "payment";
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }


    }

    public function confirmation()
    {


        if(empty($_SESSION['first_name'])){
            redirect(base_url());
        }

        $rules_config = [
            [
                'field' => 'card-number',
                'label' => 'İsim',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'expires-month',
                'label' => 'İlçe',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'expires-year',
                'label' => 'E-posta Adresi',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'cardcvc',
                'label' => 'Telefon Bilginiz',
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
            $viewData->form_error = true;
            $viewData->subViewFolder = "payment";
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }else{

            $_SESSION["card_number"] = $this->input->post("card-number");

            $message = '';
            $message .= '<style type="text/css">
    a[x-apple-data-detectors] {
        color: inherit !important;
    }
</style>
<body style="margin: 0; padding: 0;">
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 20px 0 30px 0;">

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                   style="border-collapse: collapse; border: 1px solid #cccccc;">
             
                <tr>
                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%"
                               style="border-collapse: collapse;">
                            <tr>
                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
                                      <h2 style="margin: 0;">Merhaba  &#9;'. $_SESSION["first_name"] .' &#9;'. $_SESSION["last_name"]. ' ,</h2>  <br>                                  
                                    <h3>Sipariş tarihi: '. $_SESSION["time"] .' </h3>
                                  <h3>Sipariş tutarınız: '.$this->cart->format_number($this->cart->total()) .' ₺</h3>                                                      
                                </td>
                            </tr>
                            <tr>
                                <td>
                                  <p style="margin: 0;">
                                       Bizi tercih ettiğiniz için teşekkür ederiz. Güzel günlerde kullanmanızı dileriz.</p>             
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>';

            if(!empty($_SESSION["email"])){
                $statu= send_mail($_SESSION["email"],"Fatura Bilgilendirme",$message);
            }



            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "confirmation";
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            $this->cart->destroy();
            session_unset();
        }

    }

    public function addCart($url)
    {

        $product = $this->products_model->get(["url" => $url]);
        $data = array(
            'id' => $product->id,
            'qty' => 1,
            'price' => $product->new_price,
            'name' => $product->name
        );
        $this->cart->insert($data);
        redirect(base_url());
    }

    public function showCart()
    {
        $this->load->helper('form');
        $this->load->view("cart/deneme");

    }


    public function delete_product($rowid)
    {

        $this->cart->remove($rowid);
        redirect(base_url());
    }


}
