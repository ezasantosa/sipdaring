<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subdistrict_model extends CI_Model
{
    private $_table = "subdistricts";

    public $id;
    public $head_village;
    public $name;
    public $district;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],
            
            ['field' => 'head_village',
            'label' => 'Head village',
            'rules' => 'required'],


            ['field' => 'district',
            'label' => 'District',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->name = $post["name"];
        $this->head_village = $post["head_village"];
        $this->district = $post["district"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->name = $post["name"];
        $this->head_village = $post["head_village"];
        $this->district = $post["district"];
       // print_r($post);die();
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
		//$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id" => $id));
	}

}
