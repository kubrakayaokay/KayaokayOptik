<?php
//Script Settings
function script_settings($setting = "")
{
    $t = &get_instance();
    $t ->load->model("settings_model");
    $settings = $t->settings_model->get(["id" => 1]);
    $logo = $settings->logo;
    $footer_logo = $settings->footer_logo;
    $favicon = $settings->favicon;
    $site_url = $settings->site_url;
    //Görsel ölçüleri * formatında girilmeli...
    $settings = [
        "logo" => $logo,
        "footer_logo" => $footer_logo,
        "favicon" => $favicon,
        "site_url" => $site_url,
        "icon" => "fa fa-code",
        "company_name" => "Kayaokay Optik ",
        "title" => "Kayaokay Optik - Yönetim Paneli",
        "blog_image_size" => "760*600",
        "services_image_size" => "950*375",
        "product_image_thumb_size" => "480*480",
        "product_image_size" => "950*790",
        "category_image_size" => "760*600",
        "slider_image_size" => "1920*1200",
        "customer_image_size" => "120*120",
        "brand_image_size" => "250*66"
    ];
    return $settings[$setting];
}

function get_active_user()
{

    $t = &get_instance();

    $user = $t->session->userdata("user");

    if ($user)
        return $user;
    else
        return false;

}

//Image Upload
function upload_picture($file, $uploadPath, $width, $height, $name)
{
    $t = &get_instance();
    $t->load->library("simpleimagelib");
    if (!is_dir("{$uploadPath}/{$width}x{$height}")) {
        mkdir("{$uploadPath}/{$width}x{$height}");
    }

    $upload_error = false;
    try {

        $simpleImage = $t->simpleimagelib->get_simple_image_instance();

        $simpleImage
            ->fromFile($file)
            ->thumbnail($width, $height, 'center')
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", null, 75);

    } catch (Exception $err) {
        $error = $err->getMessage();
        $upload_error = true;
    }

    if ($upload_error) {
        echo $error;
    } else {
        return true;
    }
}

//Get Picture
function get_picture($path = "", $picture = "", $resolution = "50x50")
{

    if ($picture != "") {

        if (file_exists(FCPATH . "../uploads/$path/$resolution/$picture")) {
            $picture = base_url("../uploads/$path/$resolution/$picture");
        } else {
            $picture = base_url("/assets/images/standart_image.png");
        }

    } else {

        $picture = base_url("/assets/images/standart_image.png");

    }

    return $picture;

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

//Time Convert
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

//Get  Category
function get_blog_category()
{
    $t = &get_instance();
    return $t->blog_categories_model->get_all([], "rank ASC");
}

function get_products_category()
{
    $t = &get_instance();
    return $t->product_categories_model->get_all([], "id ASC");
}

//Get Single  Category
function get_single_blog_category($blog_category_id)
{
    $t = &get_instance();
    $category = $t->blog_categories_model->get(["id" => $blog_category_id]);
    if ($category):
        return $category;
    else:
        return false;
    endif;
}

function get_single_product_category($product_category_id)
{
    $t = &get_instance();
    $category = $t->product_categories_model->get(["id" => $product_category_id]);
    if ($category):
        return $category;
    else:
        return false;
    endif;
}

//Category List Actions
function productCategoryList($rows, $parent_id = 0)
{
    $category = [];
    foreach ($rows as $row):
        if ($row->parent_category_id == $parent_id) {
            $parent = productCategoryList($rows, $row->id);
            if ($parent) {
                $row->child = $parent;
            } else {
                $row->child = [];
            }
            $category[] = $row;
        }
    endforeach;
    return $category;
}

function productCategoryTreeView($items)
{
    echo "<ul class='list-category content-container'>";
    foreach ($items as $item) {
        $deleteLink = base_url('products/deleteCategory/') . "$item->id";
        echo "<li class='list-category-item'>{$item->name}  
        <button style='float: right; right; margin-right: 10px;' href='#'  data-url='{$deleteLink}'
                                    class='btn btn-xs btn-danger btn-outline remove-btn'><i class='fa fa-trash'></i> Sil</button>
                                    <a style='float: right; margin-right: 10px;' href='#' class='btn btn-xs btn-info btn-outline' data-target='#updateCategory{$item->id}' data-toggle='modal'><i class='fa fa-edit'></i> Düzenle</a> 
</li>";
        if (count($item->child) > 0) {
            productCategoryTreeView($item->child);
        }
    }
    echo "</ul>";
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
    $config["full_tag_open"] = '<ul class="pagination">';
    $config["full_tag_close"] = '</ul>';
    $config["first_link"] = "&laquo;";
    $config["first_tag_open"] = "<li>";
    $config["first_tag_close"] = "</li>";
    $config["last_link"] = "&raquo;";
    $config["last_tag_open"] = "<li>";
    $config["last_tag_close"] = "</li>";
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '<li>';
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '<li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    return $t->pagination->initialize($config);

}
function get_product_category()
{
    $t = &get_instance();
    $t->load->model("product_categories_model");

    return $category = $t->product_categories_model->get_all([], "id ASC");

}

function convertToSEO($text){

  $turkish = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "{", "}", "[", "]");
  $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-",  "-",  "-", "-",  "-", "-",  "-",  "-",  "-",  "-",  "-",  "-",  "-",  "-",  "-",  "-",  "-");

  return strtolower(str_replace($turkish, $convert, $text));

}
