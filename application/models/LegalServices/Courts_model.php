<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Courts_model extends App_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_courts()
    {
        return $this->db->get('my_courts')->result();
    }
	
	public function get_court_by_id($id)
    {         
		return $this->db->get_where('my_courts', array('c_id' => $id));
    }
	
	public function get_judicial_by_id($id)
    {         
		return $this->db->get_where('my_judicialdept', array('j_id' => $id));
    }
	
	public function get_judicial_of_courts($id)
    {    
    	$this->db->select('*');
		$this->db->from('my_judicialdept');
		$this->db->join('my_courts', 'my_courts.c_id = my_judicialdept.c_id');
		$this->db->where('my_judicialdept.c_id', $id);
		return $this->db->get();		        
    }
	
	public function add_court_new($data)
    {
        $data['datecreated'] = date('Y-m-d H:i:s');               
        $this->db->insert('my_courts', $data);	
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            log_activity('New Court Added [CourtID: ' . $insert_id . ' CourtName: ' . $data['court_name'] . ']');
        }
        return $insert_id;
    }
		
	public function add_judicial_for_court($id,$data)
    {
    	$data['datecreated'] = date('Y-m-d H:i:s');	    
        $data['c_id'] = $id;	          
        $this->db->insert('my_judicialdept', $data);	
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            log_activity('New Court Added [JudID: ' . $insert_id . ' JudNumber: ' . $data['Jud_number'] . ']');
        }
        return $insert_id;
    }
	public function update_court_data($id,$data)
    {  
        $this->db->where('c_id', $id);
        $this->db->update('my_courts', $data);
        if ($this->db->affected_rows() > 0) {
            log_activity('Court Updated [CourtID: ' . $id . ']');
            return true;
        }
        return false;
    }
	
	public function update_judicial_data($c_id,$j_id,$data)
    {  
        $this->db->where('j_id', $j_id,'c_id', $c_id);
        $this->db->update('my_judicialdept', $data);
        if ($this->db->affected_rows() > 0) {
            log_activity('Judicial Updated [JudID: ' . $j_id . ']');
            return true;
        }
        return false;
    }
	
	public function delete_court($id)
    {
        $this->db->where('c_id', $id);
        $this->db->delete('my_courts');
        if ($this->db->affected_rows() > 0) {
            $this->db->where('c_id', $id);
            $this->db->delete('my_judicialdept');
            log_activity('Court Deleted [CourtID: ' . $id . ']');
            return true;
        }
        return false;
    }
	
	public function delete_judicial($id)
    {
        $this->db->where('j_id', $id);
        $this->db->delete('my_judicialdept');
        if ($this->db->affected_rows() > 0) {     
            log_activity('Judicial Deleted [JudID: ' . $id . ']');
            return true;
        }
        return false;
    }
	
}