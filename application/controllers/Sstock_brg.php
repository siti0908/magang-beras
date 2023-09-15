<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sstock_brg extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MSstock_brg');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sstock_brg/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sstock_brg/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sstock_brg/index.html';
            $config['first_url'] = base_url() . 'sstock_brg/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MSstock_brg->total_rows($q);
        $sstock_brg = $this->MSstock_brg->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sstock_brg_data' => $sstock_brg,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('sstock_brg/sstock_brg_list', $data);
         $data['page'] = 'sstock_brg/sstock_brg_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MSstock_brg->get_by_id($id);
        if ($row) {
            $data = array(
		'id_stok' => $row->id_stok,
		// 'tgl_masuk' => $row->tgl_masuk,
		// 'nama_barang' => $row->nama_barang,
		'kg' => $row->kg,
		'keterangan' => $row->keterangan,
	    );
            // $this->load->view('sstock_brg/sstock_brg_read', $data);
            $data['page'] = 'sstock_brg/sstock_brg_read';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sstock_brg'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sstock_brg/create_action'),
	    'id_stok' => set_value('id_stok'),
	    // 'tgl_masuk' => set_value('tgl_masuk'),
	    // 'nama_barang' => set_value('nama_barang'),
	    'kg' => set_value('kg'),
	    'keterangan' => set_value('keterangan'),
	);
        // $this->load->view('sstock_brg/sstock_brg_form', $data);
        $data['page'] = 'sstock_brg/sstock_brg_form';
        $this->load->view('template',$data );
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		// 'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
		// 'nama_barang' => $this->input->post('nama_barang',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->MSstock_brg->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sstock_brg'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MSstock_brg->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sstock_brg/update_action'),
		'id_stok' => set_value('id_stok', $row->id_stok),
		'tgl_masuk' => set_value('tgl_masuk', $row->tgl_masuk),
		// 'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'kg' => set_value('kg', $row->kg),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            // $this->load->view('sstock_brg/sstock_brg_form', $data);
            $data['page'] = 'sstock_brg/sstock_brg_form';
        $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sstock_brg'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_stok', TRUE));
        } else {
            $data = array(
		'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->MSstock_brg->update($this->input->post('id_stok', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sstock_brg'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MSstock_brg->get_by_id($id);

        if ($row) {
            $this->MSstock_brg->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sstock_brg'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sstock_brg'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('tgl_masuk', 'tgl masuk', 'trim|required');
	$this->form_validation->set_rules('kg', 'kg', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_stok', 'id_stok', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sstock_brg.xls";
        $judul = "sstock_brg";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Masuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->MSstock_brg->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kg);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Sstock_brg.php */
/* Location: ./application/controllers/Sstock_brg.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-27 05:07:50 */
/* http://harviacode.com */