<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Import Model
 *
 * @author Coders Mag Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site_model extends CI_Model {
    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('temp_data', $data);
    }

    public function importDataPagu() {
        $data = $this->_batchImport;
        $this->db->insert_batch('budgets', $data);
    }

    // delete data
    public function deleteData() {
        $data = $this->_batchImport;
        $this->db->truncate('temp_data');
    }

    public function deleteDataPagu() {
        $data = $this->_batchImport;
        $this->db->truncate('budgets');
    }


    // get employee list
    public function employeeList() {
        $this->db->select(array(
            'e.tgl_usul', 
            'e.pengusul', 
            'e.profil', 
            'e.urusan', 
            'e.usulan', 
            'e.permasalahan',
            'e.alamat',
            'e.opd_tujuan',
            'e.rekomendasi_mitra_bappeda',
            'e.kategori_usulan',
            'e.koefisien',
            'e.rekomendasi_desa',
            'e.rekomendasi_kecamatan',
            'e.rekomendasi_skpd',
            'e.rekomendasi_tapd',
            'e.status',

        ));
        $this->db->from('temp_data as e');
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>