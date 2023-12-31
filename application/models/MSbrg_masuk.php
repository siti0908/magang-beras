<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MSbrg_masuk extends CI_Model
{

    public $table = 'sbrg_masuk';
    public $id = 'id_masuk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_masuk', $q);
	$this->db->or_like('tgl', $q);
	$this->db->or_like('kg', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('dokumentasi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_masuk', $q);
	$this->db->or_like('tgl', $q);
	$this->db->or_like('kg', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('dokumentasi', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file MSbrg_masuk.php */
/* Location: ./application/models/MSbrg_masuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-27 05:07:34 */
/* http://harviacode.com */