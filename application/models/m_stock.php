<?php

class M_stock extends CI_Model{
	public function tampil_data()
	{
		return $this->db->get('tb_stock');
	}

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table){
        return $this->db->get_where($table, $where);
    }

    // public function get_keyword($keyword){
    //     $this->db->select('*');
    //     $this->db->from('tb_stock');
    //     $this->db->like('tanggal', $keyword);
    //     return $this->db->get()->result();
    // }

}