<?php $baseurl = base_url(); ?>
<html>
	<?php $this->load->view('head'); ?>
	 	<?php $this->load->view('header'); ?>
	 	<?php $this->load->view('navigation'); ?>
	 	<div class="employee-main-table">
	 	<?php echo form_open('jobs/add_job'); ?>
	 		<table>
	 			<tr><td>Avatar</td></tr>
	 			<tr><td>Name: <input class="text-input" type="text" name="name" id="name"></td></tr>
	 			<tr><td>start date: <input class="text-input" type="date" name="start_date" id="start_date" ></td></tr>
	 			<tr><td>deadline date: <input class="text-input" type="date" name="deadline_date" id="deadline_date" ></td></tr>
	 			<tr><td>price: <input class="text-input" type="number" name="price" id="price" ></td></tr>
	 			<tr><td>cost: <input class="text-input" type="number" name="cost" id="cost" ></td></tr>
	 			<tr><td>hours:<input class="text-input" type="number" name="hours" id="hours" ></td></tr>
	 			<tr><td>taken: <input class="text-input" type="number" name="taken" id="taken"></td></tr>
                                <tr><td>Status: <select class="text-input" name="status" id="status"><option value="0">Potential Job</option><option value="1">Current Job</option><option value="2">Completed Job</option></select></td></tr>
	 			<tr><td>working on: <input class="text-input" type="text" name="working_on" id="working_on"></td></tr>
	 			<tr><td>time estimated: <input class="text-input" type="number" name="time_estimated" id="time_estimated"></td></tr>
	 			<tr><td>stage: <input class="text-input" type="number" name="stage" id="stage"></td></tr>
	 			<tr><td>deposit paid: <input class="text-input" type="number" name="deposit_paid" id="deposit_paid" ></td></tr>
	 			<tr><td>description:<input class="text-input" type="text" name="desc" id="desc"></td></tr>
	 			<tr><td>linked jobs ID: <input class="text-input linked_jobs_view"> <input class="text-input hidden linked_jobs" type="text" name="linked_jobs" id="linked_jobs"></td><td><select id="job-select" class="text-input">
	 			<?php 
	 				foreach ($jobs as $key) {
	 					echo "<option value='" . $key->id . "'>".$key->name."</option>";
	 				}
	 			 ?>
                                </select><td><div class="add-job-button-job">+</div></td><td><div class="remove-job-button-job">-</div></td></tr>
	 			<tr><td>linked employees ID:<input class="text-input linked_employees_view"> <input class="text-input hidden linked_employees" type="text" name="linked_employees" id="linked_employees"></td><td><select id="employee-select" class="text-input">
	 			<?php 
	 				foreach ($employees as $key) {
	 					echo "<option value='" . $key->id . "'>".$key->name."</option>";
	 				}
	 			 ?>
	 			</select></td><td><div class="add-employee-button-job">+</div></td><td><div class="remove-employee-button-job">-</div></td></tr>
	 			<tr><td>linked companies: <select name="linked_companies" class="text-input">
	 			<?php 
	 				foreach ($companies as $key) {
	 					echo "<option value='" . $key->name . "'>".$key->name."</option>";
	 				}
	 			 ?>
	 			</select></td></tr>
	 			<tr><td>notes: <input class="text-input" type="text" name="notes" id="notes" ></td></tr>
	 			<tr><td>linked service: <select name="service" class="text-input">
	 			<?php 
	 				foreach ($services as $key) {
	 					echo "<option value='" . $key->name . "'>".$key->name."</option>";
	 				}
	 			 ?>
	 			</select></td></tr>
				<tr><td><input class="text-input" type="submit" value="Add Job"></td></tr>
	 			</div>
	 		</table>
	 	</form>
	 	</div>
	 	<?php $this->load->view('footer'); ?>