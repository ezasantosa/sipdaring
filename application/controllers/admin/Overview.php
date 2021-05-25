<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("overview_model");
        $this->load->library('form_validation');
    }

	public function index()
	{

		$data["overview"] = $this->overview_model->getDistricts();
        $data["services"] = $this->overview_model->getServices();
        $data["temp_data"] = $this->overview_model->getTempData();
    
        $data["mapping_data"] = $this->overview_model->getMapping();
        $data['total_data'] = count($data["temp_data"]);
        foreach($data['temp_data'] as $temp){
            $anggaran = 0;
            $rekomendasi_kecamatan = '';
            $rekomendasi_bappeda = '';
            if(!empty($temp->rekomendasi_kecamatan)){
                $rekomendasi_kecamatan =  explode(':',$temp->rekomendasi_kecamatan);
                $anggaran = $rekomendasi_kecamatan[3];
            }else{
                if(!empty($temp->rekomendasi_mitra_bappeda)){
                    $rekomendasi_bappeda = explode(':',$temp->rekomendasi_mitra_bappeda);
                    $anggaran = $rekomendasi_bappeda[3];
                }
            }
            $temp->anggaran = $anggaran;
            $temp->district = '';
            foreach($data['mapping_data'] as $mapping){
                if(rtrim($mapping->head_village) == rtrim($temp->pengusul)){
                    $temp->district = $mapping->district;
                }
            }
        }
        $total_anggaran = 0;
        foreach($data['overview'] as $overview){
            $overview->dinkes = 0;
            $overview->disdik = 0;
            $overview->disperkimtan = 0;
            $overview->dputr = 0;
            $overview->dlh = 0;
            $overview->disdamkar = 0;
            $overview->dinsos = 0;
            $overview->diskopukm = 0;
            $overview->disnaker = 0;
            $overview->dispangkan = 0;
            $overview->disparbud = 0;
            $overview->dispora = 0;
            $overview->distan = 0;
            $overview->total = 0;
            //print_r($overview->name);
            foreach($data['temp_data'] as $temp){
                //print_r($temp->district);
               if(rtrim($temp->district) == (rtrim($overview->name))){
                    //print_r($overview->name);
                    if(rtrim($temp->opd_tujuan) == 'DINAS KESEHATAN'){
                        $overview->dinkes += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PENDIDIKAN'){
                        $overview->disdik += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN DAN PERTANAHAN'){
                        $overview->disperkimtan += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS LINGKUNGAN HIDUP'){
                        $overview->dlh += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PEKERJAAN UMUM DAN TATA RUANG'){
                        $overview->dputr += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PEMADAMAN KEBAKARAN DAN PENYELAMATAN'){
                        $overview->disdamkar += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS SOSIAL'){
                        $overview->dinsos += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS KOPERASI DAN USAHA KECIL DAN MENENGAH'){
                        $overview->diskopukm += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS KETENAGAKERJAAN'){
                        $overview->disnaker += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PANGAN DAN PERIKANAN'){
                        $overview->dispangkan += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PARIWISATA DAN KEBUDAYAAN'){
                        $overview->disparbud += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PEMUDA DAN OLAH RAGA'){
                        $overview->dispora += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PERTANIAN'){
                        $overview->distan += (int) $temp->anggaran; 
                    }
                   $overview->total += (int) $temp->anggaran;
               }else{
                   //print_r('false');
               }
            }
            $total_anggaran += $overview->total;
            //if($overview->name)
        }
        $data['total_anggaran'] = $total_anggaran;
        //print_r($data['overview']);
        $this->load->view("admin/overview", $data);
	}

    public function budget()
	{
        // load view admin/overview.php
        //echo '<pre>';
		$data["overview"] = $this->overview_model->getDistricts();
        $data["services"] = $this->overview_model->getServices();
        $data["temp_data"] = $this->overview_model->getTempData();
    
        $data["mapping_data"] = $this->overview_model->getMapping();
        $data['total_data'] = count($data["temp_data"]);
        foreach($data['temp_data'] as $temp){
            $anggaran = explode(':',$temp->rekomendasi_mitra_bappeda);
            $temp->anggaran = $anggaran[3];
            //print_r($anggaran);
            foreach($data['mapping_data'] as $mapping){
                // echo '<pre>';
                // print_r($mapping);
                // echo '</pre>';
                if(rtrim($mapping->name) == rtrim($temp->pengusul)){
                    // echo '<pre>';
                    // print_r($mapping->name);
                    // echo '</pre>';
                    $temp->district = $mapping->district;
                }
               // print_r($mapping->name);
            }
            //print_r($temp);
        }
        // echo '<pre>';
        //print_r($data['temp_data']);
        // echo '</pre>';
        $total_anggaran = 0;
        foreach($data['overview'] as $overview){
            $overview->dinkes = 0;
            $overview->disdik = 0;
            $overview->disperkimtan = 0;
            $overview->dputr = 0;
            $overview->dlh = 0;
            $overview->disdamkar = 0;
            $overview->dinsos = 0;
            $overview->diskopukm = 0;
            $overview->disnaker = 0;
            $overview->dispangkan = 0;
            $overview->disparbud = 0;
            $overview->dispora = 0;
            $overview->distan = 0;
            $overview->total = 0;
            //print_r($overview->name);
            foreach($data['temp_data'] as $temp){
                //print_r($temp->district);
               if(rtrim($temp->district) == (rtrim($overview->name))){
                    //print_r($overview->name);
                    if(rtrim($temp->opd_tujuan) == 'DINAS KESEHATAN'){
                        $overview->dinkes += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PENDIDIKAN'){
                        $overview->disdik += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN DAN PERTANAHAN'){
                        $overview->disperkimtan += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS LINGKUNGAN HIDUP'){
                        $overview->dlh += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PEKERJAAN UMUM DAN TATA RUANG'){
                        $overview->dputr += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PEMADAMAN KEBAKARAN DAN PENYELAMATAN'){
                        $overview->disdamkar += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS SOSIAL'){
                        $overview->dinsos += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS KOPERASI DAN USAHA KECIL DAN MENENGAH'){
                        $overview->diskopukm += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS KETENAGAKERJAAN'){
                        $overview->disnaker += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PANGAN DAN PERIKANAN'){
                        $overview->dispangkan += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PARIWISATA DAN KEBUDAYAAN'){
                        $overview->disparbud += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PEMUDA DAN OLAH RAGA'){
                        $overview->dispora += (int) $temp->anggaran; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PERTANIAN'){
                        $overview->distan += (int) $temp->anggaran; 
                    }
                   $overview->total += (int) $temp->anggaran;
               }else{
                   //print_r('false');
               }
            }
            $total_anggaran += $overview->total;
            //if($overview->name)
        }
        $data['total_anggaran'] = $total_anggaran;
        //print_r($data['overview']);
        $this->load->view("admin/report/budget", $data);
	}
}
