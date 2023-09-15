<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sbrg_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MSbrg_keluar');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sbrg_keluar/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sbrg_keluar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sbrg_keluar/index.html';
            $config['first_url'] = base_url() . 'sbrg_keluar/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MSbrg_keluar->total_rows($q);
        $sbrg_keluar = $this->MSbrg_keluar->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sbrg_keluar_data' => $sbrg_keluar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('sbrg_keluar/sbrg_keluar_list', $data);
        $data['page'] = 'sbrg_keluar/sbrg_keluar_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MSbrg_keluar->get_by_id($id);
        if ($row) {
            $data = array(
		'id_keluar' => $row->id_keluar,
		// 'tgl' => $row->tgl,
		'kota_tujuan' => $row->kota_tujuan,
		'distrik' => $row->distrik,
		'kg' => $row->kg,
		'ekspedisi' => $row->ekspedisi,
		'dokumentasi' => $row->dokumentasi,
	    );
            // $this->load->view('sbrg_keluar/sbrg_keluar_read', $data);
            $data['page'] = 'sbrg_keluar/sbrg_keluar_read';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sbrg_keluar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sbrg_keluar/create_action'),
	    'id_keluar' => set_value('id_keluar'),
	    // 'tgl' => set_value('tgl'),
	    'kota_tujuan' => set_value('kota_tujuan'),
	    'distrik' => set_value('distrik'),
	    'kg' => set_value('kg'),
	    'ekspedisi' => set_value('ekspedisi'),
	    'dokumentasi' => set_value('dokumentasi'),
	);
        // $this->load->view('sbrg_keluar/sbrg_keluar_form', $data);
        $data['page'] = 'sbrg_keluar/sbrg_keluar_form';
        $this->load->view('template',$data );
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
             $dokumentasi = $_FILES['dokumentasi'];
            if($dokumentasi=''){}else{
            $config['upload_path']   ='./assets/foto';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|pdf|docx';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('dokumentasi')){
                echo "Upload Gagal"; die();
            }else{

                $dokumentasi=$this->upload->data('file_name');
                print_r($dokumentasi);
            }
        }


            $data = array(
                'dokumentasi' =>$dokumentasi,
          
		// 'tgl' => $this->input->post('tgl',TRUE),
		'kota_tujuan' => $this->input->post('kota_tujuan',TRUE),
		'distrik' => $this->input->post('distrik',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		'ekspedisi' => $this->input->post('ekspedisi',TRUE),
		
	    );

            $this->MSbrg_keluar->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sbrg_keluar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MSbrg_keluar->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sbrg_keluar/update_action'),
		'id_keluar' => set_value('id_keluar', $row->id_keluar),
		// 'tgl' => set_value('tgl', $row->tgl),
		'kota_tujuan' => set_value('kota_tujuan', $row->kota_tujuan),
		'distrik' => set_value('distrik', $row->distrik),
		'kg' => set_value('kg', $row->kg),
		'ekspedisi' => set_value('ekspedisi', $row->ekspedisi),
		'dokumentasi' => set_value('dokumentasi', $row->dokumentasi),
	    );
            // $this->load->view('sbrg_keluar/sbrg_keluar_form', $data);
            $data['page'] = 'sbrg_keluar/sbrg_keluar_form';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sbrg_keluar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_keluar', TRUE));
        } else {
            $data = array(
		// 'tgl' => $this->input->post('tgl',TRUE),
		'kota_tujuan' => $this->input->post('kota_tujuan',TRUE),
		'distrik' => $this->input->post('distrik',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		'ekspedisi' => $this->input->post('ekspedisi',TRUE),
		'dokumentasi' => $this->input->post('dokumentasi',TRUE),
	    );

            $this->MSbrg_keluar->update($this->input->post('id_keluar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sbrg_keluar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MSbrg_keluar->get_by_id($id);

        if ($row) {
            $this->MSbrg_keluar->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sbrg_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sbrg_keluar'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('kota_tujuan', 'kota tujuan', 'trim|required');
	$this->form_validation->set_rules('distrik', 'distrik', 'trim|required');
	$this->form_validation->set_rules('kg', 'kg', 'trim|required');
	$this->form_validation->set_rules('ekspedisi', 'ekspedisi', 'trim|required');
	// $this->form_validation->set_rules('dokumentasi', 'dokumentasi', 'trim|required');

	$this->form_validation->set_rules('id_keluar', 'id_keluar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sbrg_keluar.xls";
        $judul = "sbrg_keluar";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	// xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Distrik");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg");
	xlsWriteLabel($tablehead, $kolomhead++, "Ekspedisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Dokumentasi");

	foreach ($this->MSbrg_keluar->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    // xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota_tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->distrik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kg);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ekspedisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dokumentasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Sbrg_keluar.php */
/* Location: ./application/controllers/Sbrg_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-27 05:07:24 */
/* http://harviacode.com */