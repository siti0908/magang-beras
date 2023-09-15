<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MAlokasi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'alokasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'alokasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'alokasi/index.html';
            $config['first_url'] = base_url() . 'alokasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MAlokasi->total_rows($q);
        $alokasi = $this->MAlokasi->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'alokasi_data' => $alokasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('alokasi/alokasi_list', $data);
        $data['page'] = 'alokasi/alokasi_list';
         $this->load->view('template',$data );
    }


    public function read($id) 
    {
        $row = $this->MAlokasi->get_by_id($id);
        if ($row) {
            $data = array(
		'id_alokasi' => $row->id_alokasi,
		'supply_point' => $row->supply_point,
		'berat' => $row->berat,
		'tgl' => $row->tgl,
		'dokumentasi' => $row->dokumentasi,
	    );
            // $this->load->view('alokasi/alokasi_read', $data);
            $data['page'] = 'alokasi/alokasi_read';
         $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alokasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('alokasi/create_action'),
	    'id_alokasi' => set_value('id_alokasi'),
	    'supply_point' => set_value('supply_point'),
	    'berat' => set_value('berat'),
	    // 'tgl' => set_value('tgl'),
	    'dokumentasi' => set_value('dokumentasi'),
	);
        // $this->load->view('alokasi/alokasi_form', $data);
        $data['page'] = 'alokasi/alokasi_form';
         $this->load->view('template',$data );
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'supply_point' => $this->input->post('supply_point',TRUE),
		'berat' => $this->input->post('berat',TRUE),
		// 'tgl' => $this->input->post('tgl',TRUE),
		'dokumentasi' => $this->input->post('dokumentasi',TRUE),
	    );

            $this->MAlokasi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('alokasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MAlokasi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('alokasi/update_action'),
		'id_alokasi' => set_value('id_alokasi', $row->id_alokasi),
		'supply_point' => set_value('supply_point', $row->supply_point),
		'berat' => set_value('berat', $row->berat),
		// 'tgl' => set_value('tgl', $row->tgl),
		'dokumentasi' => set_value('dokumentasi', $row->dokumentasi),
	    );
            // $this->load->view('alokasi/alokasi_form', $data);
            $data['page'] = 'alokasi/alokasi_form';
         $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alokasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_alokasi', TRUE));
        } else {
            $data = array(
		'supply_point' => $this->input->post('supply_point',TRUE),
		'berat' => $this->input->post('berat',TRUE),
		// 'tgl' => $this->input->post('tgl',TRUE),
		'dokumentasi' => $this->input->post('dokumentasi',TRUE),
	    );

            $this->MAlokasi->update($this->input->post('id_alokasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('alokasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MAlokasi->get_by_id($id);

        if ($row) {
            $this->MAlokasi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('alokasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alokasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('supply_point', 'supply point', 'trim|required');
	$this->form_validation->set_rules('berat', 'berat', 'trim|required');
	// $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('dokumentasi', 'dokumentasi', 'trim|required');

	$this->form_validation->set_rules('id_alokasi', 'id_alokasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "alokasi.xls";
        $judul = "alokasi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Supply Point");
	xlsWriteLabel($tablehead, $kolomhead++, "Berat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Dokumentasi");

	foreach ($this->MAlokasi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->supply_point);
	    xlsWriteNumber($tablebody, $kolombody++, $data->berat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dokumentasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Alokasi.php */
/* Location: ./application/controllers/Alokasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-05-09 06:55:35 */
/* http://harviacode.com */