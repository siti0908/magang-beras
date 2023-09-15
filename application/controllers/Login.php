<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('MUser');
    }

        public function index() 
    
    {
        $this->load->view('Login_view');
    }

function register()
{
    $this->load->view('register');
}

function reg_save()
{
    // load model
    $this->load->model(array('MUser', 'MKeys'));
    $nama_lengkap = $this->input->post ('nama_lengkap');
    $username = $this->input->post ('username');
    $password = $this->input->post ('password');

    //simpan data ke table user
    $data_user = array(
        'nama_lengkap'=>$nama_lengkap,
        'username'=>$username,
        'password'=>$password
    );
    $id_user = $this->MUser->insert($data_user);

    //simpan data ke table key
    $data_keys = array(
        'user_id' => $id_user,
        'key' => md5(date('y-m-d H:i:s')),
        'level' => '1',
        'date_created' => '1'
    );
    $this->MKeys->insert($data_keys);
    redirect ('Dashboard/#login');
}

// function validasi()
// {
//     $this->load->model('MUser');
//     $u = $this->input->post('username');
//     $p = $this->input->post('password');

//     $hasil_validasi = $this->MUser->login($u,$p);
//     if($hasil_validasi){
//         echo "Login Berhasil";
//         $res = $this->MUser->get_key($u);
//         echo "<br> Key Anda Adalah : " .$res->key;

//     } else{
//         echo  " Login Gagal";
//     }

    
    // function validasi()
    // {
    //     $this->load->model('MUser');
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     if ($this->MUser->login($username, $password) == true) {
    //         //echo "Username Dan Password Benar";  
    //         $row = $this->MUser->get_by_username($username);
    //         //print_r($row);
    //         $data_user = array(
    //             'username' => $username,
    //             'user_id' => $row->id,
    //             'hak_akses' => $row->hak_akses,
    //             'is_login' => true,
    //         );
    //             $this->session->set_userdata($data_user);
    //             redirect('Dashboard2');
    //     } else {
    //         //echo "Usename dan Password Salah";
    //         $this->session->set_flashdata('pesan', 'Username Atau Passowrd Salah!');
    //         redirect('Login');
        
           
    //     }
    //     exit;
    // }


    function validasi()
    {
       
        $username =$this->input->post('username');
        $password =$this->input->post('password');
        if ($this->MUser->CheckUser($username, $password) == true){
            //echo "Usename dan Password Benar";
            $row =$this->MUser->get_by_username($username);
            //print_r($row); exit;
            $data_user=array(
                'nama' =>$row->nama,
                'username' =>$username,
                'hak_akses'=>$row->hak_akses,
                'is_Login'=>true,
            );
            $this->session->set_userdata($data_user);
            redirect('Dashboard');
            exit;
        } else {
            //echo "Usename dan Password Salah";
            $this->session->set_flashdata('pesan', 'Username atau Password Anda Salah');
            redirect ('Login');
            exit;
        }
        //exit;
    }
    function logout()
    {
        session_destroy();
        redirect('Login');
    }

    
}