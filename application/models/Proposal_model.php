<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal_model extends CI_Model
{
    private $_table = "temp_data";

    public $pengusul;
    public $profil;
    // public $price;
    // public $image = "default.jpg";
    // public $description;


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    

}
