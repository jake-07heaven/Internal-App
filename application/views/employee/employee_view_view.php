<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<?php foreach ($employee_level as $key) {
    $userName = $key->name;
    $userjoin_date = $key->join_date;
    $userSalary = $key->salary;
    $userRole = $key->role;
}?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="single_page one-col">
        <div class="section-header"><h2><?php echo $userName; ?></h2><br><p><?php echo $userRole ?></p></div>
        <div class="table">
            <table>
                <tr class="table-titles"><td>attendance</td><td>late</td><td>holiday days</td><td>holiday taken</td><td>salary</td></tr>
                    <?php foreach ($employee_info as $key) {
                        echo "<tr><td>" . $key->attendance . "%</td><td>" . $key->late . "%</td><td>" . $key->holiday_days . "</td><td>" . $key->holiday_taken . "</td><td>" . $userSalary . "</td></tr>";
                        echo "<tr class='table-titles'><td>last kpi</td><td>kpi</td><td>total kpi</td><td>join date</td><td>days</td></tr>";
                        echo "<tr><td>" . $key->last_kpi . "%</td><td>" . $key->kpi . "%</td><td>" . $key->total_kpi . "%</td><td>" . date('s/m/y',strtotime($userjoin_date)) . "</td><td>" . $key->days . "</td></tr>";
                    }?>
            </table>
        </div>
        <div class="table">
            <table>
                <?php foreach ($employee_info as $key) {
                    echo "<tr class='table-titles'><td colspan='2' rowspan='2'>WORDS</td><td>Work Satisfaction</td><td colspan='3'>Employee Contact Information</td></tr>";
                    echo "<tr><td>" . $key->satisfaction . "</td><td colspan='3'>" . $userName . "<br>" . $key->email . "<br>" . $key->number . "<br>" . $key->address ."</td></tr>";
                    }?>
            </table>
        </div>
        <div class="table">
            <h3>skill level</h3>
            <table>
                <tr class="table-titles"><td>Print</td><td>website</td><td>design</td><td>marketing</td><td>video</td><td>seo</td><td>social media</td></tr>
                <?php foreach ($employee_level as $key) {
                    echo "<tr><td>" . $key->print . "</td><td>" . $key->website . "</td><td>" . $key->design . "</td><td>" . $key->marketing . "</td><td>" . $key->video . "</td><td>" . $key->seo . "</td><td>" . $key->social . "</td></tr>";
                }?>
            </table>
        </div>
        <div class="table">
            <h3>HR</h3>
            <table>
                <tr class="table-titles"><td>Name</td><td>date</td><td>level</td><td>issue</td><td>meeting</td><td>letter</td><td>followed up</td></tr>
                <?php 
                    if ($hr_data != null)
               {
               foreach ($hr_data as $key) {
                    echo "<tr><td>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->date)) . "</td><td>" . $key->level . "</td><td>" . $key->issue . "</td><td>" . $key->meeting . "</td><td>" . $key->letter . "</td><td>" . $key->followed_up . "</td></tr>";
                }}?>
            </table>
        </div>
        <div class="table">
            <h3>qualifications</h3>
            <?php foreach ($employee_info as $key) {
                    echo "<div id='qualifications' class='textarea'>" . $key->qualifications . "</div>";
            }?>
        </div>
        <div class="table">
            <h3>training</h3>
            <?php foreach ($employee_info as $key) {
                    echo "<div id='training' class='textarea'>" . $key->training . "</div>";
            }?>
        </div>
        <div class="table">
            <h3>books read</h3>
            <?php foreach ($employee_info as $key) {
                    echo "<div id='books_read' class='textarea'>" . $key->books_read . "</div>";
            }?>
        </div>
        <div class="table">
            <h3>external learning</h3>
            <?php foreach ($employee_info as $key) {
                    echo "<div id='external_learning' class='textarea'>" . $key->external_learning . "</div>";
            }?>
        </div>
        <div class="table">
            <h3>notes</h3>
            <?php foreach ($employee_info as $key) {
                    echo "<div id='notes' class='textarea'>" . $key->notes . "</div>";
            }?>
        </div>
	 	</div>