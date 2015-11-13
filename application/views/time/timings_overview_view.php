<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="one-col container single_page">
                        <div class="section-header"><h2>Timings</h2></div>
        <?php if ($level == 5) : ?>
                <div class=" edit-button time-edit-button"><img src="<?php echo $baseurl; ?>/img/edit_icon.svg"></div>
        <?php endif;?>
                <?php foreach($timings as $key) : ?>
                <div class="table">
                <table>
                    <tr class="table-titles"><td>Attendance</td><td>Lateness</td><td>holiday taken</td><td>holiday left</td></tr>
                    <tr><td><?php echo $key->avg_attendance; ?> %</td><td><?php echo $key->avg_lateness; ?> %</td><td><?php echo $key->total_holiday_taken; ?></td><td><?php echo $key->total_holiday_left; ?></td></tr>
                    <tr class="table-titles"><td>year to date</td><td>this month</td><td>this week</td><td></td></tr>
                    <tr><td><?php echo $key->year_to_date; ?></td><td><?php echo $key->this_month; ?></td><td><?php echo $key->this_week; ?></td><td></td></tr>
                </table>
                </div>
                    <div class="container service">
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-print.svg"><br>
                            <h5><?php echo $key->print;?></h5>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-web.svg"><br>
                            <h5><?php echo $key->website;?></h5>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-marketing.svg"><br>
                            <h5><?php echo $key->marketing;?></h5>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-design.svg"><br>
                            <h5><?php echo $key->design;?></h5>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-seo.svg"><br>
                            <h5><?php echo $key->seo;?></h5>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-social.svg"><br>
                            <h5><?php echo $key->social;?></h5>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-video.svg"><br>
                            <h5><?php echo $key->video;?></h5>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-email.svg"><br>
                            <h5><?php echo $key->email;?></h5>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-signage.svg"><br>
                            <h5><?php echo $key->signage;?></h5>
                        </div>
                        <div class="col-md-2">
                           <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-ecommerce.svg"><br>
                            <h5><?php echo $key->ecommerce;?></h5>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-photography.svg"><br>
                            <h5><?php echo $key->photography;?></h5>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo $baseurl; ?>img/services_icon/service-icon-content.svg"><br>
                            <h5><?php echo $key->content;?></h5>
                        </div>
                        
                    </div>
                <?php endforeach; ?>
                    
                <div class="table">
                    <h2>Employees</h2>
                    <table>
                       <tr class="table-titles"><td>Name</td><td>Attendance</td><td>Lateness</td><td>Holiday Days</td><td>holiday taken</td><td>days</td><td>project estimate</td><td>project taken</td></tr>
                        <?php foreach ($employees as $key) {
                            echo "<tr><td class='view-button employee-view-button' id='" . $key->id . "'>" . $key->name . "</td><td>" . $key->attendance . " %</td><td>" . $key->late . " %</td><td>" . $key->holiday_days . "</td><td>" . $key->holiday_taken . "</td><td>" . $key->days . "</td><td>" . $key->project_estimate . "</td><td>" . $key->project_taken . "</td></tr>";
                        }?>
                    </table>
                </div>
                <div class="table">
                    <h2>Ongoing</h2>
                    <table>
                        <tr class="table-titles"><td>Name</td><td>Start</td><td>Deadline</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td></tr>
                        <?php foreach ($current_jobs as $key) {
                            echo "<tr><td class='view-button job-view-button' id='" . $key->id . "'>" . $key->name ."</td><td>" . date('d/m/y',strtotime($key->start_date)) . "</td><td>" . date('d/m/y',strtotime($key->deadline_date)) . "</td><td>&pound; " . $key->price . "</td><td>&pound; " . $key->cost . "</td><td>&pound; " . $key->profit . "</td><td>" . $key->hours . " (hrs)</td><td>" . $key->taken . " (hrs)</td></tr>";
                            }?>
                    </table>
                </div>
                <div class="table">
                    <h2>Completed</h2>
                    <table>
                        <tr class="table-titles"><td>Name</td><td>Start</td><td>deadline</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td></tr>
                        <?php foreach ($completed_jobs as $key) {
                            echo "<tr><td class='view-button job-view-button' id='" . $key->id . "'>" . $key->name ."</td><td>" . date('d/m/y',strtotime($key->start_date)) . "</td><td>" . date('d/m/y',strtotime($key->deadline_date)) . "</td><td>&pound; " . $key->price . "</td><td>&pound; " . $key->cost . "</td><td>&pound; " . $key->profit . "</td><td>" . $key->hours . " (hrs)</td><td>" . $key->taken . " (hrs)</td></tr>";
                            }?>
                    </table>
                </div>
    </div>
    <?php $this->load->view('footer'); ?>