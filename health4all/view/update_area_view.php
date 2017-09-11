	<h2 align="center">Update Area</h2><br>
	<?php echo form_open('hospital_areas/update_area',array('class'=>'form-group','role'=>'form'));
		?>
		  	<div class="col-xs-4 col-md-offset-1">
			<div class="container">
			 <div class="col-md-10">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label for="inputareaname" >Area Name</label>
							<select name="area_name" id="area_name" class="form-control">
							<option value="">select</option>
							<?php 
							foreach($all_areas as $area){
								echo "<option value='".$area->area_id."'>".$area->area_name."</option>";
							}
							?>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label for="inputdepartment" >Department Name</label>
							<select name="department" id="department" class="form-control">
							<option value="">select</option>
							<?php 
							foreach($all_areas as $dept){
								echo "<option value='".$dept->area_id."'>".$dept->department."</option>";
							}
							?>
							</select>
						</div>
					</div>
					<div class=" col-xs-12 col-sm-12 col-md-6 col-lg-4">
						<div class="form-horizontal">
							<label for="inputareatype" >Area Type</label>
							<select name="area_type" id="area_type" class="form-control">
							<option value="">select</option>
							<?php 
							foreach($area_types as $areatype){
								echo "<option value='".$areatype->area_type_id."'>".$areatype->area_type."</option>";
							}
							?>
							</select>
						</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					<div class="container">
					<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="inputsearch "></label>
							<center><button class="btn btn-success btn-md"  type="search" name="search" value="search" id="btn">Search</button></center>
							<?php echo form_close();?>
						</div>	
					</div>
					</div>
					</div>
			
				<?php if(isset($search_area)&&!!$search_area){ ?>

				
				<button type="button" class="btn btn-default btn-md print">
				<span class="glyphicon glyphicon-print"></span> Export
			</button>
			<button type="button" class="btn btn-default btn-md print">
				<span class="glyphicon glyphicon-print"></span> print
			</button>

				

			</br>
			
			
			<table class="table table-bordered table-striped" id="table-sort">
				<thead>
			
					<th>S.No</th>
					<th >Area Name</th>
					<th >Department</th>
					<th >Beds</th>
					<th >Area Type</th>
					<th >Lab report staff</th>
				</thead>
				<tbody>
				<?php 
				$j=1;
				foreach($search_area as $area){?>
						<?php echo form_open('hospital_area/update_area',array('id'=>'select_area_'.$area->area_id,'role'=>'form')); ?>
			<tr onClick="$('#select_area_<?php echo $area->area_id;?>').submit();">
			<td><?php echo $j++;?></td>
			<input type="hidden" value="<?php echo $area->area_id;?>"name="area_id"/>
			<input type="hidden" value="select" name="select"/>
			</td>
			<td><?php echo $area->area_name;?></td>
			<td><?php echo $area->department;?></td>
			<td><?php echo $area->beds;?></td>
			<td><?php echo $area->first_name;?></td>
			</tr>
			
			<?echo form_close(); ?>
				<?php }?>
				</tbody>
				</table>
				
				
				<?php }?>

				  