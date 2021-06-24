<?php

class Subscribe_model extends CI_Model
{

    public $tableName = "subscribe";

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
    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }
    public function get_count()
    {
        return $this->db->count_all($this->tableName);
    }
    public function get_all_limit($where = array(), $order = "id DESC", $limit, $count)
    {
        return $this->db->where($where)->order_by($order)->limit($limit, $count)->get($this->tableName)->result();
    }

}