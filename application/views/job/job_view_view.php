<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<?php foreach ($job_level as $key) {
        $id = $key->id;
	$name = $key->name;
	$start_date = $key->start_date;
	$deadline_date = $key->deadline_date;
	$price = $key->price;
	$cost = $key->cost;
	$profit = $key->profit;
	$taken = $key->taken;
}?>
<html>
	<?php $this->load->view('head'); ?>
	 	<?php $this->load->view('header'); ?>
	 	<?php $this->load->view('navigation'); ?>
	 	<div class="single_page one-col">
	 		<div class="section-header"><h2><?php echo $name; ?></h2></div>
	 		<div class="table">
			 	<table>
					<tr class="table-titles"><td>Start</td><td>Deadline</td><td>price</td><td>cost</td><td>profit</td></tr>
					<?php foreach ($job_info as $key) {
						echo "<tr><td>" . date('s/m/y',strtotime($start_date)) . "</td><td>" . date('s/m/y',strtotime($deadline_date)) . "</td><td>" . $price . "</td><td>" . $cost . "</td><td>" . $profit . "</td></tr>";
						echo "<tr class='table-titles'><td>time estimate</td><td>time taken</td><td>stage</td><td>deposit paid</td><td>to pay</td></tr>";
						echo "<tr><td>" . $key->time_estimated . "</td><td>" . $taken . "</td><td>" . $key->stage . "</td><td>" . $key->deposit_paid . "</td><td>" . $key->to_pay . "</td></tr>";
					}?>
				</table>
			</div>
			<div class="table">
				<table>
					<?php foreach ($job_info as $key) {
						echo "<tr class='table-titles'><td rowspan='2'>WORDS</td><td>Description</td></tr>";
						echo "<tr><td colspan='4'>".$key->desc."</td></tr>";
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
				<h3>Linked Jobs</h3>
				<table>
				   	<tr class="table-titles"><td>Name</td><td>start</td><td>deadline</td><td>price</td><td>cost</td><td>profit</td><td>hours</td><td>taken</td></tr>
				   <?php foreach ($jobs_view as $key) {
				   	echo "<tr><td>" . $key->name . "</td><td>" . date('s/m/Y',strtotime($key->deadline_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td></tr>";
		   			}?>
				</table>
			</div>
			<div class="table">
				<h3>notes</h3>
                                <table>
			   	<?php foreach ($job_info as $key) : ?>
                                    <tr><td><div id='notes' class='notes-read textarea'><?php echo $key->notes; ?></div></td></tr>
                                    <?php echo form_open('jobs/update-notes'); ?>
                                    <tr class='hidden'><td><input class='hidden' name="id" readonly="readonly" value="<?php echo $id; ?>"</td></tr>
                                    <tr><td><textarea name="notes" class='notes-write hidden textarea'><?php echo $key->notes; ?></textarea></td></tr>
                                    <tr><td><div class="edit-notes-job button"><img src="<?php echo $baseurl; ?>/img/edit_icon.svg"></div></td></tr>
                                    <tr><td><input type="submit" value="Finish" id="<?php echo $id; ?>"class="hidden update-notes-job button"></td></tr>
			   	<?php endforeach; ?>
                                </table>
			</div>
	 	</div>
    <?php $this->load->view('footer'); ?>