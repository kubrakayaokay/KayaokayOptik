<?php
class Settings_model extends CI_Model{

    public $tableName = "settings";
    public function __construct()
    {
        parent::__construct();
    }
    public function get($where = array()){
        return $this->db->where($where)->get($this->tableName)->row();
    }
}