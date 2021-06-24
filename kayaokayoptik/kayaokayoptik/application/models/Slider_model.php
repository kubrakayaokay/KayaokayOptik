<?php

class Slider_model extends CI_Model
{

    public $tableName = "slider";

    public function __construct()
    {
        parent::__construct();
    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }
    public function get_all($where = array(), $order = "rank ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

}