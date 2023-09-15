<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sbrg_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MSbrg_masuk');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sbrg_masuk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sbrg_masuk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sbrg_masuk/index.html';
            $config['first_url'] = base_url() . 'sbrg_masuk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MSbrg_masuk->total_rows($q);
        $sbrg_masuk = $this->MSbrg_masuk->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sbrg_masuk_data' => $sbrg_masuk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('sbrg_masuk/sbrg_masuk_list', $data);
        $data['page'] = 'sbrg_masuk/sbrg_masuk_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MSbrg_masuk->get_by_id($id);
        if ($row) {
            $data = array(
		'id_masuk' => $row->id_masuk,
		// 'tgl' => $row->tgl,
		'kg' => $row->kg,
		'keterangan' => $row->keterangan,
		'dokumentasi' => $row->dokumentasi,
	    );
            // $this->load->view('sbrg_masuk/sbrg_masuk_read', $data);
             $data['page'] = 'sbrg_masuk/sbrg_masuk_read';
        $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sbrg_masuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sbrg_masuk/create_action'),
	    'id_masuk' => set_value('id_masuk'),
	    // 'tgl' => set_value('tgl'),
	    'kg' => set_value('kg'),
	    'keterangan' => set_value('keterangan'),
	    'dokumentasi' => set_value('dokumentasi'),
	);
        // $this->load->view('sbrg_masuk/sbrg_masuk_form', $data);
         $data['page'] = 'sbrg_masuk/sbrg_masuk_form';
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
		'kg' => $this->input->post('kg',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		
	    );

            $this->MSbrg_masuk->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sbrg_masuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MSbrg_masuk->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sbrg_masuk/update_action'),
		'id_masuk' => set_value('id_masuk', $row->id_masuk),
		// 'tgl' => set_value('tgl', $row->tgl),
		'kg' => set_value('kg', $row->kg),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'dokumentasi' => set_value('dokumentasi', $row->dokumentasi),
	    );
            // $this->load->view('sbrg_masuk/sbrg_masuk_form', $data);
             $data['page'] = 'sbrg_masuk/sbrg_masuk_form';
             $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sbrg_masuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_masuk', TRUE));
        } else {
            $data = array(
		// 'tgl' => $this->input->post('tgl',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'dokumentasi' => $this->input->post('dokumentasi',TRUE),
	    );

            $this->MSbrg_masuk->update($this->input->post('id_masuk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sbrg_masuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MSbrg_masuk->get_by_id($id);

        if ($row) {
            $this->MSbrg_masuk->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sbrg_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sbrg_masuk'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('kg', 'kg', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	// $this->form_validation->set_rules('dokumentasi', 'dokumentasi', 'trim|required');

	$this->form_validation->set_rules('id_masuk', 'id_masuk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sbrg_masuk.xls";
        $judul = "sbrg_masuk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kg");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Dokumentasi");

	foreach ($this->MSbrg_masuk->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    // xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kg);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dokumentasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Sbrg_masuk.php */
/* Location: ./application/controllers/Sbrg_masuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-27 05:07:34 */
/* http://harviacode.com */