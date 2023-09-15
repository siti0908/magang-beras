<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bulog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('MBulog');
         $this->load->model(array( 'MBulog','MStok'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bulog/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bulog/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bulog/index.html';
            $config['first_url'] = base_url() . 'bulog/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MBulog->total_rows($q);
        $bulog = $this->MBulog->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bulog_data' => $bulog,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('bulog/bulog_list', $data);
         $data['page'] = 'bulog/bulog_list';
         $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MBulog->get_by_id($id);
        if ($row) {
            $data = array(
		'id_bulog' => $row->id_bulog,
		'id_stok_bulog' => $row->id_stok_bulog,
		'supply_point' => $row->supply_point,
		'kg' => $row->kg,
        'tgl' => $row->tgl,
		'dokumentasi' => $row->dokumentasi,
	    );
            // $this->load->view('bulog/bulog_read', $data);
            $data['page'] = 'bulog/bulog_read';
         $this->load->view('template',$data )
         ;
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bulog'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bulog/create_action'),
	    'id_bulog' => set_value('id_bulog'),
	    'id_stok_bulog' => set_value('id_stok_bulog'),
	    'supply_point' => set_value('supply_point'),
        'kg' => set_value('kg'),
	    'dokumentasi' => set_value('dokumentasi'),
	    // 'tgl' => set_value('tgl'),
	);
        // $this->load->view('bulog/bulog_form', $data);
        $data['list_stok'] =  $this->MStok->get_all();
        $data['page'] = 'bulog/bulog_form';
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
		'id_stok_bulog' => $this->input->post('id_stok_bulog',TRUE),
		'supply_point' => $this->input->post('supply_point',TRUE),
        'kg' => $this->input->post('kg',TRUE),
		
		// 'tgl' => $this->input->post('tgl',TRUE),
        'dokumentasi' => $dokumentasi,
	    );

            $this->MBulog->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bulog'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MBulog->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bulog/update_action'),
		'id_bulog' => set_value('id_bulog', $row->id_bulog),
		'id_stok_bulog' => set_value('id_stok_bulog', $row->id_stok_bulog),
		'supply_point' => set_value('supply_point', $row->supply_point),
        'kg' => set_value('kg', $row->kg),
		
		// 'tgl' => set_value('tgl', $row->tgl),
        'dokumentasi' => set_value('dokumentasi', $row->dokumentasi),
	    );
            // $this->load->view('bulog/bulog_form', $data);
        $data['list_stok'] =  $this->MBulog->get_all();
        $data['page'] = 'bulog/bulog_form';
        $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bulog'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bulog', TRUE));
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
		'id_stok_bulog' => $this->input->post('id_stok_bulog',TRUE),
		'supply_point' => $this->input->post('supply_point',TRUE),
        'kg' => $this->input->post('kg',TRUE),
		'dokumentasi' => $dokumentasi,
		// 'tgl' => $this->input->post('tgl',TRUE),
	    );

            $this->MBulog->update($this->input->post('id_bulog', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bulog'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MBulog->get_by_id($id);

        if ($row) {
            $this->MBulog->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bulog'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bulog'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_stok_bulog', 'id stok bulog', 'trim|required');
	$this->form_validation->set_rules('supply_point', 'supply point', 'trim|required');
    $this->form_validation->set_rules('kg', 'kg', 'trim|required');
	// $this->form_validation->set_rules('dokumentasi', 'dokumentasi', 'trim|required');
	// $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');

	$this->form_validation->set_rules('id_bulog', 'id_bulog', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "bulog.xls";
        $judul = "bulog";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Stok Bulog");
	xlsWriteLabel($tablehead, $kolomhead++, "Supply Point");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg");
    xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Dokumentasi");

	foreach ($this->MBulog->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_stok_bulog);
	    xlsWriteLabel($tablebody, $kolombody++, $data->supply_point);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kg);
        xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dokumentasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Bulog.php */
/* Location: ./application/controllers/Bulog.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-05-08 11:56:53 */
/* http://harviacode.com */