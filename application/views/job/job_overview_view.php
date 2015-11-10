<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="one-col">
        <?php if($level == 5) :?>
            <div class='add-button job-add-button'><img src='<?php echo $baseurl; ?>/img/add_icon.svg'></div>
	<?php endif; ?>
        <div class="table">
	    <h2>Potential</h2>
            <table class="sortable">
                <tr class="table-titles"><td>Company</td><td>Job</td><td>deadline</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td><td>working on</td><td>status</td></tr>
                <?php foreach ($future_jobs as $key) {
                   if($level == 5) {
                        $button = "<div id='" . $key->id . "'class='job-edit-button edit-button'><img src='" . $baseurl . "/img/edit_icon.svg'></div>";
                   }
                   else
                   {
                        $button = "";
                   }
                   foreach ($jobs_info as $job){
                       if ($job->id == $key->id)
                       {
                           $linked = $job->linked_companies;
                       }
                   }
                    echo "<tr><td class='view-button job-view-button' id='" . $key->id . "'>" . $linked . "</td><td>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->deadline_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td><td>" . $key->working_on . "</td><td>" . $key->status . "</td><td>".$button."</td></tr>";
		    }?>
            </table>
        </div>
        <div class="table">
	    <h2>Ongoing</h2>
	    <table class="sortable">
                <tr class="table-titles"><td>Company</td><td>Job</td><td>deadline</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td><td>working on</td><td>status</td></tr>
                <?php foreach ($current_jobs as $key) {
                                        if($level == 5) {
                        $button = "<div id='" . $key->id . "'class='job-edit-button edit-button'><img src='" . $baseurl . "/img/edit_icon.svg'></div>";
                   }
                   else
                   {
                        $button = "";
                   }
                                      foreach ($jobs_info as $job){
                       if ($job->id == $key->id)
                       {
                           $linked = $job->linked_companies;
                       }
                   }
                    echo "<tr><td class='view-button job-view-button' id='" . $key->id . "'>" . $linked . "</td><td>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->deadline_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td><td>" . $key->working_on . "</td><td>" . $key->status . "</td><td>".$button."</td></tr>";
		    }?>
            </table>
        </div>
        <div class="table">
            <h2>Completed</h2>
            <table class="sortable">
                <tr class="table-titles"><td>Company</td><td>Job</td><td>deadline</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td><td>working on</td><td>status</td></tr>
                <?php foreach ($completed_jobs as $key) {
                                        if($level == 5) {
                        $button = "<div id='" . $key->id . "'class='job-edit-button edit-button'><img src='" . $baseurl . "/img/edit_icon.svg'></div>";
                   }
                   else
                   {
                        $button = "";
                   }
                                      foreach ($jobs_info as $job){
                       if ($job->id == $key->id)
                       {
                           $linked = $job->linked_companies;
                       }
                   }
                    echo "<tr><td class='view-button job-view-button' id='" . $key->id . "'>" . $linked . "</td><td>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->deadline_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td><td>" . $key->working_on . "</td><td>" . $key->status . "</td><td>".$button."</td></tr>";
		    }?>
            </table>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>