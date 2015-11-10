<?php $baseurl = base_url(); ?>
<html>
	<?php $this->load->view('head'); ?>
	 	<?php $this->load->view('header'); ?>
	 	<?php $this->load->view('navigation'); ?>
	 	<div class="employee-main-table">
	 	<?php echo form_open('jobs/add_job'); ?>
                    
                    <div class="container">
            <div class="container">
                    <div class="col-xs-12"><div class="section-header-input">Name: <input class="text-input" type="text" name="name" id="name"></div></div>
            </div>
            <div class="table-input">
                <table>
                    <tr><td>start date: <input class="text-input" type="date" name="start_date" id="start_date"></td><td>deadline date: <input class="text-input" type="date" name="deadline_date" id="deadline_date"></td><td>price: <input class="text-input" type="number" name="price" id="price"></td><td>cost: <input class="text-input" type="number" name="cost" id="cost"></td></tr>
                    <tr><td>hours:<input class="text-input" type="number" name="hours" id="hours"></td><td>time estimated: <input class="text-input" type="number" name="time_estimated" id="time_estimated"></td><td>taken: <input class="text-input" type="number" name="taken" id="taken"></td><td>stage: <input class="text-input" type="number" name="stage" id="stage"></td><td>deposit paid: <input class="text-input" type="number" name="deposit_paid" id="deposit_paid"></td></tr>

                </table>
            </div> 
            <div class="table-input">
                <table>
                    <tr><td rowspan="2">AVATAR</td><td>Description</td></tr>
                    <tr><td>description:<textarea class="text-input" type="text" name="desc" id="desc"></textarea></td></tr>
                    <tr><td>Status: <select class="text-input" name="status" id="status"><option value="0">Potential Job</option><option value="1">Current Job</option><option value="2">Completed Job</option></select></td></tr>
                    <tr class="hidden"><td><input name="id"></td></tr>
                </table>
            </div>
                        <div class="table">
                            <table>
                                <tr><td colspan="3">Jobs</td></tr>
                        <tr><td><input class="text-input linked_jobs_view"> <input class="text-input hidden linked_jobs" type="text" name="linked_jobs" id="linked_jobs"></td><td><select id="job-select" class="text-input">
	 			<?php 
	 				foreach ($jobs as $key) {
	 					echo "<option value='" . $key->id . "'>".$key->name."</option>";
	 				}
	 			 ?>
                                </select></td><td><div class="small-button add-job-button-job">+</div><div class="small-button remove-job-button-job">-</div></td></tr>
                        <tr><td colspan="3">Employees</td></tr>	
                        <tr><td><input class="text-input linked_employees_view"><input class="hidden linked_employees" type="text" name="linked_employees" id="linked_employees"></td><td><select id="employee-select" class="text-input">
	 			<?php 
	 				foreach ($employees as $key) {
	 					echo "<option value='" . $key->id . "'>".$key->name."</option>";
	 				}
	 			 ?>
	 			</select></td><td><div class="small-button add-employee-button-job">+</div><div class="small-button remove-employee-button-job">-</div></td></tr>
                        <tr><td colspan="3">Companies</td></tr>
                        <tr><td colspan="3"><select name="linked_companies" class="text-input">
	 			<?php 
	 				foreach ($companies as $key) {
	 						echo "<option value='" . $key->name . "'>".$key->name."</option>";
	 				}
	 			 ?>
	 			</select></td></tr>
                                <tr><td colspan="3">Service</td></tr>
                                <tr><td colspan="3"><select name="service" class="text-input">
	 			<?php 
	 				foreach ($services as $key) {
	 						echo "<option value='" . $key->name . "'>".$key->name."</option>";
	 				}
	 			 ?>
	 			</select></td></tr>
                            </table>
                        </div>
            <div class="table-input">
                <table>
                    <tr><td>notes: <textarea class="textarea" type="text" name="notes" id="notes"></textarea></td></tr>
                    <tr><td><input class="text-input" type="submit" value="Add Job"></td></tr>
                </table>
            </div>
        </div>
        </form>
    </div>
    <?php $this->load->view('footer'); ?>