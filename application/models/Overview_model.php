<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview_model extends CI_Model
{
    private $_table = "districts";
    private $_tableService = "services";
    private $_tableTempData = "temp_data";
    private $_tableMapping = "subdistricts";

    public $id;
    public $name;
    // public $price;
    // public $image = "default.jpg";
    // public $description;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getDistricts()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getServices()
    {
        return $this->db->get($this->_tableService)->result();
    }

    public function getTempData()
    {
        return $this->db->get($this->_tableTempData)->result();
    }

    public function getMapping()
    {
        return $this->db->get($this->_tableMapping)->result();
    }
    

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

}
