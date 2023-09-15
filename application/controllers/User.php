<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('user/user_list', $data);
         $data['page'] = 'user/user_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'nipos' => $row->nipos,
		'hak_akses' => $row->hak_akses,
		'nama' => $row->nama,
		'username' => $row->username,
		'email' => $row->email,
		'password' => $row->password,
		'no_telp' => $row->no_telp,
		'nopen' => $row->nopen,
		'status_pegawai' => $row->status_pegawai,
	    );
            //$this->load->view('user/user_read', $data);
            $data['page'] = 'user/user_read';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id_user' => set_value('id_user'),
	    'nipos' => set_value('nipos'),
	    'hak_akses' => set_value('hak_akses'),
	    'nama' => set_value('nama'),
	    'username' => set_value('username'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'no_telp' => set_value('no_telp'),
	    'nopen' => set_value('nopen'),
	    'status_pegawai' => set_value('status_pegawai'),
	);
        //$this->load->view('user/user_form', $data);
        $data['page'] = 'user/user_form';
        $this->load->view('template',$data );
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nipos' => $this->input->post('nipos',TRUE),
		'hak_akses' => $this->input->post('hak_akses',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'nopen' => $this->input->post('nopen',TRUE),
		'status_pegawai' => $this->input->post('status_pegawai',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'nipos' => set_value('nipos', $row->nipos),
		'hak_akses' => set_value('hak_akses', $row->hak_akses),
		'nama' => set_value('nama', $row->nama),
		'username' => set_value('username', $row->username),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'nopen' => set_value('nopen', $row->nopen),
		'status_pegawai' => set_value('status_pegawai', $row->status_pegawai),
	    );
            //$this->load->view('user/user_form', $data);
            $data['page'] = 'user/user_form';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'nipos' => $this->input->post('nipos',TRUE),
		'hak_akses' => $this->input->post('hak_akses',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'nopen' => $this->input->post('nopen',TRUE),
		'status_pegawai' => $this->input->post('status_pegawai',TRUE),
	    );

            $this->User_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nipos', 'nipos', 'trim|required');
	$this->form_validation->set_rules('hak_akses', 'hak akses', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('nopen', 'nopen', 'trim|required');
	$this->form_validation->set_rules('status_pegawai', 'status pegawai', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nipos");
	xlsWriteLabel($tablehead, $kolomhead++, "Hak Akses");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Nopen");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Pegawai");

	foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nipos);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hak_akses);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nopen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_pegawai);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-09 04:05:22 */
/* http://harviacode.com */