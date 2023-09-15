<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kantor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MKantor');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kantor/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kantor/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kantor/index.html';
            $config['first_url'] = base_url() . 'kantor/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MKantor->total_rows($q);
        $kantor = $this->MKantor->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kantor_data' => $kantor,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('kantor/kantor_list', $data);
        $data['page'] = 'kantor/kantor_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MKantor->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kantor' => $row->id_kantor,
		'nopend' => $row->nopend,
		'nama' => $row->nama,
		'phone' => $row->phone,
		'alamat' => $row->alamat,
		'kode_pos' => $row->kode_pos,
		'nopend_kcu' => $row->nopend_kcu,
		'regional' => $row->regional,
		'nopend_kprk' => $row->nopend_kprk,
		'tipe_kantor' => $row->tipe_kantor,
	    );
            //$this->load->view('kantor/kantor_read', $data);
             $data['page'] = 'kantor/kantor_read';
             $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kantor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kantor/create_action'),
	    'id_kantor' => set_value('id_kantor'),
	    'nopend' => set_value('nopend'),
	    'nama' => set_value('nama'),
	    'phone' => set_value('phone'),
	    'alamat' => set_value('alamat'),
	    'kode_pos' => set_value('kode_pos'),
	    'nopend_kcu' => set_value('nopend_kcu'),
	    'regional' => set_value('regional'),
	    'nopend_kprk' => set_value('nopend_kprk'),
	    'tipe_kantor' => set_value('tipe_kantor'),
	);
        //$this->load->view('kantor/kantor_form', $data);
         $data['page'] = 'kantor/kantor_form';
        $this->load->view('template',$data );
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nopend' => $this->input->post('nopend',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kode_pos' => $this->input->post('kode_pos',TRUE),
		'nopend_kcu' => $this->input->post('nopend_kcu',TRUE),
		'regional' => $this->input->post('regional',TRUE),
		'nopend_kprk' => $this->input->post('nopend_kprk',TRUE),
		'tipe_kantor' => $this->input->post('tipe_kantor',TRUE),
	    );

            $this->MKantor->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kantor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MKantor->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kantor/update_action'),
		'id_kantor' => set_value('id_kantor', $row->id_kantor),
		'nopend' => set_value('nopend', $row->nopend),
		'nama' => set_value('nama', $row->nama),
		'phone' => set_value('phone', $row->phone),
		'alamat' => set_value('alamat', $row->alamat),
		'kode_pos' => set_value('kode_pos', $row->kode_pos),
		'nopend_kcu' => set_value('nopend_kcu', $row->nopend_kcu),
		'regional' => set_value('regional', $row->regional),
		'nopend_kprk' => set_value('nopend_kprk', $row->nopend_kprk),
		'tipe_kantor' => set_value('tipe_kantor', $row->tipe_kantor),
	    );
            //$this->load->view('kantor/kantor_form', $data);
             $data['page'] = 'kantor/kantor_form';
        $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kantor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kantor', TRUE));
        } else {
            $data = array(
		'nopend' => $this->input->post('nopend',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kode_pos' => $this->input->post('kode_pos',TRUE),
		'nopend_kcu' => $this->input->post('nopend_kcu',TRUE),
		'regional' => $this->input->post('regional',TRUE),
		'nopend_kprk' => $this->input->post('nopend_kprk',TRUE),
		'tipe_kantor' => $this->input->post('tipe_kantor',TRUE),
	    );

            $this->MKantor->update($this->input->post('id_kantor', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kantor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MKantor->get_by_id($id);

        if ($row) {
            $this->MKantor->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kantor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kantor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nopend', 'nopend', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required');
	$this->form_validation->set_rules('nopend_kcu', 'nopend kcu', 'trim|required');
	$this->form_validation->set_rules('regional', 'regional', 'trim|required');
	$this->form_validation->set_rules('nopend_kprk', 'nopend kprk', 'trim|required');
	$this->form_validation->set_rules('tipe_kantor', 'tipe kantor', 'trim|required');

	$this->form_validation->set_rules('id_kantor', 'id_kantor', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kantor.xls";
        $judul = "kantor";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nopend");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Pos");
	xlsWriteLabel($tablehead, $kolomhead++, "Nopend Kcu");
	xlsWriteLabel($tablehead, $kolomhead++, "Regional");
	xlsWriteLabel($tablehead, $kolomhead++, "Nopend Kprk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tipe Kantor");

	foreach ($this->MKantor->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nopend);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kode_pos);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nopend_kcu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->regional);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nopend_kprk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tipe_kantor);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kantor.php */
/* Location: ./application/controllers/Kantor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-09 04:10:46 */
/* http://harviacode.com */