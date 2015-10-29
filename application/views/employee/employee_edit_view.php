<!DOCTYPE html>
<?php
foreach ($employee_level as $key) {
    $name = $key->name;
    $salary = $key->salary;
    $role = $key->role;
    $join_date = $key->join_date;
    $status = $key->status;
    $print = $key->print;
    $website = $key->website;
    $design = $key->design;
    $marketing = $key->marketing;
    $video = $key->video;
    $photograhy = $key->photography;
    $content = $key->content;
    $signage = $key->signage;
    $emaill = $key->email;
    $ecommerce = $key->ecommerce;
    $seo = $key->seo;

    $social = $key->social;
    $id = $key->id;
}

foreach ($employee_info as $key) {
    $address = $key->address;
    $email = $key->email;
    $number = $key->number;
    $qualifications = $key->qualifications;
    $training = $key->training;
    $books_read = $key->books_read;
    $external_learning = $key->external_learning;
    $notes = $key->notes;
    $last_kpi = $key->last_kpi;
    $kpi = $key->kpi;
    $total_kpi = $key->total_kpi;
    $holiday_days = $key->holiday_days;
    $holiday_taken = $key->holiday_taken;
}
?>

    <?php $baseurl = base_url(); ?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
        <?php $this->load->view('navigation'); ?>
    <div class="one-col">
        <?php echo form_open('employees/update_employee'); ?>
            <div class="container">
                <div class="container">
                    <input class="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="col-xs-12"><div class="section-header-input">Name: <input class="text-input" type="text" name="name" id="name" value="<?php echo $name; ?>"><br>
                    Role: <input class="text-input" type="text" name="role" id="role" value="<?php echo $role; ?>"></div></div>
            </div>
            <div class="table-input">
                <table>
                    <tr><td>Join Date:<br> <input class="text-input" type="date" name="join_date" id="join_date" value="<?php echo $join_date; ?>"></td><td>Holiday Left: <br><input class="text-input" type="text" name="holiday_days" id="holiday_days" value="<?php echo $holiday_days; ?>"></td><td>Holiday Taken: <br><input class="text-input" type="text" name="holiday_taken" id="holiday_taken" value="<?php echo $holiday_taken; ?>"></td><td>Salary: <br><input class="text-input" type="number" name="salary" id="salary" value="<?php echo $salary; ?>"></td></tr>
                    <tr><td>Last KPI: <br><input class="text-input" type="text" name="last_kpi" id="last_kpi" value="<?php echo $last_kpi; ?>"></td><td>KPI: <br><input class="text-input" type="text" name="kpi" id="kpi" value="<?php echo $kpi; ?>"></td><td>Total KPI: <br><input class="text-input" type="text" name="total_kpi" id="total_kpi" value="<?php echo $total_kpi; ?>"></td>            <td>Status: <select class="text-input" name="status" id="status"><option <?php if ($status == 0) {echo "selected='selected'";} ?> value="0">Potential Staff</option><option <?php if ($status == 1) {echo "selected='selected'";} ?> value="1">Current Staff</option><option <?php if ($status == 2) {echo "selected='selected'";} ?> value="2">Previous Staff</option></select></td></tr>

                </table>
            </div> 
            <div class="table-input">
                <table>
                    <tr><td rowspan="2">AVATAR</td><td>Contact Details</td></tr>
                    <tr><td>Email: <input class="text-input" type="email" name="email" id="email" value="<?php echo $email; ?>"><br>Number: <input class="text-input" type="text" name="number" id="number" value="<?php echo $number; ?>"><br>Address: <input class="text-input" type="text" name="address" id="address" value="<?php echo $address; ?>"></tr>
                </table>
            </div>

            </table>
            <div class="container">
                <div class="col-md-2">Print: <br><input class="text-input" type="number" name="print" id="print" value="<?php echo $print; ?>"></div>
                <div class="col-md-2">Website:<br> <input class="text-input" type="number" name="website" id="website" value="<?php echo $website; ?>"></div>
                <div class="col-md-2">Design:<br> <input class="text-input" type="number" name="design" id="design" value="<?php echo $design; ?>"></div>
                <div class="col-md-2">Marketing:<br> <input class="text-input" type="number" name="marketing" id="marketing" value="<?php echo $marketing; ?>"></div>
                <div class="col-md-2">Video:<br> <input class="text-input" type="number" name="video" id="video" value="<?php echo $video; ?>"></div>
                <div class="col-md-2">SEO:<br> <input class="text-input" type="number" name="seo" id="seo" value="<?php echo $seo; ?>"></div>
                <div class="col-md-2">Social:<br> <input class="text-input" type="number" name="social" id="social" value="<?php echo $social; ?>"></div>            
                <div class="col-md-2">Photography:<br> <input class="text-input" type="number" name="photography" id="social" value="<?php echo $photograhy; ?>"></div>            
                <div class="col-md-2">Content:<br> <input class="text-input" type="number" name="content" id="social" value="<?php echo $content; ?>"></div>            
                <div class="col-md-2">Signage:<br> <input class="text-input" type="number" name="signage" id="social" value="<?php echo $signage; ?>"></div>            
                <div class="col-md-2">Ecommerce:<br> <input class="text-input" type="number" name="ecommerce" id="social" value="<?php echo $ecommerce; ?>"></div>            
                <div class="col-md-2">Email:<br> <input class="text-input" type="number" name="emaill" id="social" value="<?php echo $emaill; ?>"></div>            
            </div>
            <div class="table-input">
                <table>
                <tr><td>Qualifications: <textarea class="text-input" type="text" name="qualifications" id="qualifications"><?php echo $qualifications; ?></textarea></td></tr>
                <tr><td>Training: <input class="text-input" type="text" name="training" id="training" value="<?php echo $training; ?>"></td></tr>
                <tr><td>Books Read: <input class="text-input" type="text" name="books_read" id="books_read" value="<?php echo $books_read; ?>"></td></tr>
                <tr><td>External Learning: <input class="text-input" type="text" name="external_learning" id="external_learning" value="<?php echo $external_learning; ?>"></td></tr>
                <tr><td>Notes: <input class="text-input" type="text" name="notes" id="notes" value="<?php echo $notes; ?>" ></td></tr>
                <tr><td><input class="text-input" type="submit" value="Update Employee"></td></tr>
                <tr><td><div id="<?php echo $id; ?>" class="delete-button employee-delete-button">DELETE</div></td></tr>
                </table>
            </div>
        </form>
    </div>
    <?php $this->load->view('footer'); ?>