<!DOCTYPE html>
<html>
    <?php $this->load->view('head'); ?>
    <div class="two-col dashboard">
            <div id="st-container" class="st-container">
 
    <!-- content push wrapper -->
    <div class="st-pusher">
                    <?php $this->load->view('sidebar'); ?>
        <div class="st-content"><!-- this is the wrapper for the content -->
            <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
                <!-- the content -->
                    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
						<div class="main clearfix">
                                                                        <div class="left-col">
                        <div class="tab_container">
                            <input id="tab1" type="radio" name="tabs" checked>
                            <label for="tab1"><i class="fa fa-code"></i><span>Jobs</span><div class="circle_ammount"><?php echo $jobs_ammount; ?></div></label>

                            <input id="tab2" type="radio" name="tabs">
                            <label for="tab2"><i class="fa fa-pencil-square-o"></i><span>Issues</span><div class="circle_ammount"><?php echo $issues_ammount; ?></div></label>

                            <section id="content1" class="tab-content">
                                <h3>Ongoing Jobs</h3>
                                <div class="table">
                                    <table>
                                        <tr class="table-titles"><td>Job</td><td>deadline</td><td>company</td><td>contact name</td><td>contact number</td></tr>
                                        <?php foreach($ongoing_jobs as $key) : ?>
                                            <?php foreach($companies as $comp) : ?>
                                                <?php foreach($ongoing_jobs_extra as $jobs) : ?>
                                                    <?php if($jobs->linked_companies == $comp->name) {
                                                        $contact = $comp->contact;
                                                        $number = $comp->number;
                                                        $company = $comp->name;
                                                    }?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                            <tr><td><?php echo $key->name; ?></td><td><?php echo date('s/m/y',strtotime($key->deadline_date)) ?></td><td><?php echo $company; ?></td><td><?php echo $contact; ?></td><td><?php echo $number; ?></td></tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </section>
                            <section id="content2" class="tab-content">
                                <h3>Ongoing Issues</h3>
                                <div class="table">
                                    <table>
                                        <tr class="table-titles"><td>Issue</td><td>Date</td><td>company</td><td>contact name</td><td>contact number</td></tr>
                                        <?php foreach($ongoing_issues as $key) : ?>
                                            <?php foreach($companies as $comp) {
                                                if($key->company == $comp->name){
                                                    $contact = $comp->contact;
                                                    $company = $comp->name;
                                                    $number = $comp->number;
                                                }}?>
                                            <tr><td><?php echo $key->issue; ?></td><td><?php echo date('s/m/y',strtotime($key->date)) ?></td><td><?php echo $company; ?></td><td><?php echo $contact; ?></td><td><?php echo $number; ?></td></tr>
                                        <?php endforeach; ?>
                                    </table>
                            </section>
                        </div>
                    </div>
                                                    
                                                    
							<div id="st-trigger-effects" class="column">
                                                            <button id="task_tab" class="button" data-effect="st-effect-7"><img src="<?php echo base_url(); ?>img/task_tab.png"></button>
							</div>
						</div><!-- /main -->
            </div><!-- /st-content-inner -->
        </div><!-- /st-content -->
 
    </div><!-- /st-pusher -->
 
</div><!-- /st-container -->
            </div>
    <?php $this->load->view('footer'); ?>