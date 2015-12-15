<?php
class Pms_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function SetData($table,$data)
	{
		$qry=$this->db->insert($table,$data);
		$last_id = $this->db->insert_id();
		return $last_id;
	
	}
	
	function GetMultipleData($table)
	{
		$this->db->select('*');
		$qry=$this->db->get($table);
		return $qry->result();
	}
	
	public function GetSingleData($table,$filter)
	{
		$this->db->select('*');
		$qry=$this->db->get_where($table,$filter);
		return $qry->result();
	}
	
	function UpdateSingleData($table=false,$data=false,$filter=false)
	{
		$this->db->where($filter);
		$qry=$this->db->update($table,$data);
		return $qry;
	}
	
	function DeleteSingleData($table=false,$filter=false)
	{
		$this->db->where($filter);
		$qry=$this->db->delete($table);
		return $qry;
	}
}