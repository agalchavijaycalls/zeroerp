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

	public function last_location($imei=false)
	{
	
		$this->db->select('*');
		$this->db->where('imei',$imei);
		$qry=$this->db->get('tracking');
		return $qry->result();
	}
	
	public function tracking_detail($imei=false,$from=false,$to=false)
	{
		//echo $table;
		//echo $imei;
		//echo $from;
		//echo $to;
		//$from='2015-07-18';
		//$to='2015-07-30';
		//echo $a;
		//echo $a;die;
		//$start_deadline=20;
		//$end_deadline=22;
		//$this->db->select('*');
		//$this->db->where('imei',$imei);
		//$this->db->where('datetime >=', $start_deadline);
		//$this->db->where('datetime <=', $end_deadline);
		//$qry=$this->db->get($table);
		//print_r($qry);die;
		//return $qry->result();select * from person
		$this->load->database('default',TRUE);
		$qry=$this->db->query("select * from tracking where `imei`='".$imei."' and DATE(date) between '".$from."' and '".$to."' ");
		return $qry->result();
	
	}
	
	public function local_db($lat,$long)
	{
		$this->load->database('default',TRUE);
		$qry=$this->db->get_where('physical_address',array('Latitude'=>$lat,'Longitude'=>$long));
		return $qry->row();
		//print_r($qry);die;
	}
	
	public function insert_track($table,$data)
	{
		$this->load->database('default',TRUE);
		$this->db->insert($table,$data);
	}
	
}