<?php
/**
 * @package Phpspreadsheet :  Phpspreadsheet
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Phpspreadsheet Controller
 */

defined('BASEPATH') OR exit('No direct script access allowed');
//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Phpspreadsheet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// load model
		$this->load->model("Site_model", 'site');
		$this->load->model('overview_model');
	}
	// index
	public function index()
	{
		$data = array();
		$data['title'] = 'Import Excel Sheet | TechArise';
		$data['breadcrumbs'] = array('Home' => '#');
		$this->load->view('spreadsheet/index', $data);
	}
	
	// index
	public function pagu()
	{
		$data = array();
		$data['title'] = 'Import Excel Sheet | TechArise';
		$data['breadcrumbs'] = array('Home' => '#');
		$this->load->view('spreadsheet/pagu', $data);
	}

	// file upload functionality
    public function upload() {
		$this->site->deleteData();
    	$data = array();
        $data['title'] = 'Import Excel Sheet | TechArise';
        $data['breadcrumbs'] = array('Home' => '#');
    	 // Load form validation library
         $this->load->library('form_validation');
         $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
         if($this->form_validation->run() == false) {
            
            $this->load->view('spreadsheet/index', $data);
         } else {
            // If file uploaded
            if(!empty($_FILES['fileURL']['name'])) { 
            	// get file extension
            	$extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

            	if($extension == 'csv'){
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} elseif($extension == 'xlsx') {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
				}
				// file path
				//echo "<pre>";
				$spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
				$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
				//print_r($allDataInSheet);die();
				// array Count
				$arrayCount = count($allDataInSheet);
	            $flag = 0;
	            $createArray = array(
				 	'Tgl Usul',
					'Pengusul',
					'Profil',
					'Urusan',
					'Usulan',
					'Permasalahan',
					'Alamat',
					'OPD Tujuan',
					'Rekomendasi Mitra Bappeda',
					'Kategori Usulan',
					'Koefisien',
					'Rekomendasi Kelurahan/Desa',
					'Rekomendasi Kecamatan',
					'Rekomendasi SKPD',
					'Rekomendasi TAPD',
					'Status',
				);
	            $makeArray = array(
					'Tgl Usul' => 'Tgl Usul',
					'Pengusul' => 'Pengusul',
					'Profil' => 'Profil',
					'Urusan' => 'Urusan',
					'Usulan' => 'Usulan',
					'Permasalahan' => 'Permasalahan',
					'Alamat' => 'Alamat',
					'OPD Tujuan' => 'OPD Tujuan',
					'Rekomendasi Mitra Bappeda' => 'Rekomendasi Mitra Bappeda',
					'Kategori Usulan' => 'Kategori Usulan',
					'Koefisien' => 'Koefisien',
					'Rekomendasi Kelurahan/Desa' => 'Rekomendasi Kelurahan/Desa',
					'Rekomendasi Kecamatan' => 'Rekomendasi Kecamatan',
					'Rekomendasi SKPD' => 'Rekomendasi SKPD',
					'Rekomendasi TAPD' => 'Rekomendasi TAPD',
					'Status' => 'Status'
				);
	            $SheetDataKey = array();
	            foreach ($allDataInSheet as $dataInSheet) {
	                foreach ($dataInSheet as $key => $value) {
	                    if (in_array(trim($value), $createArray)) {
	                        //$value = preg_replace('/\s+/', '', $value);
							//print_r($value);
	                        $SheetDataKey[trim($value)] = $key;
	                    } 
	                }
	            }
				//print_r($SheetDataKey);die();
				// print_r($makeArray);die();
	            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
				//print_r($dataDiff);die();
	            if (empty($dataDiff)) {
                	$flag = 1;
            	}
				// print_r($flag);die();
            	// match excel sheet column
	            if ($flag == 1) {
	                for ($i = 2; $i <= $arrayCount; $i++) {
	                    $tgl_usul = $SheetDataKey['Tgl Usul'];
	                    $pengusul = $SheetDataKey['Pengusul'];
	                    $profil = $SheetDataKey['Profil'];
	                    $urusan = $SheetDataKey['Urusan'];
	                    $usulan = $SheetDataKey['Usulan'];
						$permasalahan = $SheetDataKey['Permasalahan'];
						$alamat = $SheetDataKey['Alamat'];
						$opd_tujuan = $SheetDataKey['OPD Tujuan'];
						$rekomendasi_mitra_bappeda = $SheetDataKey['Rekomendasi Mitra Bappeda'];
						$kategori_usulan = $SheetDataKey['Kategori Usulan'];
						$koefisien = $SheetDataKey['Koefisien'];
						$rekomendasi_desa = $SheetDataKey['Rekomendasi Kelurahan/Desa'];
						$rekomendasi_kecamatan = $SheetDataKey['Rekomendasi Kecamatan'];
						$rekomendasi_skpd = $SheetDataKey['Rekomendasi SKPD'];
						$rekomendasi_tapd = $SheetDataKey['Rekomendasi TAPD'];
						$status = $SheetDataKey['Status'];

	                    $tgl_usul = filter_var(trim($allDataInSheet[$i][$tgl_usul]), FILTER_SANITIZE_STRING);
	                    $pengusul = filter_var(trim($allDataInSheet[$i][$pengusul]), FILTER_SANITIZE_STRING);
	                    $profil = filter_var(trim($allDataInSheet[$i][$profil]), FILTER_SANITIZE_STRING);
	                    $urusan = filter_var(trim($allDataInSheet[$i][$urusan]), FILTER_SANITIZE_STRING);
						$usulan = filter_var(trim($allDataInSheet[$i][$usulan]), FILTER_SANITIZE_STRING);
						$permasalahan = filter_var(trim($allDataInSheet[$i][$permasalahan]), FILTER_SANITIZE_STRING);
						$alamat = filter_var(trim($allDataInSheet[$i][$alamat]), FILTER_SANITIZE_STRING);
						$opd_tujuan = filter_var(trim($allDataInSheet[$i][$opd_tujuan]), FILTER_SANITIZE_STRING);
						$rekomendasi_mitra_bappeda = filter_var(trim($allDataInSheet[$i][$rekomendasi_mitra_bappeda]), FILTER_SANITIZE_STRING);
						$kategori_usulan = filter_var(trim($allDataInSheet[$i][$kategori_usulan]), FILTER_SANITIZE_STRING);
						$koefisien = filter_var(trim($allDataInSheet[$i][$koefisien]), FILTER_SANITIZE_STRING);
						$rekomendasi_desa = filter_var(trim($allDataInSheet[$i][$rekomendasi_desa]), FILTER_SANITIZE_STRING);
						$rekomendasi_kecamatan = filter_var(trim($allDataInSheet[$i][$rekomendasi_kecamatan]), FILTER_SANITIZE_STRING);
						$rekomendasi_skpd = filter_var(trim($allDataInSheet[$i][$rekomendasi_skpd]), FILTER_SANITIZE_STRING);
						$rekomendasi_tapd = filter_var(trim($allDataInSheet[$i][$rekomendasi_tapd]), FILTER_SANITIZE_STRING);
						$status = filter_var(trim($allDataInSheet[$i][$status]), FILTER_SANITIZE_STRING);
						//print_r($pengusul);die();
						$fetchData[] = array(
							'tgl_usul' => $tgl_usul,
							'pengusul' => $pengusul,
							'profil' => $profil,
							'urusan' => $urusan,
							'usulan' => $usulan,
							'permasalahan' => $permasalahan,
							'alamat' => $alamat,
							'opd_tujuan' => $opd_tujuan,
							'rekomendasi_mitra_bappeda' => $rekomendasi_mitra_bappeda,
							'kategori_usulan' => $kategori_usulan,
							'koefisien' => $koefisien,
							'rekomendasi_desa' => $rekomendasi_desa,
							'rekomendasi_kecamatan' => $rekomendasi_kecamatan,
							'rekomendasi_skpd' => $rekomendasi_skpd,
							'rekomendasi_tapd' => $rekomendasi_tapd,
							'status' => $status
						);
	                }   
	                $data['dataInfo'] = $fetchData;
	                $this->site->setBatchImport($fetchData);
	                $this->site->importData();
	            } else {
	                echo "Please import correct file, did not match excel sheet column";
	            }
	            $this->load->view('spreadsheet/display', $data);
        	}              
    	}
	}

	// file upload functionality
    public function uploadPagu() {
		$this->site->deleteDataPagu();
    	$data = array();
        $data['title'] = 'Import Excel Sheet | TechArise';
        $data['breadcrumbs'] = array('Home' => '#');
    	 // Load form validation library
         $this->load->library('form_validation');
         $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
         if($this->form_validation->run() == false) {
            
            $this->load->view('spreadsheet/index', $data);
         } else {
            // If file uploaded
            if(!empty($_FILES['fileURL']['name'])) { 
            	// get file extension
            	$extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

            	if($extension == 'csv'){
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} elseif($extension == 'xlsx') {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
				}
				// file path
				//echo "<pre>";
				$spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
				$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
				//print_r($allDataInSheet);die();
				// array Count
				$arrayCount = count($allDataInSheet);
	            $flag = 0;
	            $createArray = array(
				 	'Kecamatan',
					'Dinkes',
					'Disdik',
					'Disperkimtan',
					'DLH',
					'DPUTR',
					'Disdamkar',
					'Dinsos',
					'DiskopUKM',
					'Disnaker',
					'Dispakan',
					'Disparbud',
					'Dispora',
					'Distan',
				);
	            $makeArray = array(
					'Kecamatan' => 'Kecamatan',
					'Dinkes' => 'Dinkes',
					'Disdik' => 'Disdik', 
					'Disperkimtan' => 'Disperkimtan',
					'DLH' => 'DLH',
					'DPUTR' => 'DPUTR',
					'Disdamkar' => 'Disdamkar' ,
					'Dinsos' => 'Dinsos',
					'DiskopUKM' => 'DiskopUKM',
					'Disnaker' => 'Disnaker',
					'Dispakan' => 'Dispakan',
					'Disparbud' => 'Disparbud',
					'Dispora' => 'Dispora',
					'Distan' => 'Distan',
				);
	            $SheetDataKey = array();
	            foreach ($allDataInSheet as $dataInSheet) {
	                foreach ($dataInSheet as $key => $value) {
	                    if (in_array(trim($value), $createArray)) {
	                        $SheetDataKey[trim($value)] = $key;
	                    } 
	                }
	            }
	            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
	            if (empty($dataDiff)) {
                	$flag = 1;
            	}
	            if ($flag == 1) {
	                for ($i = 2; $i <= $arrayCount; $i++) {
	                    $kecamatan = $SheetDataKey['Kecamatan'];
	                    $dinkes = $SheetDataKey['Dinkes'];
	                    $disdik = $SheetDataKey['Disdik'];
	                    $disperkimtan = $SheetDataKey['Disperkimtan'];
	                    $dlh = $SheetDataKey['DLH'];
						$dputr = $SheetDataKey['DPUTR'];
						$disdamkar = $SheetDataKey['Disdamkar'];
						$dinsos = $SheetDataKey['Dinsos'];
						$diskopukm = $SheetDataKey['DiskopUKM'];
						$disnaker = $SheetDataKey['Disnaker'];
						$dispakan = $SheetDataKey['Dispakan'];
						$disparbud = $SheetDataKey['Disparbud'];
						$dispora = $SheetDataKey['Dispora'];
						$distan = $SheetDataKey['Distan'];

	                    $kecamatan = filter_var(trim($allDataInSheet[$i][$kecamatan]), FILTER_SANITIZE_STRING);
	                    $dinkes = filter_var(trim($allDataInSheet[$i][$dinkes]), FILTER_SANITIZE_NUMBER_INT);
	                    $disdik = filter_var(trim($allDataInSheet[$i][$disdik]), FILTER_SANITIZE_NUMBER_INT);
	                    $disperkimtan = filter_var(trim($allDataInSheet[$i][$disperkimtan]), FILTER_SANITIZE_NUMBER_INT);
						$dlh = filter_var(trim($allDataInSheet[$i][$dlh]), FILTER_SANITIZE_NUMBER_INT);
						$dputr = filter_var(trim($allDataInSheet[$i][$dputr]), FILTER_SANITIZE_NUMBER_INT);
						$disdamkar = filter_var(trim($allDataInSheet[$i][$disdamkar]), FILTER_SANITIZE_NUMBER_INT);
						$dinsos = filter_var(trim($allDataInSheet[$i][$dinsos]), FILTER_SANITIZE_NUMBER_INT);
						$diskopukm = filter_var(trim($allDataInSheet[$i][$diskopukm]), FILTER_SANITIZE_NUMBER_INT);
						$disnaker = filter_var(trim($allDataInSheet[$i][$disnaker]), FILTER_SANITIZE_NUMBER_INT);
						$dispakan = filter_var(trim($allDataInSheet[$i][$dispakan]), FILTER_SANITIZE_NUMBER_INT);
						$disparbud = filter_var(trim($allDataInSheet[$i][$disparbud]), FILTER_SANITIZE_NUMBER_INT);
						$dispora = filter_var(trim($allDataInSheet[$i][$dispora]), FILTER_SANITIZE_NUMBER_INT);
						$distan = filter_var(trim($allDataInSheet[$i][$distan]), FILTER_SANITIZE_NUMBER_INT);
					
						$fetchData[] = array(
							'kecamatan' => $kecamatan,
							'dinkes' => $dinkes,
							'disdik' => $disdik,
							'disperkimtan' => $disperkimtan,
							'dlh' => $dlh,
							'dputr' => $dputr,
							'disdamkar' => $disdamkar,
							'dinsos' => $dinsos,
							'diskopukm' => $diskopukm,
							'disnaker' => $disnaker,
							'dispakan' => $dispakan,
							'disparbud' => $disparbud,
							'dispora' => $dispora,
							'distan' => $distan,
						);
	                }   
	                $data['dataInfo'] = $fetchData;
	                $this->site->setBatchImport($fetchData);
	                $this->site->importDataPagu();
	            } else {
	                echo "Please import correct file, did not match excel sheet column";
	            }
	            $this->load->view('spreadsheet/display_pagu', $data);
        	}              
    	}
	}

	// checkFileValidation
    public function checkFileValidation($string) {
      $file_mimes = array('text/x-comma-separated-values', 
      	'text/comma-separated-values', 
      	'application/octet-stream', 
      	'application/vnd.ms-excel', 
      	'application/x-csv', 
      	'text/x-csv', 
      	'text/csv', 
      	'application/csv', 
      	'application/excel', 
      	'application/vnd.msexcel', 
      	'text/plain', 
      	'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      );
      if(isset($_FILES['fileURL']['name'])) {
			$arr_file = explode('.', $_FILES['fileURL']['name']);
			$extension = end($arr_file);
            if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)){
                return true;
            }else{
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }


	public function downloadListUsulan(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Tgl Usul');
		$sheet->setCellValue('B1', 'Pengusul');
		$sheet->setCellValue('C1', 'Profil');
		$sheet->setCellValue('D1', 'Kecamatan');
		$sheet->setCellValue('E1', 'Urusan');
		$sheet->setCellValue('F1', 'Usulan');
		$sheet->setCellValue('G1', 'Permasalahan');
		$sheet->setCellValue('H1', 'Alamat');
		$sheet->setCellValue('I1', 'OPD Tujuan');
		$sheet->setCellValue('J1', 'Rekomendasi Mitra Bappeda');
		$sheet->setCellValue('K1', 'Kategori Usulan');
		$sheet->setCellValue('L1', 'Koefisien');
		$sheet->setCellValue('M1', 'Rekomendasi Desa');
		$sheet->setCellValue('N1', 'Rekomendasi Kecamatan');
		$sheet->setCellValue('O1', 'Rekomendasi SKPD');
		$sheet->setCellValue('P1', 'Rekomendasi TAPD');
		$sheet->setCellValue('Q1', 'Status');
		$sheet->setCellValue('R1', 'Anggaran');
		$spreadsheet->getActiveSheet()->getStyle('A1:R1')->getFont()->setBold(true);
		$data["temp_data"] = $this->overview_model->getTempData();
		$data["mapping_data"] = $this->overview_model->getMapping();
		$i = 2;
		$no = 1;
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

			$sheet->setCellValue('A'.$i, $temp->tgl_usul);
			$sheet->setCellValue('B'.$i, $temp->pengusul);
			$sheet->setCellValue('C'.$i, $temp->profil);
			$sheet->setCellValue('D'.$i, $temp->district);
			$sheet->setCellValue('E'.$i, $temp->urusan);
			$sheet->setCellValue('F'.$i, $temp->usulan);
			$sheet->setCellValue('G'.$i, $temp->permasalahan);
			$sheet->setCellValue('H'.$i, $temp->alamat);
			$sheet->setCellValue('I'.$i, $temp->opd_tujuan);
			$sheet->setCellValue('J'.$i, $temp->rekomendasi_mitra_bappeda);
			$sheet->setCellValue('K'.$i, $temp->kategori_usulan);
			$sheet->setCellValue('L'.$i, $temp->koefisien);
			$sheet->setCellValue('M'.$i, $temp->rekomendasi_desa);
			$sheet->setCellValue('N'.$i, $temp->rekomendasi_kecamatan);
			$sheet->setCellValue('O'.$i, $temp->rekomendasi_skpd);
			$sheet->setCellValue('P'.$i, $temp->rekomendasi_tapd);
			$sheet->setCellValue('Q'.$i, $temp->status);
			$sheet->setCellValue('R'.$i, $temp->anggaran);
			$i++;
		}

		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="file.xlsx"');
		$writer->save("php://output");
    }

}
