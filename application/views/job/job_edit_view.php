<!DOCTYPE html>
<?php foreach ($job_level as $key) {
	$name = $key->name;
	$start_date = $key->start_date;
	$deadline_date = $key->deadline_date;
	$price = $key->price;
	$cost = $key->cost;
	$hours = $key->hours;
        $status = $key->status;
	$taken = $key->taken;
	$working_on = $key->working_on;
	$id = $key->id;
}

foreach ($job_info as $key) {
	$time_estimated = $key->time_estimated;
	$stage = $key->stage;
	$deposit_paid = $key->deposit_paid;
	$desc = $key->desc;
	$linked_jobs = $key->linked_jobs;
	$linked_employees = $key->linked_employees;
	$linked_companies = $key->linked_companies;
        $service = $key->service;
	$notes = $key->notes;
}
?>

<?php $baseurl = base_url(); ?>
<html>
	<?php $this->load->view('head'); ?>
	 	<?php $this->load->view('header'); ?>
	 	<?php $this->load->view('navigation'); ?>
	 	<div class="employee-main-table">
	 	<?php echo form_open('jobs/update_job'); ?>
	 		<table>
	 			<tr><td>Avatar</td></tr>
	 			<tr class="hidden"><td><input name="id" value="<?php echo $id; ?>"></td></tr>
	 			<tr><td>Name: <input class="text-input" type="text" name="name" id="name" value="<?php echo $name; ?>"></td></tr>
	 			<tr><td>start date: <input class="text-input" type="date" name="start_date" id="start_date" value="<?php echo $start_date; ?>"></td></tr>
	 			<tr><td>deadline date: <input class="text-input" type="date" name="deadline_date" id="deadline_date" value="<?php echo $deadline_date; ?>"></td></tr>
	 			<tr><td>price: <input class="text-input" type="number" name="price" id="price" value="<?php echo $price; ?>"></td></tr>
	 			<tr><td>cost: <input class="text-input" type="number" name="cost" id="cost" value="<?php echo $cost; ?>"></td></tr>
	 			<tr><td>hours:<input class="text-input" type="number" name="hours" id="hours" value="<?php echo $hours; ?>"></td></tr>
	 			<tr><td>Status: <select class="text-input" name="status" id="status"><option <?php if($status == 0){echo "selected='selected'";} ?> value="0">Potential Job</option><option <?php if($status == 1){echo "selected='selected'";} ?> value="1">Current Job</option><option <?php if($status == 2){echo "selected='selected'";} ?> value="2">Completed Job</option></select></td></tr>
                                <tr><td>taken: <input class="text-input" type="number" name="taken" id="taken" value="<?php echo $taken; ?>"></td></tr>
	 			<tr><td>working on: <input class="text-input" type="text" name="working_on" id="working_on" value="<?php echo $working_on; ?>"></td></tr>
	 			<tr><td>time estimated: <input class="text-input" type="number" name="time_estimated" id="time_estimated" value="<?php echo $time_estimated; ?>"></td></tr>
	 			<tr><td>stage: <input class="text-input" type="number" name="stage" id="stage" value="<?php echo $stage; ?>"></td></tr>
	 			<tr><td>deposit paid: <input class="text-input" type="number" name="deposit_paid" id="deposit_paid" value="<?php echo $deposit_paid; ?>"></td></tr>
	 			<tr><td>description:<input class="text-input" type="text" name="desc" id="desc" value="<?php echo $desc; ?>"></td></tr>
	 			<tr><td>linked jobs: <input class="text-input linked_jobs_view" value="<?php foreach ($jobs_view as $key) {echo $key->name . " ";} ?>"> <input class="text-input hidden linked_jobs" type="text" name="linked_jobs" id="linked_jobs" value="<?php echo $linked_jobs; ?>"></td><td><select id="job-select" class="text-input">
	 			<?php 
	 				foreach ($jobs as $key) {
	 					echo "<option value='" . $key->id . "'>".$key->name."</option>";
	 				}
	 			 ?>
	 			</select><div class="add-job-button-job">+</div></td><td><div class="remove-job-button-job">-</div></td></tr>
	 			<tr><td>linked employees: <input class="text-input linked_employees_view" value="<?php foreach ($employees_view as $key) {echo $key->name . " ";} ?>" ><input class="hidden linked_employees" type="text" name="linked_employees" id="linked_employees" value="<?php echo $linked_employees; ?>"></td><td><select id="employee-select" class="text-input">
	 			<?php 
	 				foreach ($employees as $key) {
	 					echo "<option value='" . $key->id . "'>".$key->name."</option>";
	 				}
	 			 ?>
	 			</select></td><td><div class="add-employee-button-job">+</div></td><td><div class="remove-employee-button-job">-</div></td></tr>
	 			<tr><td>linked companies: <select name="linked_companies" class="text-input">
	 			<?php 
	 				foreach ($companies as $key) {
	 					if ($linked_companies == $key->name)
	 					{
	 						echo "<option selected='selected' value='" . $key->name . "'>".$key->name."</option>";
	 					}
	 					else
	 					{
	 						echo "<option value='" . $key->name . "'>".$key->name."</option>";
	 					}
	 				
	 				}
	 			 ?>
	 			</select></td></tr>
                            <tr><td>linked service: <select name="service" class="text-input">
	 			<?php 
	 				foreach ($services as $key) {
	 					if ($service == $key->name)
	 					{
	 						echo "<option selected='selected' value='" . $key->name . "'>".$key->name."</option>";
	 					}
	 					else
	 					{
	 						echo "<option value='" . $key->name . "'>".$key->name."</option>";
	 					}
	 				
	 				}
	 			 ?>
	 			</select></td></tr>
	 			<tr><td>notes: <input class="text-input" type="text" name="notes" id="notes" value="<?php echo $notes; ?>"></td></tr>
				<tr><td><input class="text-input" type="submit" value="Update Job"></td></tr>
                                <tr><td><div id="<?php echo $id; ?>" class="delete-button job-delete-button">DELETE</div></td></tr>
	 			</div>
	 		</table>
	 	</form>
	 	<?php $this->load->view('footer'); ?>



