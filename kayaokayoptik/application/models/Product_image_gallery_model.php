<?php
class Product_image_gallery_model extends CI_Model{

    public $tableName = "product_image_gallery";
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
    public function get_all_limit($where = array(), $order = "id DESC", $limit, $count)
    {
        return $this->db->where($where)->order_by($order)->limit($limit, $count)->get($this->tableName)->result();
    }

    public function get_count()
    {
        return $this->db->count_all($this->tableName);
    }

    public function get_image_gallery_categories($ar)
    {
        $this->db->select("*");
        $this->db->where("isCover",1);
        $this->db->where_in('product_id', $ar);
        $galleries = $this->db->get('product_image_gallery');

        if ($galleries->num_rows() > 0) {
            $data = $galleries->result();
        } else {
            $data = null;
        }

        return $data;
    }

}