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
                    <tr><td><?php echo $key->avg_attendance; ?></td><td><?php echo $key->avg_lateness; ?></td><td><?php echo $key->total_holiday_taken; ?></td><td><?php echo $key->total_holiday_left; ?></td></tr>
                    <tr class="table-titles"><td>year to date</td><td>this month</td><td>this week</td><td></td></tr>
                    <tr><td><?php echo $key->year_to_date; ?></td><td><?php echo $key->this_month; ?></td><td><?php echo $key->this_week; ?></td><td></td></tr>
                </table>
                </div>
                    <div class="container">
                        <div class="col-md-2">
                            Print
                            <?php echo $key->print;?>
                        </div>
                        <div class="col-md-2">
                            Website<br>
                            <?php echo $key->website;?>
                        </div>
                        <div class="col-md-2">
                            Marketing<br>
                            <?php echo $key->marketing;?>
                        </div>
                        <div class="col-md-2">
                            Design<br>
                            <?php echo $key->design;?>
                        </div>
                        <div class="col-md-2">
                            Seo<br>
                            <?php echo $key->seo;?>
                        </div>
                        <div class="col-md-2">
                            Social<br>
                            <?php echo $key->social;?>
                        </div>
                        <div class="col-md-2">
                            Video<br>
                            <?php echo $key->video;?>
                        </div>
                        <div class="col-md-2">
                            Email<br>
                            <?php echo $key->email;?>
                        </div>
                        <div class="col-md-2">
                            Signage <br>
                            <?php echo $key->signage;?>
                        </div>
                        <div class="col-md-2">
                            E-commerce<br>
                            <?php echo $key->ecommerce;?>
                        </div>
                        <div class="col-md-2">
                            Photography<br>
                            <?php echo $key->photography;?>
                        </div>
                        <div class="col-md-2">
                            Content Creation<br>
                            <?php echo $key->content;?>
                        </div>
                        
                    </div>
                <?php endforeach; ?>
                    
                <div class="table">
                    <h2>Employees</h2>
                    <table>
                       <tr class="table-titles"><td>Name</td><td>Attendance</td><td>Lateness</td><td>Holiday Days</td><td>holiday taken</td><td>days</td><td>project estimate</td><td>project taken</td></tr>
                        <?php foreach ($employees as $key) {
                            echo "<tr><td class='view-button employee-view-button' id='" . $key->id . "'>" . $key->name . "</td><td>" . $key->attendance . "</td><td>" . $key->late . "</td><td>" . $key->holiday_days . "</td><td>" . $key->holiday_taken . "</td><td>" . $key->days . "</td><td>" . $key->project_estimate . "</td><td>" . $key->project_taken . "</td></tr>";
                        }?>
                    </table>
                </div>
                <div class="table">
                    <h2>Ongoing</h2>
                    <table>
                        <tr class="table-titles"><td>Name</td><td>Start</td><td>Deadline</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td></tr>
                        <?php foreach ($current_jobs as $key) {
                            echo "<tr><td class='view-button job-view-button' id='" . $key->id . "'>" . $key->name ."</td><td>" . date('s/m/y',strtotime($key->start_date)) . "</td><td>" . date('s/m/y',strtotime($key->deadline_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td></tr>";
                            }?>
                    </table>
                </div>
                <div class="table">
                    <h2>Completed</h2>
                    <table>
                        <tr class="table-titles"><td>Name</td><td>Start</td><td>deadline</td><td>Price</td><td>Cost</td><td>Profit</td><td>Hours</td><td>taken</td></tr>
                        <?php foreach ($completed_jobs as $key) {
                            echo "<tr><td class='job-view-button' id='" . $key->id . "'>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->start_date)) ."</td><td>" . date('s/m/y',strtotime($key->deadline_date)) . "</td><td>" . $key->price . "</td><td>" . $key->cost . "</td><td>" . $key->profit . "</td><td>" . $key->hours . "</td><td>" . $key->taken . "</td></tr>";
                            }?>
                    </table>
                </div>
    </div>
    <?php $this->load->view('footer'); ?>