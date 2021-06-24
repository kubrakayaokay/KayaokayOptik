<?php

class Products_model extends CI_Model
{

    public $tableName = "products";

    public function __construct()
    {
        parent::__construct();
    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function get_all($where = array(), $order = "id DESC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    public function get_all_limit($where = array(), $order = "id DESC", $limit)
    {
        return $this->db->where($where)->order_by($order)->limit($limit)->get($this->tableName)->result();
    }

    public function get_count()
    {
        return $this->db->count_all($this->tableName);
    }

    public function get_products($ar)
    {
        $this->db->select("*");
        $this->db->where_in('category_id', $ar);
        $galleries = $this->db->get('products');

        if ($galleries->num_rows() > 0) {
            $data = $galleries->result();
        } else {
            $data = null;
        }

        return $data;
    }


    public function fetch_filter_type($type)
    {

        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('products');
        $this->db->where('isActive', 1);
        return $this->db->get();

    }


    function make_query($brand, $frame,$glass )
    {
        $query = "
  SELECT * FROM products 
  WHERE isActive = '1' 
  ";



        if (isset($brand)) {
            $brand_filter = implode("','", $brand);
            $query .= "
    AND brand_id IN('" . $brand_filter . "')
   ";
        }

        if (isset($glass)) {
            $glass_material_filter = implode("','", $glass);
            $query .= "
    AND glass_material IN('" . $glass_material_filter . "')
   ";
        }

        if (isset($frame)) {
            $frame_filter = implode("','", $frame);
            $query .= "
    AND frame_material IN('" . $frame_filter . "')
   ";
        }
        return $query;

    }

    function count_all($brand, $frame, $glass)
    {
        $query = $this->make_query( $brand, $frame,$glass);
        $data = $this->db->query($query);
        return $data->num_rows();
    }

    function fetch_data($limit, $start, $brand, $frame,$glass)
    {
        $query = $this->make_query($brand, $frame ,$glass);

        $query .= ' LIMIT ' . $start . ', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
//        if ($data->num_rows() > 0) {
//            foreach ($data->result_array() as $row) {
//                $output .= '
//    <div class="col-sm-4 col-lg-3 col-md-3">
//     <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
//      <img src="' . base_url() . 'images/' . $row['name'] . '" alt="" class="img-responsive" >
//      <p align="center"><strong><a href="#">' . $row['name'] . '</a></strong></p>
//      <h4 style="text-align:center;" class="text-danger" >' . $row['new_price'] . '</h4>
//      <p>Camera : ' . $row['new_price'] . ' MP<br />
//      Brand : ' . $row['new_price'] . ' <br />
//      RAM : ' . $row['new_price'] . ' GB<br />
//      Storage : ' . $row['new_price'] . ' GB </p>
//     </div>
//    </div>
//    ';
//            }
//        } else {
//            $output = '<h3>No Data Found</h3>';
//        }



        if($data->num_rows()>0) {
            foreach ($data->result_array() as $row) {
                $output .= '      <div class="col-6 col-lg-6">
                                <article>
                                    <div class="btn btn-add">
                                        <a  href="'.base_url("cart/addCart/").$row['url'].'" >
                                            <i style="color: white" class="icon icon-cart"></i>
                                        </a>
                                    </div>
                                    <div class="figure-grid">                                     
                                        <div class="image">
                                            <a href="'.base_url("products/show/").$row['url'].'">                                          
                                                        <img src="'. get_product_image($row['id']).'" alt=""/>                                                                                                             
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h6 class="title h6">
                                                <a href="'.base_url("products/show/").$row['url'].'">' . $row['name'] . '</a>
                                            </h6>                                 
                                            <sub>' . $row['new_price'] . '₺ </sub>
                                            <sup>' . $row['old_price'] . '₺</sup>                        
                                        </div>
                                    </div>
                                </article>
                            </div>';
            }
        }
        else {
            $output = '<h3>No Data Found</h3>';
        }

        return $output;
    }


}
