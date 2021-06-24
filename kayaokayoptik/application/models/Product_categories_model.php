<?php
class Product_categories_model extends CI_Model{

    public $tableName = "product_categories";
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

    //GET All child categories
    public function getCategoriesByParentId($category_id) {
        $category_data = array();
        $category_query = $this->db->query("SELECT * FROM product_categories WHERE parent_category_id = '" . (int)$category_id . "'");
        foreach ($category_query->result() as $category) {
            $category_data[] = array(
                'id' => $category->id
            );

            $children = $this->getCategoriesByParentId($category->id);

            if ($children) {
                $category_data = array_merge($children, $category_data);
            }
        }
        return $category_data;
    }

}