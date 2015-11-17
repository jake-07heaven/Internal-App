<?php $baseurl = base_url(); ?>
<html>

	 	<div class="employee-main-table">
	 	<?php echo form_open('issues/add_issue'); ?>
	 		<table>
	 			<tr><td>Avatar</td></tr>
	 			<tr><td>service: <input class="text-input" type="text" name="service" id="service"></td></tr>
	 			<tr><td>issue: <input class="text-input" type="text" name="issue" id="issue" ></td></tr>
	 			<tr><td>date: <input class="text-input" type="date" name="date" id="date" ></td></tr>
	 			<tr><td>priority: <input class="text-input" type="text" name="priority" id="priority" ></td></tr>
	 			<tr><td>resolved: <input class="text-input" type="number" name="resolved" id="resolved" ></td></tr>
	 			<tr><td>cause:<input class="text-input" type="text" name="cause" id="cause" ></td></tr>
	 			<tr><td>client_feeling: <input class="text-input" type="text" name="client_feeling" id="client_feeling"></td></tr>
	 			<tr><td>Status: <select class="text-input" name="status" id="status"><option value="1">Open</option><option value="2">Resolved</option></select></td></tr>
	 			<tr><td>resolved_date: <input class="text-input" type="date" name="resolved_date" id="resolved_date"></td></tr>
	 			<tr><td>resolution: <input class="text-input" type="number" name="resolution" id="resolution"></td></tr>
	 			<tr><td>survey_result: <input class="text-input" type="number" name="survey_result" id="survey_result"></td></tr>
	 			<tr><td>information:<input class="text-input" type="text" name="info" id="info"></td></tr>
	 			<tr><td>corrective action:<input class="text-input" type="text" name="corrective_action" id="corrective_action"></td></tr>
	 			<tr><td>preventative action:<input class="text-input" type="text" name="preventative_action" id="preventative_action"></td></tr>
	 			<tr><td>linked employees:<input class="text-input linked_employees_view"> <input class="text-input hidden linked_employees" type="text" name="linked_employees" id="linked_employees"></td><td><select id="employee-select" class="text-input">
	 			<?php 
	 				foreach ($employees as $key) {
	 					echo "<option value='" . $key->id . "'>".$key->name."</option>";
	 				}
	 			 ?>
	 			</select></td><td><div class="add-employee-button-issue">+</div></td><td><div class="remove-employee-button-issue">-</div></td></tr>
	 			<tr><td><select name="linked_companies">	 			
	 			<?php 
	 				foreach ($companies as $key) {
	 					echo "<option value='" . $key->name . "'>".$key->name."</option>";
	 				}
	 			 ?></select></td></tr>
	 			<tr><td><input class="text-input" type="submit" value="Add issue"></td></tr>
	 		</table>
	 	</form>
	 	</div>