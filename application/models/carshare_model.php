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
	
	public function email_check($email) {
        $data = array();
        $this->db->select('Email');
        $this->db->from('customer');
		$this->db->where("customer.Email", $email);
       
        $open_list = $this->db->get();
		
        foreach ($open_list->result() as $open_info) {
            $data[] = $open_info;
        }
        return $data;
    }
	public function profile($email) {
       $data = array();
        $this->db->select('Fname');
		$this->db->select('Lname');
        $this->db->select('Phone');
		$this->db->select('DriverL');
        $this->db->from('customer');
		$this->db->where("customer.Email", $email);
        
        $open_list = $this->db->get();
		
        foreach ($open_list->result() as $open_info) {
            $data[] = $open_info;
        }
        return $data;
	}
	
	public function carDetails($id) {
		$data = array();
		 $this->db->select('description');
		 $this->db->select('make');
		 $this->db->select('model');
		 $this->db->select('rent');
		 $this->db->select('type');
		 $this->db->select('fuel');
		 $this->db->select('transmission');
		 $this->db->select('year');
		 $this->db->select('imageurl');
		 $this->db->from('car');
		 $this->db->where("car.carid", $id);
		 
		 $open_list = $this->db->get();
		 
		 foreach ($open_list->result() as $open_info) {
			 $data[] = $open_info;
		 }
		 return $data;
	 }

    public function member_login_details($email, $pass) {
        $data = array();
        $this->db->select('Email');
        $this->db->select('Fname');
		$this->db->select('Lname');
		$this->db->select('Id');
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
	
	 public function locations() {
        $data = array();
        $this->db->select('locationid');
        $this->db->select('name');
		
        $this->db->from('location');
		
        $open_list = $this->db->get();
		
        foreach ($open_list->result() as $open_info) {
            $data[] = $open_info;
        }
        return $data;
    }
	
	public function cars() {
        $data = array();
        $this->db->select('carid');
      		
        $this->db->from('car');
		
        $query = $this->db->get();
		
        return $query->num_rows();
    }
	
	function fetch_cars($plocation,$pdate,$ddate,$type,$make,$transmission,$fuel,$sort)
	{

		if($type != null){
			
			$a=0;
			foreach($type as $t){
				$a++;
				if($a==1){
				 $typeq= "car.type='".$t."' ";		
				}else{
				 $typeq= " ".$typeq."OR car.type='".$t."' ";
				}
			}
		}
		
		if($make != null){
			
			$a=0;
			foreach($make as $m){
				$a++;
				if($a==1){
				 $makeq= "car.make='".$m."' ";		
				}else{
				 $makeq= " ".$makeq."OR car.make='".$m."' ";
				}
			}
		}
		if($transmission != null){
			
			$a=0;
			foreach($transmission as $m){
				$a++;
				if($a==1){
				 $transmissionq= "car.transmission='".$m."' ";		
				}else{
				 $transmissionq= " ".$transmissionq."OR car.transmission='".$m."' ";
				}
			}
		}
		if($fuel != null){
			
			$a=0;
			foreach($fuel as $m){
				$a++;
				if($a==1){
				 $fuelq= "car.fuel='".$m."' ";		
				}else{
				 $fuelq= " ".$fuelq."OR car.fuel='".$m."' ";
				}
			}
		}
		$data = array();	
		
		$this->db->select('car.carid');
        $this->db->select('description');
        $this->db->select('make');
        $this->db->select('model');
        $this->db->select('rent');
        $this->db->select('type');
        $this->db->select('fuel');
        $this->db->select('transmission');
		$this->db->select('year');
		$this->db->select('imageurl'); 
        $this->db->from('car');
        $this->db->join('parking', 'car.carid = parking.carid', 'left'); 	
		
		//$this->db->where("(car.type='SUV')", NULL, FALSE);
		if(isset($typeq)){
		 $this->db->where("(".$typeq.")", NULL, FALSE);
		}
		if(isset($makeq)){
		 $this->db->where("(".$makeq.")", NULL, FALSE);
		}
		
		if(isset($transmissionq)){
		 $this->db->where("(".$transmissionq.")", NULL, FALSE);
		}
		
		if(isset($fuelq)){
		 $this->db->where("(".$fuelq.")", NULL, FALSE);
		}
		
		$this->db->where('parking.availabledate <=', $pdate);
		$this->db->where('parking.enddate  >=', $ddate);
		$this->db->where('parking.availablelocationid ', $plocation);
		$this->db->order_by("rent ".$sort);
		 
		 		
		
		
		$open_list = $this->db->get();
		
        foreach ($open_list->result() as $open_info) {
            $data[] = $open_info;
        }
        return $data;
	}
 
	function fetch_thecar($carid,$plocation,$pdate,$ddate)
	{
		
		
		$data = array();	
		
		
        $this->db->select('parking.parkingid');
		$this->db->select('parking.availabledate');
		$this->db->select('parking.enddate');
        $this->db->from('parking');
       	
		
		
		
		$this->db->where('parking.availabledate <=', $pdate);
		$this->db->where('parking.enddate  >=', $ddate);
		$this->db->where('parking.availablelocationid ', $plocation);
		$this->db->where('parking.carid ', $carid);
	
		
		$open_list = $this->db->get();
		
        foreach ($open_list->result() as $open_info) {
            $data[] = $open_info;
        }
        return $data;
	}

	function displayrecords()
	{
		$query=$this->db->query("select * from customer");
		return $query->result();
	}

 
}
?>