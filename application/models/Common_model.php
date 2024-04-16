<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class COMMON_MODEL extends CI_Model {

    public function insert_data($data,$tbl_name){
		$sql = $this->db->insert($tbl_name,$data);
		return ( $this->db->insert_id() );
	}
	
	public function update($tbl,$data,$field,$value){
		$this->db->where($field,$value);
		return $this->db->update($tbl,$data);
	}

	public function change_status($table, $column, $value, $uniqueNameCol, $uniqueColValue)
	{
		$query = $this->db->query("UPDATE ".$table." SET `".$column."` = '".$value."' WHERE `".$uniqueNameCol."` = '".$uniqueColValue."' ");
		return $query;
	}

	public function get_rows($tbl,$field=0,$value=0){
		if(!empty($field)){
			$this->db->where($field,$value);
		}
		return $this->db->get($tbl)->num_rows();
	}

	public function get_data_by_id($tbl,$field=0,$value=0){
		if(!empty($field)){
			$this->db->where($field,$value);
		}
		return $this->db->get($tbl)->row_array();
	}
	
	public function get_data_by_id1($tbl,$field=0,$value=0){
		if(!empty($field)){
			$this->db->where($field,$value);
		}
		return $this->db->get($tbl)->result_array();
	}
	
	public function delete($tbl,$field=0,$value=0){
		$this->db->where($field,$value);
		return $this->db->delete($tbl);
	}

	public function count_data_with_id($tbl,$field=0,$value=0){
		if(!empty($field)){
			$this->db->where($field,$value);
		}
		return $this->db->count_all_results($tbl);
	}
		
	public function num_data($id,$tbl) 
	{	
		$this->db->select('*');
		$this->db->order_by($id);
		$result = $this->db->get($tbl);
		return $result->num_rows();
	}

	public function get_desc_order($table, $field = 0, $value = 0)
	{
		$query = "SELECT * FROM $table WHERE $field = '$value' ORDER BY id DESC";
		return $this->db->query($query)->result_array();
	}
	
	public function count_notification($table, $receiver_id)
	{
		$sql =  $this->db->query("SELECT count(id) as count from $table where receiver_id = '$receiver_id'");
		return $sql->row_array();
	}

	public function delete_notification($table, $receiver_id, $limit)
	{
		$sql =  $this->db->query("Delete from $table where receiver_id = '$receiver_id' ORDER BY id ASC LIMIT $limit");
		return $sql;
	}
}
