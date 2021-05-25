<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Budget_model extends CI_Model
{
    private $_table = "budgets";

    public $id;
    public $kecamatan;
    public $dinkes;
    public $disdik;
    public $disperkimtan;
    public $dlh;
    public $dputr;
    public $disdamkar;
    public $dinsos;
    public $diskopukm;
    public $disnaker;
    public $dispakan;
    public $disparbud;
    public $dispora;
    public $distan;  


    public function rules()
    {
        return [
            ['field' => 'district',
            'label' => 'district',
            'rules' => 'required'],
            
            ['field' => 'dinkes',
            'label' => 'Dinkes',
            'rules' => 'required'],

            ['field' => 'disdik',
            'label' => 'Disdik',
            'rules' => 'required'],

            ['field' => 'disperkimtan',
            'label' => 'Disperkimtan',
            'rules' => 'required'],

            ['field' => 'dlh',
            'label' => 'DLH',
            'rules' => 'required'],

            ['field' => 'dputr',
            'label' => 'DPUTR',
            'rules' => 'required'],

            ['field' => 'disdamkar',
            'label' => 'Disdamkar',
            'rules' => 'required'],

            ['field' => 'dinsos',
            'label' => 'Dinsos',
            'rules' => 'required'],

            ['field' => 'diskopukm',
            'label' => 'Diskopukm',
            'rules' => 'required'],

            ['field' => 'disnaker',
            'label' => 'Disnaker',
            'rules' => 'required'],

            ['field' => 'dispakan',
            'label' => 'dispakan',
            'rules' => 'required'],

            ['field' => 'disparbud',
            'label' => 'Disparbud',
            'rules' => 'required'],

            ['field' => 'dispora',
            'label' => 'Dispora',
            'rules' => 'required'],

            ['field' => 'distan',
            'label' => 'Distan',
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
       // $this->id = uniqid();
        $this->kecamatan = $post["district"];
        $this->dinkes = $post["dinkes"];
        $this->disdik = $post["disdik"];
        $this->disperkimtan = $post["disperkimtan"];
        $this->dlh = $post["dlh"];
        $this->dputr = $post["dputr"];
        $this->disdamkar = $post["disdamkar"];
        $this->dinsos = $post["dinsos"];
        $this->diskopukm = $post["diskopukm"];
        $this->disnaker = $post["disnaker"];
        $this->dispakan = $post["dispakan"];
        $this->disparbud = $post["disparbud"];
        $this->dispora = $post["dispora"];
        $this->distan = $post["distan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->kecamatan = $post["district"];
        $this->dinkes = $post["dinkes"];
        $this->disdik = $post["disdik"];
        $this->disperkimtan = $post["disperkimtan"];
        $this->dlh = $post["dlh"];
        $this->dputr = $post["dputr"];
        $this->disdamkar = $post["disdamkar"];
        $this->dinsos = $post["dinsos"];
        $this->diskopukm = $post["diskopukm"];
        $this->disnaker = $post["disnaker"];
        $this->dispakan = $post["dispakan"];
        $this->disparbud = $post["disparbud"];
        $this->dispora = $post["dispora"];
        $this->distan = $post["distan"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
	}

}
