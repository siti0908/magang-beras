<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supply_point extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
         $this->load->model(array('MSupply_point', 'MBulog'));
        // $this->load->model('MSupply_point');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'supply_point/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'supply_point/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'supply_point/index?q';
            $config['first_url'] = base_url() . 'supply_point/index?q';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MSupply_point->total_rows($q);
        $supply_point = $this->MSupply_point->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'supply_point_data' => $supply_point,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('supply_point/supply_point_list', $data);
           $data['page'] = 'supply_point/supply_point_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MSupply_point->get_by_id($id);
        if ($row) {
            $data = array(
		'id_supply' => $row->id_supply,
        'id_bulog' => $row->id_bulog,
		'kabupaten' => $row->kabupaten,
		'kg' => $row->kg,
		'tgl' => $row->tgl,
		'dokumentasi' => $row->dokumentasi,
	    );
            // $this->load->view('supply_point/supply_point_read', $data);
            $data['page'] = 'supply_point/supply_point_read';
        $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supply_point'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('supply_point/create_action'),
	    'id_supply' => set_value('id_supply'),
        'id_bulog' => set_value('id_bulog'),
	    'kabupaten' => set_value('kabupaten'),
	    'kg' => set_value('kg'),
	    // 'tgl' => set_value('tgl'),
	    'dokumentasi' => set_value('dokumentasi'),
	);
        // $this->load->view('supply_point/supply_point_form', $data);
        $data['list_bulog'] =  $this->MBulog->get_all();
        $data['page'] = 'supply_point/supply_point_form';
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
        'id_bulog' => $this->input->post('id_bulog',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		// 'tgl' => $this->input->post('tgl',TRUE),
                'dokumentasi' =>$dokumentasi,
		
	    );

            $this->MSupply_point->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('supply_point'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MSupply_point->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('supply_point/update_action'),
		'id_supply' => set_value('id_supply', $row->id_supply),
        'id_bulog' => set_value('id_bulog', $row->id_bulog),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
		'kg' => set_value('kg', $row->kg),
		// 'tgl' => set_value('tgl', $row->tgl),
		'dokumentasi' => set_value('dokumentasi', $row->dokumentasi),
	    );
            // $this->load->view('supply_point/supply_point_form', $data);
        $data['list_bulog'] =  $this->MBulog->get_all();

            $data['page'] = 'supply_point/supply_point_form';
        $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supply_point'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_supply', TRUE));
        } else {
            $data = array(
        'id_bulog' => $this->input->post('id_bulog',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'kg' => $this->input->post('kg',TRUE),
		// 'tgl' => $this->input->post('tgl',TRUE),
		'dokumentasi' => $this->input->post('dokumentasi',TRUE),
	    );

            $this->MSupply_point->update($this->input->post('id_supply', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('supply_point'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MSupply_point->get_by_id($id);

        if ($row) {
            $this->MSupply_point->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('supply_point'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supply_point'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('id_bulog', 'id bulog', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
	$this->form_validation->set_rules('kg', 'kg', 'trim|required');
	// $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	// $this->form_validation->set_rules('dokumentasi', 'dokumentasi', 'trim|required');

	$this->form_validation->set_rules('id_supply', 'id_supply', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "supply_point.xls";
        $judul = "supply_point";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Id Bulog");
	xlsWriteLabel($tablehead, $kolomhead++, "kabupaten");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Dokumentasi");

	foreach ($this->MSupply_point->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_bulog);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kabupaten);
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

/* End of file Supply_point.php */
/* Location: ./application/controllers/Supply_point.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-05-04 04:43:05 */
/* http://harviacode.com */