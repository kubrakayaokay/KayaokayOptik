<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MY_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
        $this->viewFolder = "products";
        $this->load->model("products_model");
        $this->load->model("brands_model");
        $this->load->model("product_categories_model");
        $this->load->model("product_image_gallery_model");
        $this->load->library("form_validation");
    }

    public function index()
    {
        //Pagination
        $per_page = 20;
        $uri_segments = 3;
        pagination_create($per_page, $uri_segments, "products/index", $this->products_model->get_count());
        $page = ($this->uri->segment($uri_segments)) ? $this->uri->segment($uri_segments) : 0;

        $products = $this->products_model->get_all_limit([], "id DESC", $per_page, $page);
        $cats = $this->product_categories_model->get_all([], "id ASC");


        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->rows = $products;
        $viewData->cats = $cats;

        $viewData->pagination_links = $this->pagination->create_links();
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add()
    {
        $product_categories = $this->product_categories_model->get_all([], "id ASC");
        $brands = $this->brands_model->get_all([], "name ASC");
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $viewData->rows = $product_categories;
        $viewData->brands = $brands;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $product = $this->products_model->get(["id" => $id]);
        $cats = $this->product_categories_model->get_all([], "id ASC");
        $brands = $this->brands_model->get_all([], "name ASC");
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->row = $product;
        $viewData->cats = $cats;
        $viewData->brands = $brands;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function imageGallery($id)
    {
        $product = $this->products_model->get(["id" => $id]);
        $productGallery = $this->product_image_gallery_model->get_all(["product_id" => $id], "rank ASC");
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "gallery";
        $viewData->gallery = $productGallery;
        $viewData->row = $product;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function imageGalleryUpload($id)
    {
        $this->load->helper('string');
        $file_name2 = seo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "-" . random_string('numeric', 5) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "jpg|jpeg|png|gif";
        $config["upload_path"] = "../uploads/$this->viewFolder";
        $config['max_size'] = 1024 * 2;
        $config["file_name"] = $file_name2;
        $this->upload->initialize($config);
        if ($this->upload->do_upload("file")) {

            $this->product_image_gallery_model->add(
                [
                    "image" => $file_name2,
                    "isCover" => 0,
                    "rank" => 0,
                    "isActive" => 1,
                    "product_id" => $id
                ]
            );


        } else {
            echo $this->upload->display_errors();
            echo "<br>";
            echo $config["upload_path"];
        }
    }

    public function imageDelete($id, $product_id)
    {

        $fileName = $this->product_image_gallery_model->get(["id" => $id]);

        $delete = $this->product_image_gallery_model->delete(["id" => $id]);

        if ($delete) {

            unlink("../uploads/{$this->viewFolder}/$fileName->image");
            $alert = [
                "type" => "success",
                "message" => "Ürün görseli başarıyla silindi."
            ];
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("products/imageGallery/$product_id"));
        } else {
            $alert = [
                "type" => "error",
                "message" => "Ürün görseli silinirken bir hata oluştu."
            ];
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("products/imageGallery/$product_id"));
        }

    }

    public function imageIsActive($id)
    {
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->product_image_gallery_model->update(["id" => $id], ["isActive" => $isActive]);
        }
    }

    public function imageRank()
    {
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id) {
            $this->product_image_gallery_model->update(
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

    public function isCover($id, $product_id)
    {

        if ($id && $product_id) {

            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            // Kapak yapılmak istenen kayıt
            $this->product_image_gallery_model->update(
                [
                    "id" => $id,
                    "product_id" => $product_id
                ],
                [
                    "isCover" => $isCover
                ]
            );


            // Kapak yapılmayan diğer kayıtlar
            $this->product_image_gallery_model->update(
                [
                    "id !=" => $id,
                    "product_id" => $product_id
                ],
                [
                    "isCover" => 0
                ]
            );

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "gallery";
            $viewData->gallery = $this->product_image_gallery_model->get_all(["product_id" => $product_id], "rank ASC");
            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list", $viewData, true);
            echo $render_html;

        }
    }

    public function refresh_image_list($id)
    {

        $productGallery = $this->product_image_gallery_model->get_all(["product_id" => $id], "rank ASC");
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "gallery";
        $viewData->gallery = $productGallery;

        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list", $viewData, true);

        echo $render_html;

    }

    public function addProducts()
    {
        $rules_config = [
            [
                'field' => 'content',
                'label' => 'İçerik',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'name',
                'label' => 'Ürün Adı',
                'rules' => 'required|trim'
            ],
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
                'field' => 'brand_id',
                'label' => 'Marka',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'sex',
                'label' => 'Cinsiyet',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'degrade',
                'label' => 'Degrade',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'polarize',
                'label' => 'Polarize',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'frame_color',
                'label' => 'Çerçeve Rengi',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'frame_material',
                'label' => 'Çerçeve Materyali',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'glass_material',
                'label' => 'Cam Materyali',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'new_price',
                'label' => 'Yeni Fiyat',
                'rules' => 'required|trim'
            ]
        ];

        $message_config = [
            "required" => "<b>{field}</b> alanı boş bırakılamaz."
        ];

        $this->form_validation->set_rules($rules_config);
        $this->form_validation->set_message($message_config);

        if ($this->form_validation->run() == false) {
            $product_categories = $this->product_categories_model->get_all([], "id ASC");
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->rows = $product_categories;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            //Kategori ID'leri JSON formatına dönüştür
            $data = [
                "name" => $this->input->post("name"),
                "content" => $this->input->post("content"),
                "category_id" => $this->input->post("category_id"),
                "brand_id" => $this->input->post("brand_id"),
                "sex" => $this->input->post("sex"),
                "degrade" => $this->input->post("degrade"),
                "polarize" => $this->input->post("polarize"),
                "frame_color" => $this->input->post("frame_color"),
                "frame_material" => $this->input->post("frame_material"),
                "glass_material" => $this->input->post("glass_material"),
                "old_price" => $this->input->post("old_price"),
                "new_price" => $this->input->post("new_price"),
                "url" => seo($this->input->post("name")),
                "title" => $this->input->post("title"),
                "description" => $this->input->post("description"),
                "keywords" => $this->input->post("keywords"),
                "isActive" => 1,
            ];

            $insert = $this->products_model->add($data);
            if ($insert) {
                $alert = [
                    "type" => "success",
                    "message" => "Ürün başarıyla eklendi."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("products"));
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "Ürün eklenirken bir hata oluştu."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("products"));
            }
        }
    }

    public function updateProduct($id)
    {
        $rules_config = [
            [
                'field' => 'content',
                'label' => 'İçerik',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'name',
                'label' => 'Ürün Adı',
                'rules' => 'required|trim'
            ],
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
                'field' => 'brand_id',
                'label' => 'Marka',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'sex',
                'label' => 'Cinsiyet',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'degrade',
                'label' => 'Degrade',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'polarize',
                'label' => 'Polarize',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'frame_color',
                'label' => 'Çerçeve Rengi',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'frame_material',
                'label' => 'Çerçeve Materyali',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'glass_material',
                'label' => 'Cam Materyali',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'new_price',
                'label' => 'Yeni Fiyat',
                'rules' => 'required|trim'
            ]
        ];

        $message_config = [
            "required" => "<b>{field}</b> alanı boş bırakılamaz."
        ];

        $this->form_validation->set_rules($rules_config);
        $this->form_validation->set_message($message_config);

        if ($this->form_validation->run() == false) {
            $product = $this->products_model->get(["id" => $id]);
            $product_categories = $this->product_categories_model->get_all([], "id ASC");
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->rows = $product_categories;
            $viewData->row = $product;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            $data = [
                "name" => $this->input->post("name"),
                "content" => $this->input->post("content"),
                "category_id" => $this->input->post("category_id"),
                "brand_id" => $this->input->post("brand_id"),
                "sex" => $this->input->post("sex"),
                "degrade" => $this->input->post("degrade"),
                "polarize" => $this->input->post("polarize"),
                "frame_color" => $this->input->post("frame_color"),
                "frame_material" => $this->input->post("frame_material"),
                "glass_material" => $this->input->post("glass_material"),
                "old_price" => $this->input->post("old_price"),
                "new_price" => $this->input->post("new_price"),
                "url" => seo($this->input->post("name")),
                "title" => $this->input->post("title"),
                "description" => $this->input->post("description"),
                "keywords" => $this->input->post("keywords")
            ];

            $update = $this->products_model->update(["id" => $id], $data);
            if ($update) {
                $alert = [
                    "type" => "success",
                    "message" => "Ürün başarıyla güncellendi."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("products"));
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "Ürün güncellenirken bir hata oluştu."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("products"));
            }
        }
    }

    public function productIsActive($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->products_model->update(
                [
                    "id" => $id
                ],
                [
                    "isActive" => $isActive
                ]
            );
        }
    }

    public function deleteProducts($id)
    {
        // TODO Ürün galerisi yapıldığında silme işlemleri gerçekleştirilecek
        $delete = $this->products_model->delete(["id" => $id]);
        if ($delete) {
            $alert = [
                "type" => "success",
                "message" => "Ürün başarıyla silindi."
            ];
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("products"));
        } else {
            $alert = [
                "type" => "error",
                "message" => "Ürün silinirken bir hata oluştu."
            ];
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("products"));
        }
    }

    public function categories()
    {
        $product_categories = $this->product_categories_model->get_all([], "id ASC");
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "categories";
        $viewData->rows = $product_categories;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function addCategory()
    {
        $rules_config = [
            [
                'field' => 'name',
                'label' => 'Slider Adı',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'title',
                'label' => 'Slider Adı',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'description',
                'label' => 'Slider Adı',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'keywords',
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


            $data = [
                "name" => $this->input->post("name"),
                "title" => $this->input->post("title"),
                "description" => $this->input->post("description"),
                "keywords" => $this->input->post("keywords"),
                "parent_category_id" => $this->input->post("parent_category_id"),
                "url" => convertToSEO($this->input->post("title"))
            ];


            //Kategori Görseli Boş Değilse
            if ($_FILES["image"]["name"] !== "") {
                $this->load->helper('string');
                $number = random_string('numeric', 4);

                //Standart Kategori Görseli Ölçüleri
                $category_image_size = script_settings("category_image_size");
                $category_image_sizes = explode("*", $category_image_size);

                //Kategori Görseli Yükleme
                $file_name = seo(pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME)) . "-" . $number . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $image = upload_picture($_FILES["image"]["tmp_name"], "../uploads/products/categories/", $category_image_sizes[0], $category_image_sizes[1], $file_name);


                if ($image) {
                    $data["image"] = $file_name;
                } else {
                    $alert = [
                        "type" => "error",
                        "message" => "Slider görseli yüklenirken bir hata oluştu."
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("products/categories"));
                    die();
                }
            }


            $insert = $this->product_categories_model->add($data);
            if ($insert) {
                $alert = [
                    "type" => "success",
                    "message" => "Slider başarıyla eklendi."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("products/categories"));
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "Slider eklenirken bir hata oluştu."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("products/categories"));
            }
        }


    }

    public function deleteCategory($id)
    {

        $row = $this->product_categories_model->get(["id" => $id]);
        $slider_image_size = script_settings("slider_image_size");
        $slider_image_size_replace = str_replace("*", "x", $slider_image_size);

        $delete = $this->product_categories_model->delete(["id" => $id]);

        if ($delete) {
            unlink("../uploads/products/categories/$slider_image_size_replace/$row->image");
            $alert = [
                "type" => "success",
                "message" => "Ürün kategorisi başarıyla silindi."
            ];
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("products/categories"));
        } else {
            $alert = [
                "type" => "error",
                "message" => "Ürün kategorisi silinirken bir hata oluştu."
            ];
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("products/categories"));
        }
    }

    public function updateCategory($id)
    {
        $rules_config = [
            [
                'field' => 'name',
                'label' => 'Kategori Adı',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'title',
                'label' => 'Kategori Başlık',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'description',
                'label' => 'Kategori Açıklama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'keywords',
                'label' => 'Anahtar Kelimeler',
                'rules' => 'required|trim'
            ]
        ];

        $message_config = [
            "required" => "<b>{field}</b> alanı boş bırakılamaz."
        ];

        $this->form_validation->set_rules($rules_config);
        $this->form_validation->set_message($message_config);

        if ($this->form_validation->run() == false) {
            $product_categories = $this->product_categories_model->get_all([], "id ASC");
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "categories";
            $viewData->rows = $product_categories;
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {

            $data = [
                "name" => $this->input->post("name"),
                "parent_category_id" => $this->input->post("parent_category_id"),
                "title" => $this->input->post("title"),
                "description" => $this->input->post("description"),
                "keywords" => $this->input->post("keywords"),
                "url" => convertToSEO($this->input->post("title"))
            ];

            if ($_FILES["image"]["name"] !== "") {

                $this->load->helper('string');
                $number = random_string('numeric', 4);

                //Standart Slider Görseli Ölçüleri
                $category_image_size = script_settings("category_image_size");
                $category_image_sizes = explode("*", $category_image_size);

                //Eski Slider Görseli Silme
                $row = $this->product_categories_model->get(["id" => $id]);
                $slider_image_size_replace = str_replace("*", "x", $category_image_sizes);

                //Slider Görseli Yükleme
                $file_name = seo(pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME)) . "-" . $number . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $image = upload_picture($_FILES["image"]["tmp_name"], "../uploads/products/categories/", $category_image_sizes[0], $category_image_sizes[1], $file_name);

                if ($image) {
                    unlink("../uploads/products/categories/$category_image_sizes/$row->image");
                    $data["image"] = $file_name;
                } else {
                    $alert = [
                        "type" => "error",
                        "message" => "Slider görseli yüklenirken bir hata oluştu."
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("products/categories"));
                    die();
                }
            }

            $update = $this->product_categories_model->update(["id" => $id], $data);
            if ($update) {
                $alert = [
                    "type" => "success",
                    "message" => "Ürün kategorisi başarıyla güncellendi."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("products/categories"));
            } else {
                $alert = [
                    "type" => "error",
                    "message" => "Ürün kategorisi güncellenirken bir hata oluştu."
                ];
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("products/categories"));
            }
        }

    }
}
