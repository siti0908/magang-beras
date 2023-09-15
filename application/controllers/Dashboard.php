<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{
		$data['page'] = 'dashboard_view';
		//ini buat dashboard awal
		$data['kg']=$this->db->query("SELECT SUM(kg) as total from Sstock_brg")->row()->total;
		// $data['jml_masuk']=$this->db->query("SELECT SUM(kg) as total from Sbrg_masuk")->row()->total;
		$data['jml_keluar']=$this->db->query("SELECT SUM(kg) as total from Sbrg_keluar")->row()->total;
		
		$data['sbrg_keluar_data'] = $this->db->query("SELECT * FROM Sbrg_keluar LIMIT 5")->result();
		$data['sbrg_masuk_data'] = $this->db->query("SELECT * FROM Sbrg_masuk LIMIT 5")->result();
		$data['bulog_data'] = $this->db->query("SELECT * FROM Bulog LIMIT 5")->result();
		$data['stok_data'] = $this->db->query("SELECT * FROM Stok LIMIT 5")->result();
		$data['supply_point_data'] = $this->db->query("SELECT * FROM Supply_point LIMIT 5")->result();

         // ini buat dashboard 2
		// $data['stok1']=$this->db->query("SELECT SUM(kg) as total from Stok")->row()->total;
		// $data['stok2']=$this->db->query("SELECT SUM(berat) from Alokasi")->row();
		$data['stok1']=$this->db->query("SELECT SUM(berat) as total from Alokasi where supply_point='bulog'")->row()->total;
		$data['stok2']=$this->db->query("SELECT SUM(kg) as total from Bulog")->row()->total;

		// ini buat Manokwari
		$data['stok3']=$this->db->query("SELECT SUM(berat) as total from Alokasi where supply_point='Manokwari'")->row()->total;
		$data['stok4']=$this->db->query("SELECT SUM(kg) as total from Supply_point where id_bulog=24")->row()->total;

		// ini buat SORONG
		$data['stok5']=$this->db->query("SELECT SUM(berat) as total from Alokasi where supply_point='Sorong'")->row()->total;
		$data['stok6']=$this->db->query("SELECT SUM(kg) as total from Supply_point where id_bulog=23")->row()->total;

		// ini buat Fakfak
		$data['stok7']=$this->db->query("SELECT SUM(berat) as total from Alokasi where supply_point='Fakfak'")->row()->total;
		$data['stok8']=$this->db->query("SELECT SUM(kg) as total from Supply_point where id_bulog=22")->row()->total;



         // ini buat dashboard 2
		$data['fakfak']=$this->db->query("SELECT SUM(kg) as total from Bulog where supply_point = 'Fakfak'")->row()->total;
		$data['sorong']=$this->db->query("SELECT SUM(kg) as total from Bulog where supply_point = 'Sorong'")->row()->total;
		$data['manokwari']=$this->db->query("SELECT SUM(kg) as total from Bulog where supply_point = 'Manokwari'")->row()->total;
		$this->load->view('template',$data );
	}
	public function chart_data() {
		$data = $this->chart_model->chart_database();
		echo json_encode($data);
	}
}
