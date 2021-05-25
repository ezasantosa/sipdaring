<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("proposal_model");
        $this->load->library('form_validation');
    }

	public function index()
	{
        // load view admin/overview.php
		$data["overview"] = $this->proposal_model->getAll();
        //$data["services"] = $this->overview_model->getServices();

        //print_r($data['services']);
        $this->load->view("admin/proposal", $data);
	}
}
