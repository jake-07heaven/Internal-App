<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<?php foreach ($issue_level as $key) {
	$company = $key->company;
	$service = $key->service;
	$issue = $key->issue;
	$date = $key->date;
	$priority = $key->priority;
	$resolved = $key->resolved;
	$cause = $key->cause;
	$client_feeling = $key->client_feeling;
}?>
<html>
	<?php $this->load->view('head'); ?>
	 	<?php $this->load->view('header'); ?>
	 	<?php $this->load->view('navigation'); ?>
	 	<div class="single_page one-col">
	 		<div class="section-header"><h2><?php echo $company; ?></h2><br><p><?php echo $issue; ?></p></div>
	 		<div class="table">
			 	<table>
					<tr class="table-titles"><td>date</td><td>resolved</td><td>priority</td><td>resolution</td><td>cause</td></tr>
					<?php foreach ($issue_info as $key) {
						echo "<tr><td>" . date('s/m/y',strtotime($date)) . "</td><td>" . date('s/m/y',strtotime($key->resolved_date)) . "</td><td>" . $priority . "</td><td>" . $key->resolution . "</td><td>" . $cause . "</td></tr>";
						echo "<tr class='table-titles'><td>survey result</td><td>hours</td><td></td><td></td><td></td></tr>";
						echo "<tr><td>" . $key->survey_result . "</td><td>" . $resolved . "</td><td></td><td></td><td></td></tr>";
					}?>
				</table>
			</div>
			<div class="table">
				<table>
					<?php foreach ($issue_info as $key) {
						echo "<tr class='table-titles'><td rowspan='2'>WORDS</td><td>Information</td></tr>";
						echo "<tr><td colspan='4'>".$key->info."</td></tr>";
					} 

					?>
				</table>
			</div>
			
			<div class="table">
				<h3>Employees Assigned</h3>
				<table>
				   	<tr class="table-titles"><td>Name</td><td>Join Date</td><td>Salary</td><td>website</td><td>design</td><td>marketing</td><td>seo</td><td>social media</td><td>happiness</td></tr>
				   <?php foreach ($employees_view as $key) {
				   	echo "<tr><td>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->join_date)) . "</td><td>" . $key->salary . "</td><td>" . $key->website . "</td><td>" . $key->design . "</td><td>" . $key->marketing . "</td><td>" . $key->seo . "</td><td>" . $key->social . "</td><td>" . $key->happiness . "</td></tr>";
		   			}?>
				</table>
			</div>

			<div class="table">
				<h3>Corrective Action</h3>
			   	<?php foreach ($issue_info as $key) {
			   		echo "<div id='notes' class='textarea'>" . $key->corrective_action . "</div>";
			   	}?>
			</div>
			<div class="table">
				<h3>preventative action</h3>
			   	<?php foreach ($issue_info as $key) {
			   		echo "<div id='notes' class='textarea'>" . $key->preventative_action . "</div>";
			   	}?>
			</div>
	 	</div>