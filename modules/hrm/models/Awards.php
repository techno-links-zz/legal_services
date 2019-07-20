<?php

class awards extends App_Model{
	public function __construct(){
		parent::__construct();
	}

    public function getAward($id){
        $this->db->select('*');
        $this->db->from('tblaward');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();

    }
    public function getStaff(){
        $this->db->select('*');
        $this->db->from('tblstaff');
        return $this->db->get()->result_array();
    }

    public function add($data){
        $this->db->insert('tblvac', $data);
    }

    public function update($data, $id)
    {   
    	$query = $this->db->get_where('tblaward', array('id' => $id));
    	if(empty($query->row_array())){
            unset($data['id']);
	        $this->db->insert('tblaward', $data);
        }else {
        	$this->db->where(['id' => $id]);
        	$this->db->update('tblaward', $data);
        }

        if ($this->db->affected_rows() > 0) {

            return true;
        }

        return false;
    }

	public function delete($id, $simpleDelete = false){

        $this->db->where('id', $id);

        $this->db->delete('tblaward');
        if ($this->db->affected_rows() > 0) {
            log_activity('Award Deleted [' . $id . ']');

            return true;
        }

        return false;
    }

}