<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subdistricts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("subdistrict_model");
        $this->load->model("district_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["subdistricts"] = $this->subdistrict_model->getAll();
        $this->load->view("admin/subdistrict/list", $data);
    }

    public function add()
    {
       // print_r('tes');die();
        $data['districts'] = $this->district_model->getAll();
        //print_r($data);
        $subdistrict = $this->subdistrict_model;
        $validation = $this->form_validation;
        $validation->set_rules($subdistrict->rules());
        
        if ($validation->run()) {
            $subdistrict->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/subdistrict/add", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/subdistricts');
        $subdistrict = $this->subdistrict_model;
        $validation = $this->form_validation;
        $validation->set_rules($subdistrict->rules());
        if ($validation->run()) {
            $subdistrict->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['districts'] = $this->district_model->getAll();
        $data["subdistrict"] = $subdistrict->getById($id);
        if (!$data["subdistrict"]) show_404();
        
        $this->load->view("admin/subdistrict/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->subdistrict_model->delete($id)) {
            redirect(site_url('admin/subdistricts'));
        }
    }
}
