<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Budgets extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("budget_model");
        $this->load->model("district_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["budgets"] = $this->budget_model->getAll();
        $this->load->view("admin/budget/index", $data);
    }

    public function add()
    {
        $budget = $this->budget_model;
        $validation = $this->form_validation;
        $validation->set_rules($budget->rules());
        $data['districts'] = $this->district_model->getAll();
        if ($validation->run()) {
            $budget->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/budget/add", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/budgets');
       
        $budget = $this->budget_model;
        $validation = $this->form_validation;
        $validation->set_rules($budget->rules());

        if ($validation->run()) {
            $budget->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['districts'] = $this->district_model->getAll();
        $data["budget"] = $budget->getById($id);
        if (!$data["budget"]) show_404();
        
        $this->load->view("admin/budget/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->budget_model->delete($id)) {
            redirect(site_url('admin/budgets'));
        }
    }
}
