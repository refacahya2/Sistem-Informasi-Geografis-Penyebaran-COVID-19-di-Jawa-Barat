<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tambahModel extends CI_Model{
    function get(){
		$data=$this->db->get_where('t_kasus',array('positif'=>'0','sembuh'=>'0','mati'=>'0'));
        return $data;
	}
	function get_tanggal(){
		$current = date('m/d/Y h:i:s a', time());
		$data=$this->db->get('t_kasus',array('tanggal'=>'$current'));
        return $data;
	}
    function insert($data=array()){
    $this->db->insert('t_kasus',$data);
    $info='<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
    $this->session->set_flashdata('info',$info);
    }
    function update($data=array(),$where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->insert('t_kasus',$data);
		$info='<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses diubah </div>';
	    $this->session->set_flashdata('info',$info);
    }
    function delete($where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->delete('t_kasus');
		$info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses dihapus </div>';
	    $this->session->set_flashdata('info',$info);
}
}