<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MStok');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'stok/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'stok/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'stok/index.html';
            $config['first_url'] = base_url() . 'stok/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MStok->total_rows($q);
        $stok = $this->MStok->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'stok_data' => $stok,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('stok/stok_list', $data);
         $data['page'] = 'stok/stok_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MStok->get_by_id($id);
        if ($row) {
            $data = array(
		'id_stok_bulog' => $row->id_stok_bulog,
		'tgl' => $row->tgl,
		'kg' => $row->kg,
		'keterangan' => $row->keterangan,
		'dokumentasi' => $row->dokumentasi,
	    );
            // $this->load->view('stok/stok_read', $data);
             $data['page'] = 'stok/stok_read';
        $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('stok/create_action'),
	    'id_stok_bulog' => set_value('id_stok_bulog'),
	    // 'tgl' => set_value('tgl'),
	    'kg' => set_value('kg'),
	    'keterangan' => set_value('keterangan'),
	    'dokumentasi' => set_value('dokumentasi'),
	);
        // $this->load->view('stok/stok_form', $data);
         $data['page'] = 'stok/stok_form';
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
		// 'tgl' => $this->input->post('tgl',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'dokumentasi' => $dokumentasi,
	    );

            $this->MStok->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('stok'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MStok->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stok/update_action'),
		'id_stok_bulog' => set_value('id_stok_bulog', $row->id_stok_bulog),
		// 'tgl' => set_value('tgl', $row->tgl),
		'kg' => set_value('kg', $row->kg),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'dokumentasi' => set_value('dokumentasi', $row->dokumentasi),
	    );
            // $this->load->view('stok/stok_form', $data);
             $data['page'] = 'stok/stok_form';
        $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stok'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_stok_bulog', TRUE));
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
		// 'tgl' => $this->input->post('tgl',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'dokumentasi' => $dokumentasi,
	    );

            $this->MStok->update($this->input->post('id_stok_bulog', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('stok'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MStok->get_by_id($id);

        if ($row) {
            $this->MStok->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('stok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stok'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('kg', 'kg', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	// $this->form_validation->set_rules('dokumentasi', 'dokumentasi', 'trim|required');

	$this->form_validation->set_rules('id_stok_bulog', 'id_stok_bulog', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Stok.php */
/* Location: ./application/controllers/Stok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-05-08 11:45:26 */
/* http://harviacode.com */