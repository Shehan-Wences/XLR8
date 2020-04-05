<?php

class carshare_model extends CI_Model {

    public function add_data($table, $data) {
        $this->db->insert($table, $data);
      //  $last_id = $this->db->insert_id();
       // return $last_id;
    }

    public function edit_data($table, $id, $where, $data) {
        $this->db->where($where, $id);
        $this->db->update($table, $data);
        return true;
    }

    public function delete_data($table, $data) {
        $this->db->delete($table, $data);
        return true;
    }

    public function member_login_details($email, $pass) {
        $data = array();
        $this->db->select('Email');
        $this->db->select('Fname');
		$this->db->select('Lname');
        $this->db->select('Password');
		$this->db->select('Status');
        $this->db->from('customer');
		$this->db->where("customer.Email", $email);
        $this->db->where("customer.Password", sha1($pass));

        $open_list = $this->db->get();
		
        foreach ($open_list->result() as $open_info) {
            $data[] = $open_info;
        }
        return $data;
    }

}
?>