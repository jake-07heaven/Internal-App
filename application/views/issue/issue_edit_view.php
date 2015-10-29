<!DOCTYPE html>
<?php foreach ($issue_level as $key) {
	$company = $key->company;
	$service = $key->service;
	$issue = $key->issue;
	$date = $key->date;
	$priority = $key->priority;
	$resolved = $key->resolved;
	$cause = $key->cause;
	$client_feeling = $key->client_feeling;
	$status = $key->status;
	$id = $key->id;
}

foreach ($issue_info as $key) {
	$resolved_date = $key->resolved_date;
	$resolution = $key->resolution;
	$survey_result = $key->survey_result;
	$info = $key->info;
	$linked_employees = $key->linked_employees;
	$corrective_action = $key->corrective_action;
	$preventative_action = $key->preventative_action;
}
?>

<?php $baseurl = base_url(); ?>
<html>
	<?php $this->load->view('head'); ?>
	 	<?php $this->load->view('header'); ?>
	 	<?php $this->load->view('navigation'); ?>
	 	<div class="employee-main-table">
	 	<?php echo form_open('issues/update_issue'); ?>
	 		<table>
	 			<tr><td>Avatar</td></tr>
	 			<tr class="hidden"><td><input name="id" value="<?php echo $id; ?>"></td></tr>
	 			<tr><td>service: <input class="text-input" type="text" name="service" id="service" value="<?php echo $service; ?>"></td></tr>
	 			<tr><td>issue: <input class="text-input" type="text" name="issue" id="issue" value="<?php echo $issue; ?>"></td></tr>
	 			<tr><td>date: <input class="text-input" type="date" name="date" id="date" value="<?php echo $date; ?>"></td></tr>
	 			<tr><td>priority: <input class="text-input" type="text" name="priority" id="priority" value="<?php echo $priority; ?>"></td></tr>
	 			<tr><td>resolved: <input class="text-input" type="number" name="resolved" id="resolved" value="<?php echo $resolved; ?>"></td></tr>
	 			<tr><td>cause:<input class="text-input" type="text" name="cause" id="cause" value="<?php echo $cause; ?>"></td></tr>
	 			<tr><td>client_feeling: <input class="text-input" type="text" name="client_feeling" id="client_feeling" value="<?php echo $client_feeling; ?>"></td></tr>
	 			<tr><td>Status: <select class="text-input" name="status" id="status"><option <?php if($status == 1){echo "selected='selected'";} ?> value="1">Open</option><option <?php if($status == 2){echo "selected='selected'";} ?> value="2">Resolved</option></select></td></tr>
	 			<tr><td>resolved_date: <input class="text-input" type="date" name="resolved_date" id="resolved_date" value="<?php echo $resolved_date; ?>"></td></tr>
	 			<tr><td>resolution: <input class="text-input" type="number" name="resolution" id="resolution" value="<?php echo $resolution; ?>"></td></tr>
	 			<tr><td>survey_result: <input class="text-input" type="number" name="survey_result" id="survey_result" value="<?php echo $survey_result; ?>"></td></tr>
	 			<tr><td>information:<input class="text-input" type="text" name="info" id="info" value="<?php echo $info; ?>"></td></tr>
	 			<tr><td>corrective action:<input class="text-input" type="text" name="corrective_action" id="corrective_action" value="<?php echo $corrective_action; ?>"></td></tr>
	 			<tr><td>preventative action:<input class="text-input" type="text" name="preventative_action" id="preventative_action" value="<?php echo $preventative_action; ?>"></td></tr>
	 			<tr><td>linked employees:<input class="text-input linked_employees_view" value="<?php foreach ($employees_view as $key) {echo $key->name . " ";} ?>" ><input class="hidden linked_employees" type="text" name="linked_employees" id="linked_employees" value="<?php echo $linked_employees; ?>"></td><td><select id="employee-select" class="text-input">
	 			<?php 
	 				foreach ($employees as $key) {
	 					echo "<option value='" . $key->id . "'>".$key->name."</option>";
	 				}
	 			 ?>
	 			</select></td><td><div class="add-employee-button-issue">+</div></td><td><div class="remove-employee-button-issue">-</div></td></tr>
	 			<tr><td><select name="linked_companies">	 			
	 			<?php 
	 				foreach ($companies as $key) {
	 					if ($key->name == $company)
	 					{
	 						echo "<option slected='selected' value='" . $key->name . "'>".$key->name."</option>";
	 					} else {
	 					echo "<option value='" . $key->name . "'>".$key->name."</option>";
	 					}
	 				}
	 			 ?></select></td></tr>
	 			<tr><td><input class="text-input" type="submit" value="Update issue"></td></tr>
                                <tr><td><div id="<?php echo $id; ?>" class="delete-button issue-delete-button">DELETE</div></td></tr>
	 		</table>
	 	</form>
	 	<?php $this->load->view('footer'); ?>



