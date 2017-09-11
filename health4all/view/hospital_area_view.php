 <center>
 <?php if(isset($message)) { ?>
 <div class="alert alert-success"><?php echo $message; ?>
 </div>
 <?php } ?>
 <?php echo validation_errors(); ?>
 </center>
 <h2 align="center">Area</h2><br><!--Area Heading-->
    <!--form open-->
  <?php	echo form_open('hospital_areas/add_area',array('class'=>'form-group','role'=>'form')); ?> 
	 <div class="col-md-8 col-md-offset-3">
	 <div class="row">
	  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
	    <div class="form-group">
	        <label for="inputarea_name">Area Name<font color='red'>*</font></label><!--Area name field-->
		<input class="form-control" name="area_name"  id="inputarea_name" placeholder="Enter area name" type="TEXT" align="middle" required>
	    </div>
	  </div><!--Area name field end-->
	  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
	   <div class="form-group">
	    <label for="inputdepartment_id">Department<font color='red'>*</font></label><!--Department field-->
		 <select name="department_id" id="department_id" class="form-control" required>
		 <option value="">Select</option>
		 <!--loop for select department-->
	     <?php
		  foreach($all_departments as $dept)  
		  {
		    echo "<option value='".$dept->department_id."'>".$dept->department."</option>";
		  }
		 ?>
		</select>
	   </div>	
	  </div>     <!--Department field end-->
	  <div class="col-xs-12 col-sm-12 col-md-6  col-lg-4">
	    <div class="form-group">
	        <label for="inputbeds ">Beds</label>      <!--Beds field-->
		<input class="form-control" name="beds" id="inputbeds" placeholder="Enter no of beds" type="text">
	    </div>
	  </div><!--Beds field end-->
	  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
	   <div class="form-group">
	    <label for="inputarea_type_id ">Area Type<font color='red'>*</font></label><!--Area Type field-->
		 <select name="area_type_id" id="area_type_id" class="form-control"required>
		 <option value="">Select</option>
		 <!-- loop for select area type-->
		 <?php                                  
		 foreach($area_types as $area)
		 {
		   echo"<option value='".$area->area_type_id."'>".$area->area_type."</option>";
		 }
		 ?>
	    </select>
	   </div>	
	  </div><!--Area Type field end-->
	  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
	   <div class="form-group">
	    <label for="inputlab_report_staff_id ">Lab Report Staff </label><!--Lab Report Staff field-->
		<select name="lab_report_staff_id" id="lab_report_staff_id" class="form-control">
		 <option value="">Select</option>
		 <!--loop for select Lab Report Staff Id-->
		 <?php
		  foreach($lab_report_staff as $lab)
		  {
		   echo"<option value='".$lab->staff_id."'>".$lab->staff_name."</option>";
		  }
		 ?>
		</select>
	   </div>	
	  </div><!--Lab Report Staff field end-->
	  </div>
	  </div>
	  <div class = "col-md-4 col-md-offset-4">
	   <div class="row">
		<div class="col-md-12">
		<!--Submit button-->
		 <center><button class="btn btn-primary" type="submit" name="Submit" id="btn">Submit</button></center>
		</div><!--Submit button end-->
	   </div>
	  </div>
	  <?php echo form_close(); ?><!--Form closing-->
     </div>