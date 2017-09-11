<?php
class Hospital_areas_model extends CI_Model {                                          //create a model class with name hospital_areas_model which extends CI_model.
    function __construct() {                                                           //constructor definition.
        parent::__construct();                                                         //calling code igniter (parent) constructor.
    }//constructor
     function add_area(){                                                              //add_area function definition.
        $area=array();                                                                 //declare an array with name area.
        
        if($this->input->post('area_name')){                                          //checking whether user giving area_name or empty value.
            $area['area_name'] = $this->input->post('area_name');                      //store area_name into  an area array of index:area_name.
        }//if
        if($this->input->post('department_id')){                                       //checking whether user giving department_id or empty value.
            $area['department_id'] = $this->input->post('department_id');               //store department_id into  an area array of index:department_id.
        }//if
          if($this->input->post('beds')){                                              //checking whether user giving no of beds or empty value.
            $area['beds'] = $this->input->post('beds');                                //store no of beds into  an area array of index:beds.
         }//if
          if($this->input->post('area_type_id')){                                      //checking whether user giving area_type_id or empty value.
            $area['area_type_id'] = $this->input->post('area_type_id');                 //store area_type_id into  an area array of index:area_type_id.
         }//if
          if($this->input->post('lab_report_staff_id')){                               //checking whether user giving lab_report_staff_id or empty value.
            $area['lab_report_staff_id'] = $this->input->post('lab_report_staff_id');   //store lab_report_staff_id into  an area array of index:lab_report_staff_id.
         }//if
          
        $this->db->trans_start();                                                      //transaction started here.
        $this->db->insert('area', $area);                                              //insert array (area) into area table.
        $this->db->trans_complete();                                                   //transaction completed here.
        if($this->db->trans_status()==FALSE){                                          //checking transaction status.If it fails return false else return true.
                return false;
        }//if
        else{
                return true;
    }
  }
function update_area(){
		//storing fields data into data array
        $data=array();
         if($this->input->post('area_name')){                                          //checking whether user giving area_name or empty value.
            $data['area_name'] = $this->input->post('area_name');                      //store area_name into  an area array of index:area_name.
        }
        if($this->input->post('department')){                                       //checking whether user giving department_id or empty value.
            $data['department_id'] = $this->input->post('department');               //store department_id into  an area array of index:department_id.
        }
          if($this->input->post('beds')){                                              //checking whether user giving no of beds or empty value.
            $data['beds'] = $this->input->post('beds');                                //store no of beds into  an area array of index:beds.
         }
          if($this->input->post('area_type')){                                      //checking whether user giving area_type_id or empty value.
            $data['area_type_id'] = $this->input->post('area_type');                 //store area_type_id into  an area array of index:area_type_id.
         }
          if($this->input->post('lab_report_staff')){                               //checking whether user giving lab_report_staff_id or empty value.
            $data['lab_report_staff_id'] = $this->input->post('lab_report_staff');   //store lab_report_staff_id into  an area array of index:lab_report_staff_id.
         } 
         	
        $this->db->trans_start();
        $this->db->where('area_id',$this->input->post('area_id'));
        $this->db->update('area', $data);
       // echo $this->db->last_query();
        $this->db->trans_complete();
        if($this->db->trans_status()==FALSE){
                return false;
        }
        else{
                return true;
        } 
    }
  
   
	function get_area(){				//creating a method to take the filter values through post method.

		if($this->input->post('area_id')){
			$this->db->where('area.area_id',$this->input->post('area_id'));
		}
		if($this->input->post('area_name')){
			$this->db->where('area.area_id',$this->input->post('area_name'));
		}
		if($this->input->post('department')){
			$this->db->where('area.department_id',$this->input->post('department'));
		}
		
		if($this->input->post('area_type')){
			$this->db->where('area.area_type_id',$this->input->post('area_type'));
		}
	  // query to join all the tables and get the data that we want.
	   $this->db->select("*,area.area_id,area.department_id,area.lab_report_staff_id,area.area_type_id,
	   CONCAT(IF(first_name!='',first_name,''),' ',IF(last_name!='',last_name,'')) staff_name,
	   staff.staff_id",false)

	     ->from('area')
		 ->join('department','department.department_id=area.department_id')
		 ->join('area_types','area.area_type_id=area_types.area_type_id','left')
		 ->join('staff','staff.staff_id=area.lab_report_staff_id','left');
			if($this->input->post('area_id')){
			$this->db->where('area.area_id',$this->input->post('area_id'));
		 }
	   $query = $this->db->get();
       $result = $query->result();
       if($result){
        return $result;       
       }else{
           return false;
       }     
		
	}
     function get_department(){			//Method to get the departments in dropdown.
		$hospital=$this->session->userdata('hospital');
		$this->db->select("department_id,department")->from("department")
		->where('hospital_id',$hospital['hospital_id']);
		$resource=$this->db->get();
		return $resource->result();
	}
	function get_area_type(){
		$this->db->select('area_type_id,area_type')->from("area_types");
		$query=$this->db->get();
		return $query->result();
	}
	function get_staff_details(){
		//Method to get the staff details in dropdown
		$hospital=$this->session->userdata('hospital');
	   $this->db->select("
	   CONCAT(IF(first_name!='',first_name,''),' ',IF(last_name!='',last_name,'')) staff_name,
	   staff.staff_id",false)
		->from('staff')
		->where('hospital_id',$hospital['hospital_id']);
		  $resource=$this->db->get();
		  return $resource->result();
	}
	function get_staff(){
		//Method to get the staff details in dropdown
	   $this->db->select("*,staff.staff_id,area.department_id,area.lab_report_staff_id,
	   CONCAT(IF(first_name!='',first_name,''),' ',IF(last_name!='',last_name,'')) staff_name,
	   staff.staff_id",false)
		->from('area')
		->join('staff','staff.staff_id=area.lab_report_staff_id');
		  $resource=$this->db->get();
		  return $resource->result();
	}
	
}