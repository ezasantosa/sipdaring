<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Districts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("district_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["districts"] = $this->district_model->getAll();
        $this->load->view("admin/district/list", $data);
    }

    public function add()
    {
       // print_r('tes');die();
        $district = $this->district_model;
        $validation = $this->form_validation;
        $validation->set_rules($district->rules());

        if ($validation->run()) {
            $district->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/district/add");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/districts');
       
        $district = $this->district_model;
        $validation = $this->form_validation;
        $validation->set_rules($district->rules());

        if ($validation->run()) {
            $district->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["district"] = $district->getById($id);
        if (!$data["district"]) show_404();
        
        $this->load->view("admin/district/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->district_model->delete($id)) {
            redirect(site_url('admin/districts'));
        }
    }
}
