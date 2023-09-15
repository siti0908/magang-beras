<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kabupaten extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('MKabupaten');
        $this->load->model(array('MKabupaten','MSupply_point'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kabupaten/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kabupaten/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kabupaten/index.html';
            $config['first_url'] = base_url() . 'kabupaten/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MKabupaten->total_rows($q);
        $kabupaten = $this->MKabupaten->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kabupaten_data' => $kabupaten,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('kabupaten/kabupaten_list', $data);
        $data['page'] = 'kabupaten/kabupaten_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MKabupaten->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kabupaten' => $row->id_kabupaten,
		'id_supply' => $row->id_supply,
		'nama_kabupaten' => $row->nama_kabupaten,
		'kg' => $row->kg,
		'tgl' => $row->tgl,
		'dokumentasi' => $row->dokumentasi,
	    );
            // $this->load->view('kabupaten/kabupaten_read', $data);
             $data['page'] = 'kabupaten/kabupaten_read';
             $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kabupaten'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kabupaten/create_action'),
	    'id_kabupaten' => set_value('id_kabupaten'),
	    'id_supply' => set_value('id_supply'),
	    'nama_kabupaten' => set_value('nama_kabupaten'),
	    'kg' => set_value('kg'),
	    // 'tgl' => set_value('tgl'),
	    'dokumentasi' => set_value('dokumentasi'),
	);
        // $this->load->view('kabupaten/kabupaten_form', $data);
          $data['list_supply_point'] =  $this->MSupply_point->get_all();
        $data['page'] = 'kabupaten/kabupaten_form';
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
		'id_supply' => $this->input->post('id_supply',TRUE),
		'nama_kabupaten' => $this->input->post('nama_kabupaten',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		// 'tgl' => $this->input->post('tgl',TRUE),
		'dokumentasi' => $dokumentasi,
	    );

            $this->MKabupaten->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kabupaten'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MKabupaten->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kabupaten/update_action'),
		'id_kabupaten' => set_value('id_kabupaten', $row->id_kabupaten),
		'id_supply' => set_value('id_supply', $row->id_supply),
		'nama_kabupaten' => set_value('nama_kabupaten', $row->nama_kabupaten),
		'kg' => set_value('kg', $row->kg),
		// 'tgl' => set_value('tgl', $row->tgl),
		'dokumentasi' => set_value('dokumentasi', $row->dokumentasi),
	    );
            // $this->load->view('kabupaten/kabupaten_form', $data);
             $data['list_supply_point'] =  $this->MSupply_point->get_all();
             $data['page'] = 'kabupaten/kabupaten_form';
             $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kabupaten'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kabupaten', TRUE));
        } else {
            $data = array(
		'id_supply' => $this->input->post('id_supply',TRUE),
		'nama_kabupaten' => $this->input->post('nama_kabupaten',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		// 'tgl' => $this->input->post('tgl',TRUE),
		'dokumentasi' => $this->input->post('dokumentasi',TRUE),
	    );

            $this->MKabupaten->update($this->input->post('id_kabupaten', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kabupaten'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MKabupaten->get_by_id($id);

        if ($row) {
            $this->MKabupaten->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kabupaten'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kabupaten'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_supply', 'id supply', 'trim|required');
	$this->form_validation->set_rules('nama_kabupaten', 'nama kabupaten', 'trim|required');
	$this->form_validation->set_rules('kg', 'kg', 'trim|required');
	// $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	// $this->form_validation->set_rules('dokumentasi', 'dokumentasi', 'trim|required');

	$this->form_validation->set_rules('id_kabupaten', 'id_kabupaten', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kabupaten.xls";
        $judul = "kabupaten";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Supply");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kabupaten");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Dokumentasi");

	foreach ($this->MKabupaten->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_supply);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kabupaten);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kg);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dokumentasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kabupaten.php */
/* Location: ./application/controllers/Kabupaten.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-05-08 10:20:47 */
/* http://harviacode.com */