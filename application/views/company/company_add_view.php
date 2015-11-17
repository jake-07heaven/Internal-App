<?php $baseurl = base_url(); ?>
<html>

    <?php echo form_open('companies/add_company'); ?>
        <div class="container">
                <div class="container">
                    <div class="col-xs-12"><div class="section-header-input">Name: <input class="text-input" type="text" name="name" id="name"></div></div>
            </div>
            <div class="table-input">
                <table>
                    <tr><td>Company Join Date: <input class="text-input" type="date" name="join_date" id="join_date"></td><td>Company Hours: <input class="text-input" type="number" name="hours" id="hours"></td><td>Company Refferals: <input class="text-input" type="number" name="refferals" id="refferals"></td></tr>
                    <tr><td>Company Success: <input class="text-input" type="number" name="success" id="success"></td><td>Company Amount: <input class="text-input" type="number" name="amount" id="amount"></td><td>Contact Last Spoken: <input class="text-input" type="date" name="last_contact" id="last_contact"></td></tr>

                </table>
            </div> 
            <div class="table-input">
                <table>
                    <tr><td rowspan="2">AVATAR</td><td>happiness</td><td>Contact Details</td></tr>
                    <tr><td>Company Hapiness: <input class="text-input" type="text" name="happiness" id="happiness"></td><td>Contact Name: <input class="text-input" type="text" name="contact" id="contact"><br>Email of Contact: <input class="text-input" type="email" name="email" id="email"><br>Number of Contact: <input class="text-input" type="text" name="number" id="number"><br>Company Address: <input class="text-input" type="text" name="address" id="address"></td></tr>
                    <tr><td>Company Status: <select class="text-input" name="status" id="status"><option value="0">Potential Company</option><option value="1">Current Company</option></select></td></tr>
                </table>
            </div>
            <div class="table-input">
                <table>
                    <tr><td><input class="text-input" type="submit" value="Update Company"></td></tr>
                </table>
            </div>
        </div>
    </form>