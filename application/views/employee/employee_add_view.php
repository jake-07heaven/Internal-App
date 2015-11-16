<?php $baseurl = base_url(); ?>
<html>

    <div class="single_table">
    <?php echo form_open('employees/add_employee'); ?>
            <div class="container">
                <div class="container">
                    <div class="col-xs-12"><div class="section-header-input">Name: <input class="text-input" type="text" name="name" id="name"><br>
                    Role: <input class="text-input" type="text" name="role" id="role"></div></div>
            </div>
            <div class="table-input">
                <table>
                    <tr><td>Join Date:<br> <input class="text-input" type="date" name="join_date" id="join_date"></td><td>Holiday Left: <br><input class="text-input" type="text" name="holiday_days" id="holiday_days"></td><td>Holiday Taken: <br><input class="text-input" type="text" name="holiday_taken" id="holiday_taken"></td><td>Salary: <br><input class="text-input" type="number" name="salary" id="salary"></td></tr>
                    <tr><td>Last KPI: <br><input class="text-input" type="text" name="last_kpi" id="last_kpi"</td><td>KPI: <br><input class="text-input" type="text" name="kpi" id="kpi"></td><td>Total KPI: <br><input class="text-input" type="text" name="total_kpi" id="total_kpi" </td><td>Status: <select class="text-input" name="status" id="status"><option value="0">Potential Staff</option><option value="1">Current Staff</option><option value="2">Previous Staff</option></select></td></tr>

                </table>
            </div> 
            <div class="table-input">
                <table>
                    <tr><td rowspan="2">AVATAR</td><td>Contact Details</td></tr>
                    <tr><td>Email: <input class="text-input" type="email" name="email" id="email"><br>Number: <input class="text-input" type="text" name="number" id="number"><br>Address: <input class="text-input" type="text" name="address" id="address"></tr>
                </table>
            </div>

            </table>
            <div class="container">
                <div class="col-md-2">Print: <br><input class="text-input" type="number" name="print" id="print"></div>
                <div class="col-md-2">Website:<br> <input class="text-input" type="number" name="website" id="website"></div>
                <div class="col-md-2">Design:<br> <input class="text-input" type="number" name="design" id="design"></div>
                <div class="col-md-2">Marketing:<br> <input class="text-input" type="number" name="marketing" id="marketing"></div>
                <div class="col-md-2">Video:<br> <input class="text-input" type="number" name="video" id="video"></div>
                <div class="col-md-2">SEO:<br> <input class="text-input" type="number" name="seo" id="seo"></div>
                <div class="col-md-2">Social:<br> <input class="text-input" type="number" name="social" id="social"></div>            
                <div class="col-md-2">Photography:<br> <input class="text-input" type="number" name="photography" id="social"></div>            
                <div class="col-md-2">Content:<br> <input class="text-input" type="number" name="content" id="social"></div>            
                <div class="col-md-2">Signage:<br> <input class="text-input" type="number" name="signage" id="social"></div>            
                <div class="col-md-2">Ecommerce:<br> <input class="text-input" type="number" name="ecommerce" id="social"></div>            
                <div class="col-md-2">Email:<br> <input class="text-input" type="number" name="emaill" id="social"></div>            
            </div>
            <div class="table-input">
                <table>
                <tr><td>Qualifications: <textarea class="text-input" type="text" name="qualifications" id="qualifications"></textarea></td></tr>
                <tr><td>Training: <textarea class="text-input" type="text" name="training" id="training"></textarea></td></tr>
                <tr><td>Books Read: <textarea class="text-input" type="text" name="books_read" id="books_read"></textarea></td></tr>
                <tr><td>External Learning: <textarea class="text-input" type="text" name="external_learning" id="external_learning"></textarea></td></tr>
                <tr><td>Notes: <textarea class="text-input" type="text" name="notes" id="notes"></textarea></td></tr>
                <tr><td><input class="text-input" type="submit" value="Add Employee"></td></tr>
                </table>
            </div>
    </form>
    </div>
    <?php $this->load->view('footer'); ?>