<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
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

        $this->load->view("admin/report/index", $data);
	}

    public function budget()
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
            foreach($data['temp_data'] as $temp){
               if(rtrim($temp->district) == (rtrim($overview->name))){
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

               }
            }
            $total_anggaran += $overview->total;
        }
        $data['total_anggaran'] = $total_anggaran;
        $this->load->view("admin/report/budget", $data);
	}

    public function proposal()
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
            foreach($data['temp_data'] as $temp){
               if(rtrim($temp->district) == (rtrim($overview->name))){
                    if(rtrim($temp->opd_tujuan) == 'DINAS KESEHATAN'){
                        $overview->dinkes += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PENDIDIKAN'){
                        $overview->disdik += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN DAN PERTANAHAN'){
                        $overview->disperkimtan += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS LINGKUNGAN HIDUP'){
                        $overview->dlh += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PEKERJAAN UMUM DAN TATA RUANG'){
                        $overview->dputr += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PEMADAMAN KEBAKARAN DAN PENYELAMATAN'){
                        $overview->disdamkar += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS SOSIAL'){
                        $overview->dinsos += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS KOPERASI DAN USAHA KECIL DAN MENENGAH'){
                        $overview->diskopukm += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS KETENAGAKERJAAN'){
                        $overview->disnaker += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PANGAN DAN PERIKANAN'){
                        $overview->dispangkan += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PARIWISATA DAN KEBUDAYAAN'){
                        $overview->disparbud += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PEMUDA DAN OLAH RAGA'){
                        $overview->dispora += 1; 
                    }
                    if(rtrim($temp->opd_tujuan) == 'DINAS PERTANIAN'){
                        $overview->distan += 1; 
                    }
                   $overview->total += 1; 
               }else{
               }
            }
            $total_anggaran += $overview->total;

        }
        $data['total_anggaran'] = $total_anggaran;

        $this->load->view("admin/report/proposal", $data);
	}
}
