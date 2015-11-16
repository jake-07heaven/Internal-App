<?php $baseurl = base_url(); ?>
<html>

    <div class="one-col single_page">
        <?php foreach($service_info as $key){ $service = $key->name;} ?>
        <div class="section-header"><h2><?php echo $service; ?></h2><br><?php if($level == 5) :?><div id="<?php echo $key->id; ?>"class='add-button service-edit-button'><img src='<?php echo $baseurl; ?>/img/edit_icon.svg'></div><?php endif; ?></div>
        <div class="table">
        <table class="">
            
            <?php foreach($service_info as $key) : ?>
                
            <tr class="table-titles"><td>Money in</td><td>ongoing</td><td>total</td><td>target</td><td>potential</td></tr>
            <tr><td><?php echo $key->money_in; ?></td><td><?php echo $key->ongoing; ?></td><td><?php echo $key->total; ?></td><td><?php echo $key->target; ?></td><td><?php echo $key->potential; ?></td></tr>
            
            <?php endforeach; ?>
        </table>
        </div>
        <div class="container">
            <h3>Employees</h3>
            <?php foreach($employees as $key) : ?>
            <div class="col-sm-2 thumbnails"><img class="thumbnail" src="<?php echo $baseurl;?>/img/placeholder.png"><br><?php echo $key->name; ?><br><?php echo $key->$service; ?></div>
            <?php endforeach; ?>
        <?php foreach($service_info as $key) : ?>
        <div class="full-width">
            <div class="third-width">
                <h4>Client Happiness</h4>
                <div><?php echo $key->happiness; ?></div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
        <div class="container">
            <h2>Jobs</h2>
		    <div class="table">
			    <h3>Potential</h3>
			    <table>
				   	<tr class="table-titles"><td>Name</td><td>Start</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td><td>working on</td><td>status</td></tr>
				   <?php 
				   	if ($job_potential != null)
				   {
				   foreach ($job_potential as $key) {
				   	echo "<tr><td>" . $key->name . "</td><td>" . date('d/m/y',strtotime($key->start_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td><td>" . $key->working_on . "</td><td>" . $key->status . "</td></tr>";
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
				   	echo "<tr><td>" . $key->name . "</td><td>" . date('d/m/y',strtotime($key->start_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td><td>" . $key->working_on . "</td><td>" . $key->status . "</td></tr>";
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
				   	echo "<tr><td>" . $key->name . "</td><td>" . date('d/m/y',strtotime($key->start_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td><td>" . $key->working_on . "</td><td>" . $key->status . "</td></tr>";
				   }}?>
				</table>
			</div>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>