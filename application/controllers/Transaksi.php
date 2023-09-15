<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MTransaksi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/index.html';
            $config['first_url'] = base_url() . 'transaksi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MTransaksi->total_rows($q);
        $transaksi = $this->MTransaksi->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('transaksi/transaksi_list', $data);
        $data['page'] = 'transaksi/transaksi_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MTransaksi->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaksi' => $row->id_transaksi,
		'tgl_transaksi' => $row->tgl_transaksi,
		'id_pengirim' => $row->id_pengirim,
		'alamat_pengirim' => $row->alamat_pengirim,
		'no_tlp_pengirim' => $row->no_tlp_pengirim,
		'id_barang' => $row->id_barang,
		'berat' => $row->berat,
		'id_penerima' => $row->id_penerima,
		'alamat_penerima' => $row->alamat_penerima,
		'no_tlp_penerima' => $row->no_tlp_penerima,
		'harga' => $row->harga,
	    );
            // $this->load->view('transaksi/transaksi_read', $data);
            $data['page'] = 'transaksi/transaksi_read';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'tgl_transaksi' => set_value('tgl_transaksi'),
	    'id_pengirim' => set_value('id_pengirim'),
	    'alamat_pengirim' => set_value('alamat_pengirim'),
	    'no_tlp_pengirim' => set_value('no_tlp_pengirim'),
	    'id_barang' => set_value('id_barang'),
	    'berat' => set_value('berat'),
	    'id_penerima' => set_value('id_penerima'),
	    'alamat_penerima' => set_value('alamat_penerima'),
	    'no_tlp_penerima' => set_value('no_tlp_penerima'),
	    'harga' => set_value('harga'),
	);
        // $this->load->view('transaksi/transaksi_form', $data);
        $data['page'] = 'transaksi/transaksi_form';
        $this->load->view('template',$data );
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		// 'tgl_transaksi' => $this->input->post('tgl_transaksi',TRUE),
		'id_pengirim' => $this->input->post('id_pengirim',TRUE),
		'alamat_pengirim' => $this->input->post('alamat_pengirim',TRUE),
		'no_tlp_pengirim' => $this->input->post('no_tlp_pengirim',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'berat' => $this->input->post('berat',TRUE),
		'id_penerima' => $this->input->post('id_penerima',TRUE),
		'alamat_penerima' => $this->input->post('alamat_penerima',TRUE),
		'no_tlp_penerima' => $this->input->post('no_tlp_penerima',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->MTransaksi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MTransaksi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
		'id_pengirim' => set_value('id_pengirim', $row->id_pengirim),
		'alamat_pengirim' => set_value('alamat_pengirim', $row->alamat_pengirim),
		'no_tlp_pengirim' => set_value('no_tlp_pengirim', $row->no_tlp_pengirim),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'berat' => set_value('berat', $row->berat),
		'id_penerima' => set_value('id_penerima', $row->id_penerima),
		'alamat_penerima' => set_value('alamat_penerima', $row->alamat_penerima),
		'no_tlp_penerima' => set_value('no_tlp_penerima', $row->no_tlp_penerima),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->load->view('transaksi/transaksi_form', $data);
            $data['page'] = 'transaksi/transaksi_form';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		// 'tgl_transaksi' => $this->input->post('tgl_transaksi',TRUE),
		'id_pengirim' => $this->input->post('id_pengirim',TRUE),
		'alamat_pengirim' => $this->input->post('alamat_pengirim',TRUE),
		'no_tlp_pengirim' => $this->input->post('no_tlp_pengirim',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'berat' => $this->input->post('berat',TRUE),
		'id_penerima' => $this->input->post('id_penerima',TRUE),
		'alamat_penerima' => $this->input->post('alamat_penerima',TRUE),
		'no_tlp_penerima' => $this->input->post('no_tlp_penerima',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->MTransaksi->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MTransaksi->get_by_id($id);

        if ($row) {
            $this->MTransaksi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('tgl_transaksi', 'tgl transaksi', 'trim|required');
	$this->form_validation->set_rules('id_pengirim', 'id pengirim', 'trim|required');
	$this->form_validation->set_rules('alamat_pengirim', 'alamat pengirim', 'trim|required');
	$this->form_validation->set_rules('no_tlp_pengirim', 'no tlp pengirim', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('berat', 'berat', 'trim|required');
	$this->form_validation->set_rules('id_penerima', 'id penerima', 'trim|required');
	$this->form_validation->set_rules('alamat_penerima', 'alamat penerima', 'trim|required');
	$this->form_validation->set_rules('no_tlp_penerima', 'no tlp penerima', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "transaksi.xls";
        $judul = "transaksi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Transaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pengirim");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Pengirim");
	xlsWriteLabel($tablehead, $kolomhead++, "No Tlp Pengirim");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Berat");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Penerima");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Penerima");
	xlsWriteLabel($tablehead, $kolomhead++, "No Tlp Penerima");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");

	foreach ($this->MTransaksi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_transaksi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pengirim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_pengirim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_tlp_pengirim);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->berat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_penerima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_penerima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_tlp_penerima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-16 04:56:03 */
/* http://harviacode.com */