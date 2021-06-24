<?php
//Script Settings
function script_settings($setting = "")
{
    $t = &get_instance();
    $t->load->model("settings_model");
    $settings = $t->settings_model->get(["id" => 1]);
    $logo = $settings->logo;
    $footer_logo = $settings->footer_logo;
    $favicon = $settings->favicon;
    //Görsel ölçüleri * formatında girilmeli...
    $settings = [
        "company_name" => "KayaOkay Optik",
        "logo" => $logo,
        "footer_logo" => $footer_logo,
        "favicon" => $favicon,
        "blog_image_size" => "700*600",
        "services_image_size" => "950*375",
        "category_image_size" => "760*600",
        "product_image_thumb_size" => "480*480",
        "product_image_size" => "950*790",
        "slider_image_size" => "1800*600",
        "customer_image_size" => "120*120",
        "brand_image_size" => "250*66"
    ];
    return $settings[$setting];
}

//SEO
function seo($text)
{
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '-', $text);
    return $text;
}
function tum_bosluk_sil($veri)
{
    $veri = str_replace("/s+/","",$veri);
    $veri = str_replace(" ","",$veri);
    $veri = str_replace(" ","",$veri);
    $veri = str_replace(" ","",$veri);
    $veri = str_replace("/s/g","",$veri);
    $veri = str_replace("/s+/g","",$veri);
    $veri = trim($veri);
    return $veri;
};
function turkcetarih_formati($format, $datetime = 'now')
{
    $z = date("$format", strtotime($datetime));
    $gun_dizi = array(
        'Monday' => 'Pazartesi',
        'Tuesday' => 'Salı',
        'Wednesday' => 'Çarşamba',
        'Thursday' => 'Perşembe',
        'Friday' => 'Cuma',
        'Saturday' => 'Cumartesi',
        'Sunday' => 'Pazar',
        'January' => 'Ocak',
        'February' => 'Şubat',
        'March' => 'Mart',
        'April' => 'Nisan',
        'May' => 'Mayıs',
        'June' => 'Haziran',
        'July' => 'Temmuz',
        'August' => 'Ağustos',
        'September' => 'Eylül',
        'October' => 'Ekim',
        'November' => 'Kasım',
        'December' => 'Aralık',
        'Mon' => 'Pts',
        'Tue' => 'Sal',
        'Wed' => 'Çar',
        'Thu' => 'Per',
        'Fri' => 'Cum',
        'Sat' => 'Cts',
        'Sun' => 'Paz',
        'Jan' => 'Oca',
        'Feb' => 'Şub',
        'Mar' => 'Mar',
        'Apr' => 'Nis',
        'Jun' => 'Haz',
        'Jul' => 'Tem',
        'Aug' => 'Ağu',
        'Sep' => 'Eyl',
        'Oct' => 'Eki',
        'Nov' => 'Kas',
        'Dec' => 'Ara',
    );
    foreach ($gun_dizi as $en => $tr) {
        $z = str_replace($en, $tr, $z);
    }
    if (strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
    return $z;
}

function get_settings($value = "")
{
    $t = &get_instance();
    $t->load->model("settings_model");
    $settings = $t->settings_model->get(["id" => 1]);
    if ($settings) {
        if ($value != "") {
            return $settings->$value;
        } else {
            return $settings;
        }
    } else {
        return false;
    }
}


function get_picture($path = "", $picture = "", $resolution = "50x50")
{
    if ($picture != "") {

        if (file_exists(FCPATH . "uploads/$path/$resolution/$picture")) {
            $picture = base_url("uploads/$path/$resolution/$picture");
        } else {
            $picture = base_url("/assets/img/standart_image.jpg");
        }

    } else {
        $picture = base_url("/assets/img/standart_image.jpg");

    }
    return $picture;
}

//Pagination Actions
function pagination_create($per_page, $uri_segment, $base_url, $total_rows)
{
    $t = &get_instance();
    $t->load->library('pagination');
    $config = [];
    $config["base_url"] = base_url() . $base_url;
    $config["total_rows"] = $total_rows;
    $config["per_page"] = $per_page;
    $config["uri_segment"] = $uri_segment;
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li><a class="active" href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['last_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-right"></i>';


    $config['prev_link'] = 'Geri';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';


    $config['next_link'] = 'İleri';
    $config['next_tag_open'] = '<li class="next">';
    $config['next_tag_close'] = '</li>';
    return $t->pagination->initialize($config);

}

function get_blog_category($id)
{
    $t = &get_instance();
    $t->load->model("blogs_model");
    $t->load->model("blog_categories_model");

    $blog = $t->blogs_model->get(["id" => $id]);
    $category = json_decode($blog->category_id, true);

    $blog_category = $t->blog_categories_model->get_all([]);
    $category_list  = [];

    foreach ($category as $categories){
        foreach ($blog_category as $b_category):
            if ($categories == $b_category->id){
                $category_list[]  = $b_category->name;
            }
        endforeach;
    }
    return implode(", " ,$category_list);
}


function get_parent_name($id){
    $t = &get_instance();
    $t->load->model("product_categories_model");
    $cat=$t->product_categories_model->get(["id"=>$id]);
    if($cat){
        return $cat->name;
    }else{
        return null;
    }
}


function get_brand_name($id){
    $t = &get_instance();
    $t->load->model("brands_model");
    $brand=$t->brands_model->get(["id"=>$id]);
    if($brand){
        return $brand->name;
    }else{
        return null;
    }
}



function get_product_image($id){
    $t = &get_instance();

    $t->load->model("product_image_gallery_model");
    $image=$t->product_image_gallery_model->get(["product_id"=>$id , "isCover"=>1]);

    if($image){
        return base_url("uploads/products/$image->image");
    }else{
        return base_url("assets/img/standart_image.jpg");
    }
}

function get_product_category()
{
    $t = &get_instance();
    $t->load->model("product_categories_model");
    return $t->product_categories_model->get_all(["parent_category_id"=>0], "id ASC");
}

function get_product_id($products){

    if($products){
        $data=array();
        foreach ($products as $product){
             array_push($data,$product->id);
        }
        return $data;
    }else{
        return null;
    }

}



function get_sub_category($id)
{
    $t = &get_instance();
    $t->load->model("product_categories_model");
    return $t->product_categories_model->get_all(["parent_category_id"=>$id], "id ASC");
}

function get_product_list()
{
    $t = &get_instance();
    $t->load->model("products_model");

    return  $t->products_model->get_all(["isActive" => 1], "id ASC");

}

function get_product_picture($path = "", $picture = "")
{
 if ($picture != "") {

  if (file_exists(FCPATH . "uploads/$path/$picture")) {
   $picture = base_url("uploads/$path/$picture");
  } else {
   $picture = base_url("/assets/img/standart_image.jpg");
  }

 } else {
  $picture = base_url("/assets/img/standart_image.jpg");

 }
 return $picture;
}
