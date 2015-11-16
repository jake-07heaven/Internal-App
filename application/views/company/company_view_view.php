<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<?php foreach ($company_level as $key) {
	$userName = $key->name;
	$userjoin_date = $key->date_joined;
	$userspend = $key->spend;
	$userlastcontact = $key->last_contact;
	$usercontact = $key->contact;
	$userhappiness = $key->happiness;
	$usernumber = $key->number;
}?>
<html>

	 	<div class="single_page one-col">
	 		<div class="section-header"><h2><?php echo $userName; ?></h2></div>
	 		<div class="table">
			 	<table>
					<tr class="table-titles"><td>spend</td><td>cost</td><td>profit</td><td>potential</td><td>hours</td></tr>
					<?php foreach ($company_info as $key) {
						echo "<tr><td>" . $userspend . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->potential . "</td><td>" . $key->hours . "</td></tr>";
						echo "<tr class='table-titles'><td>join date</td><td>refferals</td><td>success</td><td>amount</td><td>lsat contact</td></tr>";
						echo "<tr><td>" . date('s/m/y',strtotime($userjoin_date)) . "</td><td>" . $key->refferals . "</td><td>" . $key->success . "</td><td>" . $key->amount . "</td><td>" . date('s/m/Y',strtotime($userlastcontact)) . "</td></tr>";
					}?>
				</table>
			</div>
			<div class="table">
				<table>
					<?php foreach ($company_info as $key) {
						echo "<tr class='table-titles'><td colspan='2' rowspan='2'>WORDS</td><td>Work Satisfaction</td><td colspan='3'>Employee Contact Information</td></tr>";
						echo "<tr><td>" . $userhappiness . "</td><td colspan='3'>" . $usercontact . "<br>" . $key->email . "<br>" . $usernumber . "<br>" . $key->address ."</td></tr>";
					} 

					?>
				</table>
			</div>
			<h2>Jobs</h2>
		    <div class="table">
			    <h3>Potential</h3>
			    <table>
				   	<tr class="table-titles"><td>Name</td><td>Start</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td><td>working on</td><td>status</td></tr>
				   <?php 
				   	if ($job_potential != null)
				   {
				   foreach ($job_potential as $key) {
				   	echo "<tr><td>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->start_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td><td>" . $key->working_on . "</td><td>" . $key->status . "</td></tr>";
				   }}?>
				</table>
				</div>
			    <div class="table">
			    <h3>Ongoing</h3>
			    <table>
				   	<tr class="table-titles"><td>Name</td><td>Start</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td><td>working on</td><td>status</td></tr>
				   <?php 
				   if ($job_ongoing != null)
				   {
				   foreach ($job_ongoing as $key) {
				   	echo "<tr><td>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->start_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td><td>" . $key->working_on . "</td><td>" . $key->status . "</td></tr>";
				   }}?>
				</table>
				</div>
				<div class="table">
			    <h3>Completed</h3>
			    <table>
				   <tr class="table-titles"><td>Name</td><td>Start</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td><td>working on</td><td>status</td></tr>
				   <?php 
				   if ($job_completed != null)
				   {
				   foreach ($job_completed as $key) {
				   	echo "<tr><td>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->start_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td><td>" . $key->working_on . "</td><td>" . $key->status . "</td></tr>";
				   }}?>
				</table>
			</div>
			<h2>Issues</h2>
			<div class="table">
			    <h3>Open</h3>
			    <table>
				   	<tr class="table-titles"><td>Company</td><td>Service</td><td>Issue</td><td>Date</td><td>Priority</td><td>resolved</td><td>cause</td><td>client feeling</td></tr>
				   <?php
				   if ($issue_open != null)
				   {
				   foreach ($issue_open as $key) {
				   	echo "<tr><td>" . $key->company . "</td><td>" . date('s/m/y',strtotime($key->date)) . "</td><td>" . $key->service . "</td><td>" . $key->issue . "</td><td>" . $key->priority . "</td><td>" . $key->resolved . "</td><td>" . $key->cause . "</td><td>" . $key->client_feeling . "</td></tr>";
				   }}?>
				</table>
				</div>
				<div class="table">
			    <h3>Resolved</h3>
			    <table>
				   <tr class="table-titles"><td>Company</td><td>Service</td><td>Issue</td><td>Date</td><td>Priority</td><td>resolved</td><td>cause</td><td>client feeling</td></tr>
				   <?php 
				   if ($issue_closed != null)
				   {
				   foreach ($issue_closed as $key) {
				   	echo "<tr><td>" . $key->company . "</td><td>" . date('s/m/y',strtotime($key->date)) . "</td><td>" . $key->service . "</td><td>" . $key->issue . "</td><td>" . $key->priority . "</td><td>" . $key->resolved . "</td><td>" . $key->cause . "</td><td>" . $key->client_feeling . "</td></tr>";
				   }}?>
				</table>
			</div>
	 	</div>
	 	<?php $this->load->view('footer'); ?>